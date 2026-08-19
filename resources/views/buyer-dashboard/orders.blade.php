@extends('buyer-dashboard.layouts.buyer')

@section('title', 'My Orders | HeadwayStrata')

@section('content')

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


    {{-- ORDER SUMMARY --}}
    <div class="order-summary-row">

        <div class="order-summary-card">
            <div class="order-summary-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <div>
                <span>Total Orders</span>
                <strong>12</strong>
            </div>
        </div>


        <div class="order-summary-card">
            <div class="order-summary-icon pending">
                <i class="bi bi-clock-history"></i>
            </div>

            <div>
                <span>Pending</span>
                <strong>02</strong>
            </div>
        </div>


        <div class="order-summary-card">
            <div class="order-summary-icon processing">
                <i class="bi bi-arrow-repeat"></i>
            </div>

            <div>
                <span>Processing</span>
                <strong>03</strong>
            </div>
        </div>


        <div class="order-summary-card">
            <div class="order-summary-icon delivered">
                <i class="bi bi-check2-circle"></i>
            </div>

            <div>
                <span>Delivered</span>
                <strong>07</strong>
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

                <option value="all">
                    All Orders
                </option>

                <option value="pending">
                    Pending
                </option>

                <option value="processing">
                    Processing
                </option>

                <option value="shipped">
                    Shipped
                </option>

                <option value="delivered">
                    Delivered
                </option>

            </select>

        </div>

    </div>


    {{-- ORDERS --}}
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
                12 Orders
            </span>

        </div>


        {{-- ORDER 1 --}}
        <div class="order-item"
             data-status="delivered"
             data-search="HW-10245 6 Suta Makhana">

            <div class="order-main">

                <div class="order-product-image">
                    <img src="{{ asset('uploads/products/makhana-6-suta.jpg') }}"
                         alt="6 Suta Makhana">
                </div>


                <div class="order-info">

                    <div class="order-id">
                        Order #HW-10245
                    </div>

                    <h4>
                        6 Suta Makhana
                    </h4>

                    <p>
                        Premium Makhana
                        <span>•</span>
                        100 Boxes
                    </p>

                    <small>
                        Placed on 12 Aug 2026
                    </small>

                </div>

            </div>


            <div class="order-meta">

                <strong>
                    ₹48,500
                </strong>

                <span class="order-status delivered-status">
                    <i class="bi bi-check-circle-fill"></i>
                    Delivered
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


        {{-- ORDER 2 --}}
        <div class="order-item"
             data-status="processing"
             data-search="HW-10244 5 Suta Makhana">

            <div class="order-main">

                <div class="order-product-image">

                    <img src="{{ asset('uploads/products/makhana-5-suta.jpg') }}"
                         alt="5 Suta Makhana">

                </div>


                <div class="order-info">

                    <div class="order-id">
                        Order #HW-10244
                    </div>

                    <h4>
                        5 Suta Makhana
                    </h4>

                    <p>
                        Premium Grade
                        <span>•</span>
                        75 Boxes
                    </p>

                    <small>
                        Placed on 10 Aug 2026
                    </small>

                </div>

            </div>


            <div class="order-meta">

                <strong>
                    ₹32,750
                </strong>

                <span class="order-status processing-status">
                    <i class="bi bi-arrow-repeat"></i>
                    Processing
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


        {{-- ORDER 3 --}}
        <div class="order-item"
             data-status="pending"
             data-search="HW-10243 Aloo Bhujia">

            <div class="order-main">

                <div class="order-product-image">

                    <img src="{{ asset('uploads/products/aloo-bhujia.jpg') }}"
                         alt="Aloo Bhujia">

                </div>


                <div class="order-info">

                    <div class="order-id">
                        Order #HW-10243
                    </div>

                    <h4>
                        Aloo Bhujia
                    </h4>

                    <p>
                        Namkeen
                        <span>•</span>
                        50 Cartons
                    </p>

                    <small>
                        Placed on 08 Aug 2026
                    </small>

                </div>

            </div>


            <div class="order-meta">

                <strong>
                    ₹21,250
                </strong>

                <span class="order-status pending-status">
                    <i class="bi bi-clock-fill"></i>
                    Pending
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


        {{-- ORDER 4 --}}
        <div class="order-item"
             data-status="shipped"
             data-search="HW-10242 Mix Namkeen">

            <div class="order-main">

                <div class="order-product-image">

                    <img src="{{ asset('uploads/products/mix-namkeen.jpg') }}"
                         alt="Mix Namkeen">

                </div>


                <div class="order-info">

                    <div class="order-id">
                        Order #HW-10242
                    </div>

                    <h4>
                        Mix Namkeen
                    </h4>

                    <p>
                        Wholesale Pack
                        <span>•</span>
                        80 Cartons
                    </p>

                    <small>
                        Placed on 05 Aug 2026
                    </small>

                </div>

            </div>


            <div class="order-meta">

                <strong>
                    ₹29,800
                </strong>

                <span class="order-status shipped-status">
                    <i class="bi bi-truck"></i>
                    Shipped
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


    </div>


    {{-- EMPTY STATE --}}
    <div class="orders-empty" id="ordersEmpty">

        <div class="orders-empty-icon">
            <i class="bi bi-box"></i>
        </div>

        <h3>
            No Orders Found
        </h3>

        <p>
            We couldn't find any order matching your search.
        </p>

    </div>

</div>

@endsection

<script>

document.addEventListener("DOMContentLoaded", function () {

    const searchInput = document.getElementById("orderSearch");
    const statusFilter = document.getElementById("orderStatusFilter");
    const orders = document.querySelectorAll(".order-item");
    const emptyState = document.getElementById("ordersEmpty");


    function filterOrders() {

        const searchValue = searchInput.value.toLowerCase().trim();
        const statusValue = statusFilter.value;

        let visibleOrders = 0;


        orders.forEach(function (order) {

            const orderText =
                order.getAttribute("data-search").toLowerCase();

            const orderStatus =
                order.getAttribute("data-status");


            const searchMatch =
                orderText.includes(searchValue);

            const statusMatch =
                statusValue === "all" ||
                orderStatus === statusValue;


            if (searchMatch && statusMatch) {

                order.style.display = "grid";

                order.style.animation =
                    "buyerPageIn .35s ease both";

                visibleOrders++;

            } else {

                order.style.display = "none";

            }

        });


        if (visibleOrders === 0) {

            document.querySelector(".orders-card").style.display = "none";

            emptyState.style.display = "block";

        } else {

            document.querySelector(".orders-card").style.display = "block";

            emptyState.style.display = "none";

        }

    }


    searchInput.addEventListener("input", filterOrders);

    statusFilter.addEventListener("change", filterOrders);

});

</script>