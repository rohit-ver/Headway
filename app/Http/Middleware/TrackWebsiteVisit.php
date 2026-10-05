<?php

namespace App\Http\Middleware;

use App\Models\WebsiteVisit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackWebsiteVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Admin panel ko track nahi karna
        if ($request->is('admin*')) {
            return $response;
        }

        // Sirf GET requests track karni hain
        if ($request->isMethod('GET')) {
            WebsiteVisit::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'page_url' => $request->fullUrl(),
                'page_name' => $request->route()?->getName(),
            ]);
        }

        return $response;
    }
}