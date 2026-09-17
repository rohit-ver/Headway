<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\InquiryPdfController;




Route::get('/', function () {
    return view('home.index');
})->name('home');


Route::get('/about', function () {
    return view('home.about');
})->name('about');



Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/products', [HomeController::class, 'category'])
    ->name('products-categories');

Route::get('/products', [HomeController::class, 'products'])
    ->name('products');

Route::get('/products/{id}/{slug}', [HomeController::class, 'productDetail'])
    ->name('product.details');



Route::get('/contact', function () {
    return view('home.contact');
})->name('contact');

Route::get('/buyer-inquiry', [HomeController::class, 'buyerInquiry'])
    ->middleware('auth:customer')
    ->name('buyer.inquiry');

// routes/web.php
Route::middleware('auth:customer')->group(function () {
    Route::get('/buyer-inquiry', [InquiryController::class, 'create'])->name('buyer-inquiry');
    Route::post('/buyer-inquiry', [InquiryController::class, 'store'])->name('buyer-inquiry.store');
});

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

// PDF and Excel export routes
Route::get('/inquiries/export-pdf', [InquiryPdfController::class, 'exportPdf'])
    ->name('inquiries.export.pdf')->middleware('auth');

Route::get('/inquiries/export-excel', [InquiryPdfController::class, 'exportExcel'])
    ->name('inquiries.export.excel')->middleware('auth');

    // regidtration and login routes 
Route::post('/otp/send', [RegistrationController::class, 'sendOtp'])->name('otp.send');
Route::post('/otp/verify', [RegistrationController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/register', [RegistrationController::class, 'register'])->name('register.store');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

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

    // Cart routes
Route::middleware('auth:customer')->group(function () {

    // Cart page
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    // Add product
    Route::post('/cart/add/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    // Update quantity
    Route::patch('/cart/{cartItem}', [CartController::class, 'update'])
        ->name('cart.update');

    // Remove product
    Route::delete('/cart/{cartItem}', [CartController::class, 'remove'])
        ->name('cart.remove');

    // Clear cart
    Route::delete('/cart', [CartController::class, 'clear'])
        ->name('cart.clear');
});
