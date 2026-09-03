<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterCustomerRequest;
use App\Models\Customer;
use App\Models\PhoneVerification;
use App\Services\SmsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class RegistrationController extends Controller
{
    /**
     * STEP 1: Send OTP to phone
     */
    public function sendOtp(
        Request $request,
        SmsService $smsService
    ): JsonResponse {
        $request->validate([
            'country_code' => ['required', 'string', 'max:5'],
            'phone'        => ['required', 'digits_between:7,15'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Normalize country code and phone
        |--------------------------------------------------------------------------
        */

        $countryCode = preg_replace('/\D/', '', $request->country_code);
        $phone = preg_replace('/\D/', '', $request->phone);

        $fullPhone = $countryCode . $phone;

        /*
        |--------------------------------------------------------------------------
        | Rate limit
        | Maximum 3 OTP requests per phone in 10 minutes
        |--------------------------------------------------------------------------
        */

        $rateKey = 'otp-send:' . $fullPhone;

        if (RateLimiter::tooManyAttempts($rateKey, 3)) {
            $seconds = RateLimiter::availableIn($rateKey);

            return response()->json([
                'success' => false,
                'message' => "Too many attempts. Try again in {$seconds} seconds.",
            ], 429);
        }

        /*
        |--------------------------------------------------------------------------
        | Generate 6-digit OTP
        |--------------------------------------------------------------------------
        */

        $otp = (string) random_int(100000, 999999);

        /*
        |--------------------------------------------------------------------------
        | Invalidate previous unverified OTPs
        |--------------------------------------------------------------------------
        */

        PhoneVerification::where('phone', $fullPhone)
            ->where('is_verified', false)
            ->update([
                'expires_at' => now(),
            ]);

        /*
        |--------------------------------------------------------------------------
        | Store OTP securely
        |--------------------------------------------------------------------------
        */

        PhoneVerification::create([
            'phone'        => $fullPhone,
            'otp_code'     => $otp,
            'otp_hash'     => Hash::make($otp),
            'attempts'     => 0,
            'max_attempts' => 5,
            'is_verified'  => false,
            'expires_at'   => now()->addMinutes(10),
            'ip_address'   => $request->ip(),
            'user_agent'   => $request->userAgent(),
        ]);

        /*
        |--------------------------------------------------------------------------
        | Send OTP using MSG91
        |--------------------------------------------------------------------------
        */

        $sent = $smsService->sendOtp(
            $countryCode,
            $phone,
            $otp
        );

        /*
        |--------------------------------------------------------------------------
        | If SMS sending fails
        |--------------------------------------------------------------------------
        */

        if (!$sent) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP. Please try again.',
            ], 500);
        }

        /*
        |--------------------------------------------------------------------------
        | Count successful OTP request
        |--------------------------------------------------------------------------
        */

        RateLimiter::hit($rateKey, 600);

        return response()->json([
            'success' => true,
            'message' => 'OTP sent successfully.',
        ]);
    }

    /**
     * STEP 2: Verify OTP
     */
    public function verifyOtp(Request $request): JsonResponse
    {
        $request->validate([
            'country_code' => ['required', 'string', 'max:5'],
            'phone'        => ['required', 'digits_between:7,15'],
            'otp'          => ['required', 'digits:6'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Normalize phone
        |--------------------------------------------------------------------------
        */

        $countryCode = preg_replace('/\D/', '', $request->country_code);
        $phone = preg_replace('/\D/', '', $request->phone);

        $fullPhone = $countryCode . $phone;

        /*
        |--------------------------------------------------------------------------
        | Get latest unverified OTP
        |--------------------------------------------------------------------------
        */

        $verification = PhoneVerification::where('phone', $fullPhone)
            ->where('is_verified', false)
            ->latest('id')
            ->first();

        if (!$verification) {
            return response()->json([
                'success' => false,
                'message' => 'No OTP request found. Please request a new OTP.',
            ], 404);
        }

        /*
        |--------------------------------------------------------------------------
        | Check expiry
        |--------------------------------------------------------------------------
        */

        if ($verification->expires_at->isPast()) {
            return response()->json([
                'success' => false,
                'message' => 'OTP has expired. Please request a new one.',
            ], 410);
        }

        /*
        |--------------------------------------------------------------------------
        | Check maximum attempts
        |--------------------------------------------------------------------------
        */

        if ($verification->attempts >= $verification->max_attempts) {
            return response()->json([
                'success' => false,
                'message' => 'Maximum attempts exceeded. Please request a new OTP.',
            ], 429);
        }

        /*
        |--------------------------------------------------------------------------
        | Verify OTP
        |--------------------------------------------------------------------------
        */

        if (!Hash::check($request->otp, $verification->otp_hash)) {
            $verification->increment('attempts');

            $attemptsLeft = max(
                0,
                $verification->max_attempts - ($verification->attempts + 1)
            );

            return response()->json([
                'success' => false,
                'message' => 'Invalid OTP.',
                'attempts_left' => $attemptsLeft,
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | Mark phone as verified
        |--------------------------------------------------------------------------
        */

        $verification->update([
            'is_verified' => true,
            'verified_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Phone number verified successfully.',
        ]);
    }

    /**
     * STEP 3: Final registration submit
     */
    public function register(
        RegisterCustomerRequest $request
    ): JsonResponse {
        $validated = $request->validated();

        /*
        |--------------------------------------------------------------------------
        | Normalize phone
        |--------------------------------------------------------------------------
        */

        $countryCode = preg_replace(
            '/\D/',
            '',
            $validated['country_code']
        );

        $phone = preg_replace(
            '/\D/',
            '',
            $validated['phone']
        );

        $fullPhone = $countryCode . $phone;

        /*
        |--------------------------------------------------------------------------
        | Confirm phone verification
        |--------------------------------------------------------------------------
        */

        $verified = PhoneVerification::where('phone', $fullPhone)
            ->where('is_verified', true)
            ->where(
                'verified_at',
                '>=',
                now()->subMinutes(30)
            )
            ->exists();

        if (!$verified) {
            return response()->json([
                'success' => false,
                'message' => 'Phone verification not found or expired. Please verify again.',
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | Duplicate phone check
        |--------------------------------------------------------------------------
        */

        if (
            Customer::where('country_code', $countryCode)
                ->where('phone', $phone)
                ->exists()
        ) {
            return response()->json([
                'success' => false,
                'message' => 'This phone number is already registered.',
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | Create customer
        |--------------------------------------------------------------------------
        */

        try {
            $customer = DB::transaction(function () use (
                $validated,
                $countryCode,
                $phone
            ) {
                $newCustomer = Customer::create([
                    'customer_type'    => $validated['customer_type'],
                    'name'             => $validated['name'],
                    'email'            => $validated['email'],
                    'company_name'     => $validated['company_name'],
                    'country_code'     => $countryCode,
                    'phone'            => $phone,
                    'phone_verified_at'=> now(),

                    'country' => $validated['customer_type'] === 'international'
                        ? $validated['country']
                        : null,

                    'city'       => $validated['city'],
                    'password'   => $validated['password'],
                    'status'     => 'active',
                ]);

                /*
                |--------------------------------------------------------------------------
                | Login customer
                |--------------------------------------------------------------------------
                */

                Auth::guard('customer')->login($newCustomer);

                return $newCustomer;
            });

            /*
            |--------------------------------------------------------------------------
            | Delete used OTP records
            |--------------------------------------------------------------------------
            */

            PhoneVerification::where('phone', $fullPhone)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Registration successful.',
                'customer_id' => $customer->id,
            ], 201);

        } catch (\Throwable $e) {

            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
            ], 500);
        }
    }
}