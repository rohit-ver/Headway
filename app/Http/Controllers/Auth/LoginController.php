<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Server-side validation
        |--------------------------------------------------------------------------
        */

        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
                'max:150'
            ],

            'password' => [
                'required',
                'string',
                'min:6',
                'max:50'
            ],

        ], [

            'email.required' =>
                'Please enter your email address.',

            'email.email' =>
                'Please enter a valid email address.',

            'email.max' =>
                'Email cannot exceed 150 characters.',

            'password.required' =>
                'Please enter your password.',

            'password.min' =>
                'Password must be at least 6 characters.',

            'password.max' =>
                'Password cannot exceed 50 characters.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Check Customer Login
        |--------------------------------------------------------------------------
        */

        if (
            Auth::guard('customer')->attempt(
                $credentials,
                $request->boolean('remember')
            )
        ) {

            /*
            |--------------------------------------------------------------------------
            | Regenerate session after successful authentication
            |--------------------------------------------------------------------------
            */

            $request->session()->regenerate();


            /*
            |--------------------------------------------------------------------------
            | AJAX / JSON Response
            |--------------------------------------------------------------------------
            */

            return response()->json([
                'success' => true,
                'message' => 'Login successful.',
                'redirect' => route('products'),
            ], 200);
        }


        /*
        |--------------------------------------------------------------------------
        | Wrong Email / Password
        |--------------------------------------------------------------------------
        |
        | Login failed. Keep the modal open and return JSON
        | instead of redirecting the browser.
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'success' => false,
            'message' =>
                'The email or password you entered is incorrect.',
        ], 401);
    }
}

