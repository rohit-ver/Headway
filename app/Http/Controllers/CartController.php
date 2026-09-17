<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Show customer's cart
     */
    public function index()
    {
        $customer = Auth::guard('customer')->user();

        $cartItems = CartItem::where('customer_id', $customer->id)
            ->with('product')
            ->latest()
            ->get();

        return view('home.cart', compact('cartItems'));
    }

    /**
     * Add product to cart
     */
    public function add(Request $request, Product $product)
    {
        $customer = Auth::guard('customer')->user();

        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.',
            ], 401);
        }

        // Only active products can be added
        if ($product->status !== 'active') {
            return response()->json([
                'success' => false,
                'message' => 'This product is currently unavailable.',
            ], 422);
        }

        $validated = $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'unit' => [
                'nullable',
                'string',
                'max:50',
            ],
        ]);

        DB::transaction(function () use (
            $customer,
            $product,
            $validated
        ) {

            $cartItem = CartItem::where('customer_id', $customer->id)
                ->where('product_id', $product->id)
                ->first();

            if ($cartItem) {

                // Product already exists in cart
                $cartItem->update([
                    'quantity' =>
                        $cartItem->quantity + $validated['quantity'],

                    'unit' =>
                        $validated['unit']
                        ?? $cartItem->unit,
                ]);

            } else {

                // New product
                CartItem::create([
                    'customer_id' => $customer->id,
                    'product_id' => $product->id,

                    'quantity' =>
                        $validated['quantity'],

                    'unit' =>
                        $validated['unit'] ?? 'box',
                ]);
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully.',

            'cart_count' => CartItem::where(
                'customer_id',
                $customer->id
            )->count(),
        ]);
    }

    /**
     * Update cart item
     */
    public function update(
        Request $request,
        CartItem $cartItem
    ) {
        $customer = Auth::guard('customer')->user();

        // Security check
        if (
            !$customer ||
            $cartItem->customer_id !== $customer->id
        ) {
            abort(403);
        }

        $validated = $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'unit' => [
                'nullable',
                'string',
                'max:50',
            ],
        ]);

        $cartItem->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully.',
        ]);
    }

    /**
     * Remove single cart item
     */
    public function remove(CartItem $cartItem)
    {
        $customer = Auth::guard('customer')->user();

        // Security check
        if (
            !$customer ||
            $cartItem->customer_id !== $customer->id
        ) {
            abort(403);
        }

        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product removed from cart.',
        ]);
    }

    /**
     * Clear complete cart
     */
    public function clear()
    {
        $customer = Auth::guard('customer')->user();

        CartItem::where(
            'customer_id',
            $customer->id
        )->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cart cleared successfully.',
        ]);
    }
}