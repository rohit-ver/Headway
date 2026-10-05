@extends('buyer-dashboard.layouts.buyer')

@section('title', 'My Orders | HeadwayStrata')

@section('content')

@php
    // status ke hisaab se class aur icon
    $statusMeta = [
        'pending'    => ['label' => 'Pending',    'class' => 'pending-status',    'icon' => 'bi-clock-fill'],
        'processing' => ['label' => 'Processing', 'class' => 'processing-status', 'icon' => 'bi-arrow-repeat'],
        'shipped'    => ['label' => 'Shipped',    'class' => 'shipped-status',    'icon' => 'bi-truck'],
        'delivered'  => ['label' => 'Delivered',  'class' => 'delivered-status',  'icon' => 'bi-check-circle-fill'],
    ];
    $pad = fn ($n) => str_pad($n, 2, '0', STR_PAD_LEFT);
@endphp

<div class="buyer-page">

    {{-- PAGE HEADER --}}
    <div class="buyer-page-header">
        <div>
            <span class="buyer-page-tag">ORDER MANAGEMENT</span>

            <h1>
                My <span>Orders</span>
            </h1>

            <p>
                Track your orders, review order details and manage your
                business purchases from one place.
            </p>
        </div>

        <a href="{{ url('/products') }}" class="buyer-primary-btn">
            <i class="bi bi-plus-lg"></i>
            Continue Shopping
        </a>
    </div>


    {{-- ORDER SUMMARY (dynamic) --}}
    <div class="order-summary-row">

        <div class="order-summary-card">
            <div class="order-summary-icon">
                <i class="bi bi-box-seam"></i>
            </div>
            <div>
                <span>Total Orders</span>
                <strong>{{ $pad($stats['total']) }}</strong>
            </div>
        </div>

        <div class="order-summary-card">
            <div class="order-summary-icon pending">
                <i class="bi bi-clock-history"></i>
            </div>
            <div>
                <span>Pending</span>
                <strong>{{ $pad($stats['pending']) }}</strong>
            </div>
        </div>

        <div class="order-summary-card">
            <div class="order-summary-icon processing">
                <i class="bi bi-arrow-repeat"></i>
            </div>
            <div>
                <span>Processing</span>
                <strong>{{ $pad($stats['processing']) }}</strong>
            </div>
        </div>

        <div class="order-summary-card">
            <div class="order-summary-icon delivered">
                <i class="bi bi-check2-circle"></i>
            </div>
            <div>
                <span>Delivered</span>
                <strong>{{ $pad($stats['delivered']) }}</strong>
            </div>
        </div>

    </div>


    {{-- FILTER BAR --}}
    <div class="orders-filter-card">

        <div class="orders-search">
            <i class="bi bi-search"></i>

            <input type="text"
                   id="orderSearch"
                   placeholder="Search by order ID or product...">
        </div>

        <div class="orders-filter">
            <select id="orderStatusFilter">
                <option value="all">All Orders</option>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
            </select>
        </div>

    </div>


    {{-- ORDERS (dynamic) --}}
    @if ($orders->isNotEmpty())

        <div class="orders-card">

            <div class="orders-card-header">

                <div>
                    <span class="buyer-page-tag">
                        RECENT ORDERS
                    </span>

                    <h3>
                        Order History
                    </h3>
                </div>

                <span class="orders-count">
                    {{ $stats['total'] }} {{ \Illuminate\Support\Str::plural('Order', $stats['total']) }}
                </span>

            </div>


            @foreach ($orders as $order)

                @php
                    $status = strtolower($order->status ?? 'pending');
                    if (! isset($statusMeta[$status])) {
                        $status = 'pending';
                    }

                    $items     = $order->items;
                    $firstItem = $items->first();
                    $product   = optional($firstItem)->product;
                    $moreCount = max($items->count() - 1, 0);

                    $orderNumber = $order->order_number ?? ('HW-' . $order->id);
                    $productName = optional($firstItem)->product_name
                        ?? optional($product)->name
                        ?? 'Product removed';

                    $image = $product && $product->main_image
                        ? asset('uploads/' . $product->main_image)
                        : asset('images/no-image.png');

                    $searchText = $orderNumber . ' ' . $items->pluck('product_name')->implode(' ');
                @endphp

                <div class="order-item"
                     data-status="{{ $status }}"
                     data-search="{{ $searchText }}">

                    <div class="order-main">

                        <div class="order-product-image">
                            <img src="{{ $image }}"
                                 alt="{{ $productName }}">
                        </div>

                        <div class="order-info">

                            <div class="order-id">
                                Order #{{ $orderNumber }}
                            </div>

                            <h4>
                                {{ $productName }}
                                @if ($moreCount > 0)
                                    <small>+{{ $moreCount }} more</small>
                                @endif
                            </h4>

                            <p>
                                {{ optional(optional($product)->category)->name }}
                                @if ($firstItem)
                                    @if (optional(optional($product)->category)->name)
                                        <span>•</span>
                                    @endif
                                    {{ $firstItem->quantity }} {{ $firstItem->unit ?? '' }}
                                @endif
                            </p>

                            <small>
                                Placed on {{ $order->created_at->format('d M Y') }}
                            </small>

                        </div>

                    </div>


                    <div class="order-meta">

                        <strong>
                            @if (! is_null($order->total_amount))
                                ₹{{ number_format($order->total_amount) }}
                            @else
                                Quote pending
                            @endif
                        </strong>

                        <span class="order-status {{ $statusMeta[$status]['class'] }}">
                            <i class="bi {{ $statusMeta[$status]['icon'] }}"></i>
                            {{ $statusMeta[$status]['label'] }}
                        </span>

                    </div>


                    <div class="order-action">

                        <a href="#"
                           class="order-view-btn">

                            View Details

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @endif


    {{-- EMPTY STATE --}}
    <div class="orders-empty"
         id="ordersEmpty"
         style="display: {{ $orders->isEmpty() ? 'block' : 'none' }};">

        <div class="orders-empty-icon">
            <i class="bi bi-box"></i>
        </div>

        @if ($orders->isEmpty())
            <h3>No Orders Yet</h3>
            <p>
                Your orders will appear here once you place one.
            </p>
        @else
            <h3>No Orders Found</h3>
            <p>
                We couldn't find any order matching your search.
            </p>
        @endif

    </div>

