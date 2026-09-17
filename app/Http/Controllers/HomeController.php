<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)
            ->with(['products' => function ($query) {
                $query->where('status', 1);
            }])
            ->orderBy('id')
            ->get();

        return view('home.index', compact('categories'));
    }

    public function products()
    {
        $categories = Category::where('status', 1)
            ->with(['products' => function ($query) {
                $query->where('status', 1);
            }])
            ->orderBy('id')
            ->get();

        $products = \App\Models\Product::where('status', 1)
            ->paginate(12);

        return view('home.products', compact('categories', 'products'));
    }


    public function productDetail($id, $slug)
    {
        $product = \App\Models\Product::with('images')
            ->where('status', 1)
            ->where('id', $id)
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = \App\Models\Product::where('id', '!=', $id)
            ->where('status', 1)
            ->take(4)
            ->get();

        return view('home.product-details', compact('product', 'relatedProducts'));
    }


    public function buyerInquiry()
    {
        $customer = \Illuminate\Support\Facades\Auth::guard('customer')->user();

        $cartItems = \App\Models\CartItem::where('customer_id', $customer->id)
            ->with('product.category')
            ->get()
            ->map(function ($item) {
                return [
                    'product' => $this->normalizeProductForInquiry($item->product),
                    'quantity' => $item->quantity,
                ];
            });

        $products = \App\Models\Product::where('status', 'active')
            ->with('category')
            ->get()
            ->map(function ($product) {
                return $this->normalizeProductForInquiry($product);
            });

        return view('home.buyer-inquiry', [
            'cartItems' => $cartItems,
            'products' => $products,
            'customer' => $customer,
        ]);
    }

    private function normalizeProductForInquiry($product)
    {
        if (!$product) {
            return null;
        }

        preg_match('/^(\d+)\s*(.*)$/', trim($product->moq ?? ''), $matches);

        $minQuantity = isset($matches[1]) ? (int) $matches[1] : 1;
        $unit = (isset($matches[2]) && $matches[2] !== '') ? $matches[2] : 'Units';

        return [
            'id' => $product->id,
            'name' => $product->name,
            'category_name' => optional($product->category)->name,
            'image_url' => $product->main_image
                ? asset('storage/' . $product->main_image)
                : asset('images/no-image.png'),
            'unit' => $unit,
            'min_quantity' => $minQuantity,
        ];
    }
}
