@extends('layouts.app')

@section('title', 'Inquiry Cart | Headway')

@section('content')

<!-- =========================================================
     INQUIRY CART
========================================================= -->

<section class="hw-cart-section">

    <div class="container">

        <!-- HEADER -->

        <div class="hw-cart-heading">

            <div>
                <span class="hw-cart-tag">
                    YOUR SELECTION
                </span>

                <h1>
                    Inquiry <span>Cart</span>
                </h1>

                <p>
                    Review your selected products before sending your
                    business enquiry to our team.
                </p>
            </div>

            <div class="hw-cart-count">
                <i class="bi bi-bag-check"></i>
                <span>3 Products</span>
            </div>

        </div>


        <div class="row g-4">

            <!-- =================================================
                 CART PRODUCTS
            ================================================== -->

            <div class="col-lg-8">

                <div class="hw-cart-box">

                    <!-- PRODUCT 1 -->

                    <div class="hw-cart-product">

                        <div class="hw-cart-product-image">

                            <img src="{{ asset('uploads/products/makhana-4-suta.jpg') }}"
                                 alt="4 Suta Makhana">

                        </div>

                        <div class="hw-cart-product-info">

                            <span class="hw-cart-category">
                                MAKHANA
                            </span>

                            <h3>
                                4 Suta Makhana
                            </h3>

                            <p>
                                Premium quality fox nuts suitable for
                                retail and bulk requirements.
                            </p>

                            <div class="hw-cart-meta">

                                <span>
                                    <strong>MOQ:</strong> 100 KG
                                </span>

                                <span>
                                    <strong>Packaging:</strong> Bulk
                                </span>

                            </div>

                        </div>


                        <div class="hw-cart-product-action">

                            <span class="hw-price-request">
                                Price on Request
                            </span>

                            <div class="hw-qty-box">

                                <button type="button">
                                    <i class="bi bi-dash"></i>
                                </button>

                                <span>100 KG</span>

                                <button type="button">
                                    <i class="bi bi-plus"></i>
                                </button>

                            </div>

                            <button class="hw-remove-btn">
                                <i class="bi bi-trash3"></i>
                                Remove
                            </button>

                        </div>

                    </div>


                    <!-- PRODUCT 2 -->

                    <div class="hw-cart-product">

                        <div class="hw-cart-product-image">

                            <img src="{{ asset('uploads/products/makhana-5-suta.jpg') }}"
                                 alt="5 Suta Makhana">

                        </div>

                        <div class="hw-cart-product-info">

                            <span class="hw-cart-category">
                                MAKHANA
                            </span>

                            <h3>
                                5 Suta Makhana
                            </h3>

                            <p>
                                Uniform size and excellent crunch for
                                premium retail requirements.
                            </p>

                            <div class="hw-cart-meta">

                                <span>
                                    <strong>MOQ:</strong> 100 KG
                                </span>

                                <span>
                                    <strong>Packaging:</strong> Bulk
                                </span>

                            </div>

                        </div>


                        <div class="hw-cart-product-action">

                            <span class="hw-price-request">
                                Price on Request
                            </span>

                            <div class="hw-qty-box">

                                <button type="button">
                                    <i class="bi bi-dash"></i>
                                </button>

                                <span>150 KG</span>

                                <button type="button">
                                    <i class="bi bi-plus"></i>
                                </button>

                            </div>

                            <button class="hw-remove-btn">
                                <i class="bi bi-trash3"></i>
                                Remove
                            </button>

                        </div>

                    </div>


                    <!-- PRODUCT 3 -->

                    <div class="hw-cart-product">

                        <div class="hw-cart-product-image">

                            <img src="{{ asset('uploads/products/makhana-6-suta.jpg') }}"
                                 alt="6 Suta Makhana">

                        </div>

                        <div class="hw-cart-product-info">

                            <span class="hw-cart-category">
                                MAKHANA
                            </span>

                            <h3>
                                6 Suta Makhana
                            </h3>

                            <p>
                                Large-sized premium fox nuts ideal for
                                export and premium retail.
                            </p>

                            <div class="hw-cart-meta">

                                <span>
                                    <strong>MOQ:</strong> 100 KG
                                </span>

                                <span>
                                    <strong>Packaging:</strong> Bulk
                                </span>

                            </div>

                        </div>


                        <div class="hw-cart-product-action">

                            <span class="hw-price-request">
                                Price on Request
                            </span>

                            <div class="hw-qty-box">

                                <button type="button">
                                    <i class="bi bi-dash"></i>
                                </button>

                                <span>100 KG</span>

                                <button type="button">
                                    <i class="bi bi-plus"></i>
                                </button>

                            </div>

                            <button class="hw-remove-btn">
                                <i class="bi bi-trash3"></i>
                                Remove
                            </button>

                        </div>

                    </div>

                </div>


                <!-- CONTINUE SHOPPING -->

                <div class="hw-continue-shopping">

                    <a href="#">
                        <i class="bi bi-arrow-left"></i>
                        Continue Shopping
                    </a>

                </div>

            </div>


            <!-- =================================================
                 ORDER SUMMARY
            ================================================== -->

            <div class="col-lg-4">

                <div class="hw-cart-summary">

                    <span class="hw-summary-tag">
                        INQUIRY SUMMARY
                    </span>

                    <h2>
                        Your <span>Selection</span>
                    </h2>


                    <div class="hw-summary-line">

                        <span>
                            Selected Products
                        </span>

                        <strong>
                            3
                        </strong>

                    </div>


                    <div class="hw-summary-line">

                        <span>
                            Total Quantity
                        </span>

                        <strong>
                            350 KG
                        </strong>

                    </div>


                    <div class="hw-summary-line">

                        <span>
                            Pricing
                        </span>

                        <strong>
                            On Request
                        </strong>

                    </div>


                    <div class="hw-summary-divider"></div>


                    <div class="hw-summary-total">

                        <span>
                            Estimated Order Value
                        </span>

                        <strong>
                            Price on Request
                        </strong>

                    </div>


                    <div class="hw-summary-note">

                        <i class="bi bi-info-circle"></i>

                        <p>
                            Final pricing will depend on quantity,
                            packaging, destination and other business
                            requirements.
                        </p>

                    </div>


                    <a href="{{ url('/send-inquiry') }}"
                       class="hw-send-inquiry-btn">

                        Send Inquiry

                        <i class="bi bi-arrow-right"></i>

                    </a>


                    <div class="hw-secure-note">

                        <i class="bi bi-shield-check"></i>

                        Your enquiry information is securely handled.

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection