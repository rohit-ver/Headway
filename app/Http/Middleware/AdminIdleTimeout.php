<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminIdleTimeout
{
    // Kitne second idle rehne pe logout (300 = 5 minute)
    protected int $timeout = 300;

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $last = session('admin_last_activity');

            if ($last && (now()->timestamp - $last) > $this->timeout) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                // Livewire/AJAX request: 419 do, Livewire page refresh karwa dega
                if ($request->hasHeader('X-Livewire') || $request->expectsJson()) {
                    abort(419);
                }

                return redirect()->route('filament.admin.auth.login');
            }

            session(['admin_last_activity' => now()->timestamp]);
        }

        return $next($request);
    }
}