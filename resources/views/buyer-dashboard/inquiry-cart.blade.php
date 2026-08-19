@extends('buyer-dashboard.layouts.buyer')

@section('title', 'Inquiry Cart | HeadwayStrata')

@section('content')

<div class="buyer-page inquiry-cart-page">

    {{-- PAGE HEADER --}}
    <div class="buyer-page-header">

        <div>
            <span class="buyer-page-tag">
                BUSINESS ENQUIRY
            </span>

            <h1>
                Inquiry <span>Cart</span>
            </h1>

            <p>
                Review the products and quantities you want to enquire about
                before sending your business requirement to our team.
            </p>
        </div>

        <a href="{{ url('/products') }}"
           class="buyer-primary-btn">

            <i class="bi bi-plus-lg"></i>

            Add More Products

        </a>

    </div>


    {{-- CART LAYOUT --}}
    <div class="inquiry-cart-layout">


        {{-- =========================================
             LEFT : PRODUCTS
        ========================================== --}}

        <div class="inquiry-products-card">

            <div class="inquiry-card-header">

                <div>
                    <span class="buyer-page-tag">
                        SELECTED PRODUCTS
                    </span>

                    <h3>
                        Your Inquiry Items
                    </h3>
                </div>

                <span class="inquiry-items-count">
                    3 Items
                </span>

            </div>


            {{-- PRODUCT 1 --}}
            <div class="inquiry-product-item">

                <div class="inquiry-product-image">

                    <img src="{{ asset('uploads/products/makhana-6-suta.jpg') }}"
                         alt="6 Suta Makhana">

                </div>


                <div class="inquiry-product-info">

                    <span class="inquiry-product-category">
                        MAKHANA
                    </span>

                    <h4>
                        6 Suta Makhana
                    </h4>

                    <p>
                        Premium Grade Fox Nuts
                    </p>

                    <span class="inquiry-moq">
                        MOQ: 50 Boxes
                    </span>

                </div>


                <div class="inquiry-quantity">

                    <label>
                        Quantity
                    </label>

                    <div class="quantity-control">

                        <button type="button"
                                onclick="changeQuantity(this, -1)">
                            <i class="bi bi-dash"></i>
                        </button>

                        <input type="number"
                               value="100"
                               min="50">

                        <button type="button"
                                onclick="changeQuantity(this, 1)">
                            <i class="bi bi-plus"></i>
                        </button>

                    </div>

                </div>


                <div class="inquiry-product-action">

                    <strong>
                        ₹48,500
                    </strong>

                    <button type="button"
                            class="remove-inquiry"
                            onclick="removeInquiryItem(this)">

                        <i class="bi bi-trash3"></i>

                        Remove

                    </button>

                </div>

            </div>


            {{-- PRODUCT 2 --}}
            <div class="inquiry-product-item">

                <div class="inquiry-product-image">

                    <img src="{{ asset('uploads/products/makhana-5-suta.jpg') }}"
                         alt="5 Suta Makhana">

                </div>


                <div class="inquiry-product-info">

                    <span class="inquiry-product-category">
                        MAKHANA
                    </span>

                    <h4>
                        5 Suta Makhana
                    </h4>

                    <p>
                        Premium Quality Makhana
                    </p>

                    <span class="inquiry-moq">
                        MOQ: 50 Boxes
                    </span>

                </div>


                <div class="inquiry-quantity">

                    <label>
                        Quantity
                    </label>

                    <div class="quantity-control">

                        <button type="button"
                                onclick="changeQuantity(this, -1)">
                            <i class="bi bi-dash"></i>
                        </button>

                        <input type="number"
                               value="75"
                               min="50">

                        <button type="button"
                                onclick="changeQuantity(this, 1)">
                            <i class="bi bi-plus"></i>
                        </button>

                    </div>

                </div>


                <div class="inquiry-product-action">

                    <strong>
                        ₹32,750
                    </strong>

                    <button type="button"
                            class="remove-inquiry"
                            onclick="removeInquiryItem(this)">

                        <i class="bi bi-trash3"></i>

                        Remove

                    </button>

                </div>

            </div>


            {{-- PRODUCT 3 --}}
            <div class="inquiry-product-item">

                <div class="inquiry-product-image">

                    <img src="{{ asset('uploads/products/aloo-bhujia.jpg') }}"
                         alt="Aloo Bhujia">

                </div>


                <div class="inquiry-product-info">

                    <span class="inquiry-product-category">
                        NAMKEEN
                    </span>

                    <h4>
                        Aloo Bhujia
                    </h4>

                    <p>
                        Classic Crunchy Namkeen
                    </p>

                    <span class="inquiry-moq">
                        MOQ: 25 Cartons
                    </span>

                </div>


                <div class="inquiry-quantity">

                    <label>
                        Quantity
                    </label>

                    <div class="quantity-control">

                        <button type="button"
                                onclick="changeQuantity(this, -1)">
                            <i class="bi bi-dash"></i>
                        </button>

                        <input type="number"
                               value="50"
                               min="25">

                        <button type="button"
                                onclick="changeQuantity(this, 1)">
                            <i class="bi bi-plus"></i>
                        </button>

                    </div>

                </div>


                <div class="inquiry-product-action">

                    <strong>
                        ₹21,250
                    </strong>

                    <button type="button"
                            class="remove-inquiry"
                            onclick="removeInquiryItem(this)">

                        <i class="bi bi-trash3"></i>

                        Remove

                    </button>

                </div>

            </div>


            {{-- CART FOOTER --}}
            <div class="inquiry-cart-footer">

                <a href="{{ url('/products') }}"
                   class="continue-shopping">

                    <i class="bi bi-arrow-left"></i>

                    Continue Shopping

                </a>

                <button type="button"
                        class="clear-inquiry"
                        onclick="clearInquiryCart()">

                    <i class="bi bi-trash3"></i>

                    Clear Cart

                </button>

            </div>

        </div>


        {{-- =========================================
             RIGHT : SUMMARY
        ========================================== --}}

        <div class="inquiry-summary-card">

            <div class="inquiry-summary-header">

                <span class="buyer-page-tag">
                    INQUIRY SUMMARY
                </span>

                <h3>
                    Business Requirement
                </h3>

            </div>


            <div class="summary-row">

                <span>
                    Products
                </span>

                <strong>
                    3
                </strong>

            </div>


            <div class="summary-row">

                <span>
                    Total Quantity
                </span>

                <strong>
                    225 Units
                </strong>

            </div>


            <div class="summary-row">

                <span>
                    Estimated Value
                </span>

                <strong>
                    ₹1,02,500
                </strong>

            </div>


            <div class="summary-divider"></div>


            {{-- NOTE --}}
            <div class="inquiry-note">

                <label>
                    <i class="bi bi-chat-left-text"></i>

                    Inquiry Note
                </label>

                <textarea
                    id="inquiryNote"
                    rows="4"
                    placeholder="Tell us about your packaging, quantity, delivery or other business requirements..."></textarea>

            </div>


            {{-- DELIVERY --}}
            <div class="summary-info">

                <i class="bi bi-shield-check"></i>

                <div>

                    <strong>
                        Business Pricing
                    </strong>

                    <p>
                        Final pricing will be confirmed by our sales team
                        based on quantity and requirements.
                    </p>

                </div>

            </div>


            <button type="button"
                    class="send-inquiry-btn"
                    onclick="sendInquiry()">

                Send Inquiry

                <i class="bi bi-arrow-right"></i>

            </button>


            <small class="inquiry-security">

                <i class="bi bi-lock-fill"></i>

                Your business information is kept confidential.

            </small>

        </div>

    </div>

</div>

@endsection