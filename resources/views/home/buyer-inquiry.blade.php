@extends('layouts.app')

@section('title', 'Request a Quote | HeadwayStrata')

@section('content')

<div class="inquiry-page">

    <div class="inquiry-container">

        {{-- =====================================================
             HERO
        ====================================================== --}}

        <div class="inquiry-hero">

            <span class="inquiry-eyebrow">
                HeadwayStrata
            </span>

            <h1>
                Request a Quote
            </h1>

            <p>
                Tell us what you're looking for and our team will
                get back to you with pricing, availability and
                further details.
            </p>

        </div>


        {{-- =====================================================
             MAIN CARD
        ====================================================== --}}

        <div class="inquiry-card">

            <form
                id="buyerInquiryForm"
                action="#"
                method="POST"
            >

                @csrf


                {{-- =================================================
                     SELECTED PRODUCTS
                ================================================== --}}

                <div class="section-heading">

                    <h2>
                        Your Selected Products
                    </h2>

                    <p>
                        Review the products you're interested in and
                        adjust the required quantities.
                    </p>

                </div>


                <div class="products-box">

                    {{-- Selected Products --}}
                    <div id="selectedProductsContainer"></div>


                    {{-- Empty State --}}
                    <div
                        id="emptyProducts"
                        class="empty-products"
                    >

                        <div class="empty-products-icon">
                            +
                        </div>

                        <h3>
                            No Products Selected
                        </h3>

                        <p>
                            Select products from our collection
                            to add them to your inquiry.
                        </p>

                        <a
                            href="{{ url('/products') }}"
                            class="browse-products-btn"
                        >
                            Browse Products
                        </a>

                    </div>


                    {{-- Add More --}}
                    <button
                        type="button"
                        class="add-product-btn"
                        id="addProductBtn"
                    >
                        <span>+</span>
                        Add More Products
                    </button>

                </div>


                {{-- =================================================
                     BUYER INFORMATION
                ================================================== --}}

                <div class="buyer-section">

                    <div class="section-heading">

                        <h2>
                            Buyer Information
                        </h2>

                        <p>
                            Please provide your business details so our
                            team can contact you.
                        </p>

                    </div>


                    <div class="form-grid">


                        {{-- Full Name --}}
                        <div class="form-group">

                            <label
                                for="customer_name"
                                class="form-label"
                            >
                                Full Name
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="customer_name"
                                name="customer_name"
                                class="form-control"
                                placeholder="Enter your full name"
                                value="{{ old('customer_name') }}"
                                autocomplete="name"
                            >

                            <span
                                class="error-message"
                                id="customer_name_error"
                            >
                                Please enter your name.
                            </span>

                        </div>


                        {{-- Company Name --}}
                        <div class="form-group">

                            <label
                                for="company_name"
                                class="form-label"
                            >
                                Company Name
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="company_name"
                                name="company_name"
                                class="form-control"
                                placeholder="Enter company name"
                                value="{{ old('company_name') }}"
                                autocomplete="organization"
                            >

                            <span
                                class="error-message"
                                id="company_name_error"
                            >
                                Please enter your company name.
                            </span>

                        </div>


                        {{-- Email --}}
                        <div class="form-group">

                            <label
                                for="email"
                                class="form-label"
                            >
                                Business Email
                                <span class="required">*</span>
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                placeholder="example@company.com"
                                value="{{ old('email') }}"
                                autocomplete="email"
                            >

                            <span
                                class="error-message"
                                id="email_error"
                            >
                                Please enter a valid email address.
                            </span>

                        </div>


                        {{-- Phone --}}
                        <div class="form-group">

                            <label
                                for="phone"
                                class="form-label"
                            >
                                Phone Number
                                <span class="required">*</span>
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-control"
                                placeholder="Enter phone number"
                                value="{{ old('phone') }}"
                                autocomplete="tel"
                            >

                            <span
                                class="error-message"
                                id="phone_error"
                            >
                                Please enter a valid phone number.
                            </span>

                        </div>


                        {{-- Customer Type --}}
                        <div class="form-group">

                            <label
                                for="customer_type"
                                class="form-label"
                            >
                                Customer Type
                                <span class="required">*</span>
                            </label>

                            <select
                                id="customer_type"
                                name="customer_type"
                                class="form-select"
                            >

                                <option value="">
                                    Select customer type
                                </option>

                                <option value="domestic">
                                    Domestic
                                </option>

                                <option value="international">
                                    International
                                </option>

                            </select>

                            <span
                                class="error-message"
                                id="customer_type_error"
                            >
                                Please select customer type.
                            </span>

                        </div>


                        {{-- Country --}}
                        <div class="form-group">

                            <label
                                for="country"
                                class="form-label"
                            >
                                Country
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="country"
                                name="country"
                                class="form-control"
                                placeholder="Enter country"
                                value="{{ old('country') }}"
                                autocomplete="country-name"
                            >

                            <span
                                class="error-message"
                                id="country_error"
                            >
                                Please enter your country.
                            </span>

                        </div>


                        {{-- City --}}
                        <div class="form-group">

                            <label
                                for="city"
                                class="form-label"
                            >
                                City
                            </label>

                            <input
                                type="text"
                                id="city"
                                name="city"
                                class="form-control"
                                placeholder="Enter city"
                                value="{{ old('city') }}"
                                autocomplete="address-level2"
                            >

                        </div>


                        {{-- Message --}}
                        <div class="form-group full-width">

                            <label
                                for="message"
                                class="form-label"
                            >
                                Additional Requirements
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                class="form-control"
                                placeholder="Tell us about your requirements, packaging needs, delivery expectations, etc."
                            >{{ old('message') }}</textarea>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     SUBMIT
                ================================================== --}}

                <div class="submit-area">

                    <p class="quote-note">

                        <strong>
                            No prices are displayed online.
                        </strong>

                        Our team will contact you to discuss
                        pricing, availability and your requirements.

                    </p>

                    <button
                        type="submit"
                        class="request-quote-btn"
                        id="submitInquiryBtn"
                    >

                        <span>
                            Request a Quote
                        </span>

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- =========================================================
     PRODUCT SELECTOR MODAL
========================================================= --}}

<div
    class="product-selector-overlay"
    id="productSelectorOverlay"
    aria-hidden="true"
>

    <div
        class="product-selector"
        role="dialog"
        aria-modal="true"
        aria-labelledby="productSelectorTitle"
    >

        <div class="selector-header">

            <div>
                <span class="selector-eyebrow">
                    HeadwayStrata
                </span>

                <h3 id="productSelectorTitle">
                    Select Products
                </h3>
            </div>

            <button
                type="button"
                class="close-selector"
                id="closeSelector"
                aria-label="Close product selector"
            >
                ×
            </button>

        </div>


        <div class="selector-description">
            Select the products you would like to discuss
            with our team.
        </div>


        <div
            id="availableProductsContainer"
            class="available-products-container"
        ></div>


        <div class="selector-footer">

            <button
                type="button"
                class="selector-done-btn"
                id="selectorDoneBtn"
            >
                Done
            </button>

        </div>

    </div>

</div>


{{-- =========================================================
     DATA FROM LARAVEL
========================================================= --}}

<script>
    window.inquiryCartItems = @json($cartItems ?? []);
    window.inquiryProducts = @json($products ?? []);
</script>

@endsection