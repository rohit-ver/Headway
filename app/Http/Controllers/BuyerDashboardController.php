<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;

class BuyerDashboardController extends Controller
{
    public function myInquiries()
    {
        $customer = Auth::guard('customer')->user();

        $inquiries = Inquiry::where('customer_id', $customer->id)
            ->with('items.product.category')
            ->latest()
            ->get();

        $stats = [
            'total'     => $inquiries->count(),
            'pending'   => $inquiries->where('status', 'pending')->count(),
            'replied'   => $inquiries->where('status', 'replied')->count(),
            'completed' => $inquiries->where('status', 'completed')->count(),
        ];

        return view('buyer-dashboard.my-inquiries', compact('inquiries', 'stats'));
    }
}