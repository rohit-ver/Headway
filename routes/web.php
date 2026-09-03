<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;



Route::get('/', function () {
    return view('home.index');
})->name('home');


Route::get('/about', function () {
    return view('home.about');
})->name('about');


Route::get('/products', function () {
    return view('home.products');
})->name('products');



Route::get('/contact', function () {
    return view('home.contact');
})->name('contact');

Route::get('/buyer-inquiry', function () {

    return view('home.buyer-inquiry');

})->name('buyer.inquiry');

Route::get('/cart', function () {
    return view('cart.index');
})->name('cart');

    Route::get('/customer/login', function () {
        return view('components.login-model');
    })->name('customer.login');

Route::get('/product-details', function () {
    return view('home.product-details');
})->name('product.details');

Route::get('/cart', function () {
    return view('home.cart');
})->name('cart');

Route::get('/contact_inquiries', function () {
    return view('home.contact_inquiries');
})->name('contactus');


// =========================================
// BUYER DASHBOARD
// =========================================
Route::prefix('buyer')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('buyer-dashboard.profile');
    })->name('buyer.dashboard');


    // My Profile
    Route::get('/profile', function () {
        return view('buyer-dashboard.profile');
    })->name('buyer.profile');


    // My Orders
    Route::get('/orders', function () {
        return view('buyer-dashboard.orders');
    })->name('buyer.orders');


    // Inquiry Cart
    Route::get('/inquiry-cart', function () {
        return view('buyer-dashboard.inquiry-cart');
    })->name('buyer.inquiry.cart');


    // My Inquiries
    Route::get('/my-inquiries', function () {
        return view('buyer-dashboard.my-inquiries');
    })->name('buyer.my.inquiries');

});


Route::post('/otp/send', [RegistrationController::class, 'sendOtp'])->name('otp.send');
Route::post('/otp/verify', [RegistrationController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/register', [RegistrationController::class, 'register'])->name('register.store');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', function (Request $request) {
    Auth::guard('customer')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');



// Forgot password form dikhana
// Reset link email par bhejna (forgot-password modal se POST hoga)
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Reset password form dikhana (email ke link click karne ke baad)
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Naya password save karna
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/all-products', function () {
    return view('home.all_products');
})->name('all.products');

Route::post('/contact/store', [ContactController::class, 'store'])
    ->name('contact.store');