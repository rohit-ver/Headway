<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {

            $cartCount = 0;

            if (Auth::guard('customer')->check()) {
                $cartCount = CartItem::where(
                    'customer_id',
                    Auth::guard('customer')->id()
                )->count();
            }

            $view->with('cartCount', $cartCount);
        });
    }
}