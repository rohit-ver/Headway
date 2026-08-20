@extends('layouts.app')

@section('title', 'Premium Roasted Makhana | Headway')

@section('content')

<!-- =========================================================
     PRODUCT DETAILS
========================================================= -->

<section class="product-details-section">

    <div class="container">

        <!-- Breadcrumb -->
        <div class="product-breadcrumb">

            <a href="{{ url('/') }}">
                Home
            </a>

            <i class="bi bi-chevron-right"></i>

            <a href="#">
                Products
            </a>

            <i class="bi bi-chevron-right"></i>

            <span>
                Premium Roasted Makhana
            </span>

        </div>


        <div class="row g-5 product-details-wrapper">

            <!-- =================================================
                 LEFT : PRODUCT IMAGES
            ================================================== -->

            <div class="col-lg-6">

                <div class="product-gallery">

                    <!-- Main Image -->

                    <div class="main-product-image">

                        <img
                            id="mainProductImage"
                            src="{{ asset('uploads/products/makhana-5-suta.jpg') }}"
                            alt="Premium Roasted Makhana"
                        >

                        <span class="product-image-badge">
                            Premium
                        </span>

                    </div>


                    <!-- Thumbnails -->

                    <div class="product-thumbnails">

                        <button
                            type="button"
                            class="product-thumb active"
                            onclick="changeProductImage(this, '{{ asset('uploads/products/makhana-5-suta.jpg') }}')"
                        >

                            <img
                                src="{{ asset('uploads/products/makhana-5-suta.jpg') }}"
                                alt="Makhana"
                            >

                        </button>


                        <button
                            type="button"
                            class="product-thumb"
                            onclick="changeProductImage(this, '{{ asset('uploads/products/makhana-4-suta.jpg') }}')"
                        >

                            <img
                                src="{{ asset('uploads/products/makhana-4-suta.jpg') }}"
                                alt="Makhana"
                            >

                        </button>


                        <button
                            type="button"
                            class="product-thumb"
                            onclick="changeProductImage(this, '{{ asset('uploads/products/makhana-6-suta.jpg') }}')"
                        >

                            <img
                                src="{{ asset('uploads/products/makhana-6-suta.jpg') }}"
                                alt="Makhana"
                            >

                        </button>


                        <button
                            type="button"
                            class="product-thumb"
                            onclick="changeProductImage(this, '{{ asset('uploads/products/makhana.jpg') }}')"
                        >

                            <img
                                src="{{ asset('uploads/products/makhana.jpg') }}"
                                alt="Makhana Product"
                            >

                        </button>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 RIGHT : PRODUCT INFORMATION
            ================================================== -->

            <div class="col-lg-6">

                <div class="product-info">

                    <!-- Category -->

                    <span class="product-detail-category">
                        MAKHANA
                    </span>


                    <!-- Title -->

                    <h1>
                        Premium Roasted Makhana
                    </h1>


                    <!-- Rating -->

                    <div class="product-rating">

                        <div class="stars">

                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>

                        </div>

                        <span>
                            5.0
                        </span>

                        <span class="review-count">
                            (35 Reviews)
                        </span>

                    </div>


                    <!-- SKU -->

                    <div class="product-sku">

                        SKU:
                        <strong>MAK-001</strong>

                    </div>


                    <!-- Description -->

                    <p class="product-detail-description">

                        High quality premium roasted makhana, rich in
                        nutrition and perfect for healthy snacking.
                        Sourced from the best farms and processed with
                        care to maintain freshness, taste and crunch.

                    </p>


                    <!-- Product Specifications -->

                    <div class="product-specifications">


                        <!-- Packaging -->

                        <div class="product-spec-item">

                            <div class="spec-icon">

                                <i class="bi bi-box-seam"></i>

                            </div>

                            <div>

                                <span>
                                    Packaging Available
                                </span>

                                <strong>
                                    250gm, 500gm, 1kg, Bulk
                                </strong>

                            </div>

                        </div>


                        <!-- MOQ -->

                        <div class="product-spec-item">

                            <div class="spec-icon">

                                <i class="bi bi-cart3"></i>

                            </div>

                            <div>

                                <span>
                                    Minimum Order Quantity (MOQ)
                                </span>

                                <strong>
                                    100 KG
                                </strong>

                            </div>

                        </div>


                        <!-- Availability -->

                        <div class="product-spec-item">

                            <div class="spec-icon">

                                <i class="bi bi-check-circle"></i>

                            </div>

                            <div>

                                <span>
                                    Availability
                                </span>

                                <strong class="available">
                                    In Stock
                                </strong>

                            </div>

                        </div>


                        <!-- Suitable For -->

                        <div class="product-spec-item">

                            <div class="spec-icon">

                                <i class="bi bi-shop"></i>

                            </div>

                            <div>

                                <span>
                                    Suitable For
                                </span>

                                <strong>
                                    Retailers, Wholesalers,
                                    Distributors, Exporters
                                </strong>

                            </div>

                        </div>

                    </div>


                    <!-- Divider -->

                    <div class="product-detail-divider"></div>


                    <!-- CTA Buttons -->

                    <div class="product-detail-actions">

                        <a
                            href="#"
                            class="request-quote-btn"
                        >

                            <i class="bi bi-chat-square-text"></i>

                            Request a Quote

                        </a>


                        <button
                            type="button"
                            class="inquiry-cart-btn"
                        >

                            <i class="bi bi-cart-plus"></i>

                            Add to Inquiry Cart

                        </button>

                    </div>


                    <!-- Bottom Note -->

                    <div class="product-business-note">

                        <i class="bi bi-shield-check"></i>

                        <div>

                            <strong>
                                Looking for bulk supply?
                            </strong>

                            <p>
                                Get customized pricing and packaging
                                options for your business requirements.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     PRODUCT INFORMATION
========================================================= -->

<section class="product-extra-section">

    <div class="container">

        <div class="product-extra-card">

            <div class="product-extra-heading">

                <span>
                    PRODUCT INFORMATION
                </span>

                <h2>
                    Why Choose Our <strong>Products ?</strong>
                </h2>

            </div>


            <div class="row g-4">

                <div class="col-md-4">

                    <div class="extra-feature">

                        <i class="bi bi-award"></i>

                        <h4>
                            Premium Quality
                        </h4>

                        <p>
                            Quality is at the heart of everything we offer. Our products are carefully sourced from trusted partners and processed under stringent quality and hygiene standards to ensure consistent quality, freshness, safety and authentic taste in every batch.
                        </p>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="extra-feature">

                        <i class="bi bi-box-seam"></i>

                        <h4>
                            Flexible Packaging
                        </h4>

                        <p>
                            Flexible packaging options designed to suit retail,
                            wholesale and bulk requirements while ensuring product freshness, quality and protection.
                        </p>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="extra-feature">

                        <i class="bi bi-truck"></i>

                        <h4>
                            Bulk Supply
                        </h4>

                        <p>
                            Reliable bulk supply with consistent quality and timely fulfilment for retailers, 
                            wholesalers, distributors and exporters.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


@endsection


@push('scripts')

<script>

function changeProductImage(button, imageUrl) {

    const mainImage = document.getElementById('mainProductImage');

    mainImage.style.opacity = '0';

    setTimeout(function () {

        mainImage.src = imageUrl;

        mainImage.style.opacity = '1';

    }, 150);


    document
        .querySelectorAll('.product-thumb')
        .forEach(function (thumb) {

            thumb.classList.remove('active');

        });


    button.classList.add('active');

}

</script>

@endpush