</div>

@endsection


{{-- Script section ke andar hona zaruri hai, warna layout use render nahi karta --}}
@section('scripts')

<script>

document.addEventListener("DOMContentLoaded", function () {

    const searchInput  = document.getElementById("orderSearch");
    const statusFilter = document.getElementById("orderStatusFilter");
    const orders       = document.querySelectorAll(".order-item");
    const emptyState   = document.getElementById("ordersEmpty");
    const ordersCard   = document.querySelector(".orders-card");

    // Koi order nahi hai to filter ki zarurat nahi
    if (!ordersCard) return;

    function filterOrders() {

        const searchValue = searchInput.value.toLowerCase().trim();
        const statusValue = statusFilter.value;

        let visibleOrders = 0;

        orders.forEach(function (order) {

            const orderText   = order.getAttribute("data-search").toLowerCase();
            const orderStatus = order.getAttribute("data-status");

            const searchMatch = orderText.includes(searchValue);
            const statusMatch = statusValue === "all" || orderStatus === statusValue;

            if (searchMatch && statusMatch) {
                order.style.display = "grid";
                order.style.animation = "buyerPageIn .35s ease both";
                visibleOrders++;
            } else {
                order.style.display = "none";
            }

        });

        if (visibleOrders === 0) {
            ordersCard.style.display = "none";
            emptyState.style.display = "block";
        } else {
            ordersCard.style.display = "block";
            emptyState.style.display = "none";
        }

    }

    searchInput.addEventListener("input", filterOrders);
    statusFilter.addEventListener("change", filterOrders);

});

</script>

@endsection