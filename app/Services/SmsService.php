<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsService
{
    /**
     * Send OTP via MSG91.
     */
    public function sendOtp(
        string $countryCode,
        string $phone,
        string $otp
    ): bool {
        try {
            $authKey = config('services.msg91.auth_key');
            $templateId = config('services.msg91.otp_template_id');

            $countryCode = preg_replace('/\D/', '', $countryCode);
            $phone = preg_replace('/\D/', '', $phone);

            $mobile = $countryCode . $phone;

            $response = Http::withHeaders([
                'authkey' => $authKey,
                'Content-Type' => 'application/json',
            ])->post(
                'https://control.msg91.com/api/v5/otp',
                [
                    'template_id' => $templateId,
                    'mobile' => $mobile,
                    'otp' => $otp,
                ]
            );

            if ($response->successful()) {
                Log::info('MSG91 OTP sent successfully', [
                    'mobile' => $this->maskPhone($mobile),
                ]);

                return true;
            }

            Log::error('MSG91 OTP failed', [
                'status' => $response->status(),
                'response' => $response->json(),
            ]);

            return false;

        } catch (\Throwable $e) {

            Log::error('MSG91 OTP exception', [
                'message' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Mask phone number in logs.
     */
    private function maskPhone(string $phone): string
    {
        if (strlen($phone) <= 4) {
            return '****';
        }

        return str_repeat('*', strlen($phone) - 4)
            . substr($phone, -4);
    }
}