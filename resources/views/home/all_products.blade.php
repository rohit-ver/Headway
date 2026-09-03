@extends('layouts.app')
<!-- =========================================
     CATEGORY PRODUCTS PAGE
========================================= -->

<section class="products-section">

    <div class="container">

        <!-- Page Heading -->
        <div class="section-heading text-center">

            <span class="section-tag">
                EXPLORE PRODUCTS
            </span>

            <h2 class="section-title">
                Our
                <span>Products</span>
            </h2>

            <p class="section-description">
                Explore our premium products and discover the right
                products for your business requirements.
            </p>

        </div>


        <!-- Category Information -->
        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="product-section-heading">

                    <div>

                        <span class="section-tag">
                            CATEGORY 01
                        </span>

                        <h2>
                            Premium
                            <span>Makhana</span>
                        </h2>

                    </div>

                    <p>
                        Our premium fox nuts are carefully selected and
                        processed to maintain quality, taste and crunch.
                    </p>

                </div>

            </div>

        </div>


        <!-- =========================================
             PRODUCTS
        ========================================== -->

        <div class="row g-4">


            <!-- Product 1 -->
            <div class="col-lg-4 col-md-6">

                <div class="product-card">

                    <div class="product-image">

                        <img
                            src="{{ asset('uploads/products/makhana-4-suta.jpg') }}"
                            alt="4 Suta Makhana"
                            loading="lazy"
                        >

                        <span class="product-badge">
                            Premium
                        </span>

                    </div>


                    <div class="product-content">

                        <span class="product-category">
                            MAKHANA
                        </span>

                        <h3>
                            4 Suta Makhana
                        </h3>

                        <p>
                            Carefully selected premium fox nuts suitable
                            for retail and bulk requirements.
                        </p>

                        <a
                            href="{{ route('product.details') }}"
                            class="product-btn"
                        >
                            View Details
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


            <!-- Product 2 -->
            <div class="col-lg-4 col-md-6">

                <div class="product-card">

                    <div class="product-image">

                        <img
                            src="{{ asset('uploads/products/makhana-5-suta.jpg') }}"
                            alt="5 Suta Makhana"
                            loading="lazy"
                        >

                        <span class="product-badge">
                            Best Seller
                        </span>

                    </div>


                    <div class="product-content">

                        <span class="product-category">
                            MAKHANA
                        </span>

                        <h3>
                            5 Suta Makhana
                        </h3>

                        <p>
                            Uniform size, excellent crunch and premium
                            quality for business requirements.
                        </p>

                        <a
                            href="{{ route('product.details') }}"
                            class="product-btn"
                        >
                            View Details
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


            <!-- Product 3 -->
            <div class="col-lg-4 col-md-6">

                <div class="product-card">

                    <div class="product-image">

                        <img
                            src="{{ asset('uploads/products/makhana-6-suta.jpg') }}"
                            alt="6 Suta Makhana"
                            loading="lazy"
                        >

                        <span class="product-badge">
                            Premium
                        </span>

                    </div>


                    <div class="product-content">

                        <span class="product-category">
                            MAKHANA
                        </span>

                        <h3>
                            6 Suta Makhana
                        </h3>

                        <p>
                            Large-sized fox nuts ideal for premium retail
                            and export requirements.
                        </p>

                        <a
                            href="{{ route('product.details') }}"
                            class="product-btn"
                        >
                            View Details
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


            <!-- Product 4 -->
            <div class="col-lg-4 col-md-6">

                <div class="product-card">

                    <div class="product-image">

                        <img
                            src="{{ asset('uploads/products/makhana-roasted.jpg') }}"
                            alt="Roasted Makhana"
                            loading="lazy"
                        >

                        <span class="product-badge">
                            Popular
                        </span>

                    </div>


                    <div class="product-content">

                        <span class="product-category">
                            MAKHANA
                        </span>

                        <h3>
                            Roasted Makhana
                        </h3>

                        <p>
                            Lightly roasted fox nuts with a crispy texture
                            and natural flavour.
                        </p>

                        <a
                            href="{{ route('product.details') }}"
                            class="product-btn"
                        >
                            View Details
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


            <!-- Product 5 -->
            <div class="col-lg-4 col-md-6">

                <div class="product-card">

                    <div class="product-image">

                        <img
                            src="{{ asset('uploads/products/makhana-peri-peri.jpg') }}"
                            alt="Peri Peri Makhana"
                            loading="lazy"
                        >

                        <span class="product-badge">
                            Flavoured
                        </span>

                    </div>


                    <div class="product-content">

                        <span class="product-category">
                            MAKHANA
                        </span>

                        <h3>
                            Peri Peri Makhana
                        </h3>

                        <p>
                            Crunchy roasted makhana blended with a bold
                            peri peri flavour.
                        </p>

                        <a
                            href="{{ route('product.details') }}"
                            class="product-btn"
                        >
                            View Details
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


            <!-- Product 6 -->
            <div class="col-lg-4 col-md-6">

                <div class="product-card">

                    <div class="product-image">

                        <img
                            src="{{ asset('uploads/products/makhana-cream-onion.jpg') }}"
                            alt="Cream and Onion Makhana"
                            loading="lazy"
                        >

                        <span class="product-badge">
                            Flavoured
                        </span>

                    </div>


                    <div class="product-content">

                        <span class="product-category">
                            MAKHANA
                        </span>

                        <h3>
                            Cream & Onion Makhana
                        </h3>

                        <p>
                            Smooth creamy seasoning combined with crispy
                            roasted makhana.
                        </p>

                        <a
                            href="{{ route('product.details') }}"
                            class="product-btn"
                        >
                            View Details
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>


<!-- =========================================
     BUSINESS CTA
========================================= -->

<section class="products-cta">

    <div class="container">

        <div class="products-cta-box">

            <div>

                <span>
                    BUSINESS ENQUIRY
                </span>

                <h2>
                    Looking for the right
                    <strong>products for your business?</strong>
                </h2>

                <p>
                    Talk to our team for bulk orders, wholesale supply,
                    packaging requirements and export enquiries.
                </p>

            </div>

            <a
                href="{{ url('/buyer-inquiry') }}"
                class="cta-btn"
            >
                Send Inquiry
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>

</section>
