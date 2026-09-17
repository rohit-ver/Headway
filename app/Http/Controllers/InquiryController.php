<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InquiryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SHOW FORM
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $customer = auth('customer')->user();

        $cartItems = CartItem::with('product')
            ->where('customer_id', $customer->id)
            ->get();

        $products = \App\Models\Product::all(); // "Add More Products" modal ke liye

        return view('home.buyer-inquiry', [
            'customer'  => $customer,
            'cartItems' => $cartItems,
            'products'  => $products,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | STORE INQUIRY
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name'          => 'required|string|max:255',
            'company_name'           => 'required|string|max:255',
            'email'                  => 'required|email',
            'customer_type'          => 'required|in:domestic,international',
            'city'                   => 'nullable|string',
            'message'                => 'nullable|string',
            'products'               => 'required|array|min:1',
            'products.*.product_id'  => 'required|exists:products,id',
            'products.*.quantity'    => 'required|integer|min:1',
        ]);

        $customer = auth('customer')->user();

        $inquiry = DB::transaction(function () use ($request, $customer) {

            $inquiry = Inquiry::create([
                'customer_id'   => $customer->id,
                'name'          => $request->customer_name,
                'company_name'  => $request->company_name,
                'email'         => $request->email,
                'country_code'  => $customer->country_code,
                'phone'         => $customer->phone,      // 👈 DB se, form se nahi
                'customer_type' => $request->customer_type,
                'city'          => $request->city,
                'message'       => $request->message,
                'status'        => 'pending',
            ]);

            foreach ($request->products as $item) {

                $product = \App\Models\Product::find($item['product_id']);

                $inquiry->items()->create([
                    'product_id'   => $product->id,
                    'product_name' => $product->name,
                    'quantity'     => $item['quantity'],
                    'unit'         => $product->unit ?? 'Units',
                    'item_status'  => 'pending',
                ]);
            }

            // Inquiry submit hone ke baad cart clear kar do
            CartItem::where('customer_id', $customer->id)->delete();

            return $inquiry;
        });

        // TODO: yahan Telegram bot / email notification client ko bhejo

        return redirect()
            ->route('buyer-inquiry')
            ->with('success', 'Your inquiry has been submitted successfully!');
    }
}