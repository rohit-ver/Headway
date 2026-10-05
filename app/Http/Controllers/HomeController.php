<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductView;
use App\Models\AboutPage;
class HomeController extends Controller
{
    public function index()
    {
          $about = AboutPage::first();
        //   return view('home.about', compact('about'));
        $categories = Category::where('status', 1)
            ->with(['products' => function ($query) {
                $query->where('status', 1);
            }])
            ->orderBy('id')
            ->get();

        return view('home.index', compact('categories', 'about'));

       
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


    public function productDetail(Request $request, $id, $slug)
    {
        $product = \App\Models\Product::with('images')
            ->where('status', 1)
            ->where('id', $id)
            ->where('slug', $slug)
            ->firstOrFail();

        // Product view track karo (same IP se 30 min me dobara count nahi hoga)
        $alreadyViewed = ProductView::where('product_id', $product->id)
            ->where('ip_address', $request->ip())
            ->where('created_at', '>=', now()->subMinutes(30))
            ->exists();

        if (! $alreadyViewed) {
            ProductView::create([
                'product_id' => $product->id,
                'ip_address' => $request->ip(),
            ]);
        }

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
                ? asset('uploads/' . $product->main_image)
                : asset('images/no-image.png'),
            'unit' => $unit,
            'min_quantity' => $minQuantity,
        ];
    }

    public function myInquiries()
    {
        $customer = \Illuminate\Support\Facades\Auth::guard('customer')->user();

        if (! $customer) {
            return redirect('/products');
        }

        $inquiries = \App\Models\Inquiry::where('customer_id', $customer->id)
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

    public function profile()
    {
        $customer = \Illuminate\Support\Facades\Auth::guard('customer')->user();

        if (! $customer) {
            return redirect('/products');
        }

        return view('buyer-dashboard.profile', compact('customer'));
    }

    public function updateProfile(Request $request)
    {
        $customer = \Illuminate\Support\Facades\Auth::guard('customer')->user();

        if (! $customer) {
            return redirect('/products');
        }

        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:customers,email,' . $customer->id,
            'company_name'  => 'nullable|string|max:255',
            'business_type' => 'nullable|in:Wholesaler,Distributor,Retailer,Importer,Exporter',
            'city'          => 'nullable|string|max:255',
        ]);

        // sirf wahi fields save karo jo customers table me asli me hain
        $columns = \Illuminate\Support\Facades\Schema::getColumnListing($customer->getTable());
        $data = array_intersect_key($data, array_flip($columns));

        $customer->forceFill($data)->save();

        return back()->with('success', 'Your profile has been updated successfully.');
    }

    public function myOrders()
    {
        $customer = \Illuminate\Support\Facades\Auth::guard('customer')->user();

        if (! $customer) {
            return redirect('/products');
        }

        $orders = \App\Models\Order::where('customer_id', $customer->id)
            ->with('items.product.category')
            ->latest()
            ->get();

        $stats = [
            'total'      => $orders->count(),
            'pending'    => $orders->where('status', 'pending')->count(),
            'processing' => $orders->where('status', 'processing')->count(),
            'delivered'  => $orders->where('status', 'delivered')->count(),
        ];

        return view('buyer-dashboard.orders', compact('orders', 'stats'));
    }}
