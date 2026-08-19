<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');


Route::get('/about', function () {
    return view('home.about');
})->name('about');


Route::get('/products', function () {
    return view('home.products');
})->name('products');


Route::get('/categories', function () {
    return view('categories.index');
})->name('categories');


Route::get('/why-makhana', function () {
    return view('why-makhana.index');
})->name('why.makhana');


Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');


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

Route::get('/contactus', function () {
    return view('home.contactus');
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