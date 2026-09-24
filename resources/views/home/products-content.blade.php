<!-- =========================================
     CATEGORY SECTION
========================================= -->

<section class="products-section">

    <div class="container">

        <div class="section-heading text-center">

            <span class="section-tag">
                EXPLORE PRODUCTS
            </span>

            <h2 class="section-title">
                Choose Your
                <span>Product</span>
            </h2>

            <p class="section-description">
                Explore our product and discover the right
                products for your business requirements.
            </p>

        </div>


        <!-- Category Cards -->
        <div class="row g-4 category-row">

            @foreach ($categories as $index => $category)

                <div class="col-lg-3 col-md-6">

                    <div class="category-card @if($loop->first) active @endif">

                        <div class="category-image">

                            @if($category->image)

                                <img src="{{ asset('storage/' . $category->image) }}"
                                     alt="{{ $category->name }}">

                            @else

                                <img src="{{ asset('uploads/products/default.jpg') }}"
                                     alt="{{ $category->name }}">

                            @endif

                            <div class="category-overlay"></div>

                        </div>


                        <div class="category-content">

                            <span>
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <h3>
                                {{ $category->name }}
                            </h3>

                            <p>
                                Premium quality products in multiple
                                grades and sizes.
                            </p>


                            @customerAuth

                                <a href="#{{ $category->slug }}-products"
                                   class="hero-btn explore-products-btn">

                                    Explore Products

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            @else

                                <a href="javascript:void(0)"
                                   class="hero-btn explore-products-btn"
                                   data-bs-toggle="modal"
                                   data-bs-target="#authChoiceModal">

                                    Explore Products

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            @endcustomerAuth

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>



<!-- =========================================
     DYNAMIC PRODUCTS
========================================= -->

@foreach ($categories as $category)

    @if ($category->products->count() > 0)

        <section
            class="product-list-section @if($loop->iteration % 2 == 0) alternate-section @endif"
            id="{{ $category->slug }}-products"
        >

            <div class="container">


                <!-- Section Heading -->
                <div class="product-section-heading">

                    <div>

                        <span class="section-tag">
                            {{ strtoupper($category->name) }}
                        </span>

                        <h2>
                            Premium
                            <span>{{ $category->name }}</span>
                        </h2>

                    </div>


                    <p>
                        Explore our premium quality
                        {{ strtolower($category->name) }}
                        products carefully selected for retail,
                        wholesale and business requirements.
                    </p>

                </div>



                <!-- Products -->
                <div class="row g-4">

                    @foreach ($category->products as $product)

                        <div class="col-lg-4 col-md-6">

                            <div class="product-card">


                                <!-- Product Image -->
                                <div class="product-image">

                                    @if($product->main_image)

                                        <img src="{{ asset('storage/' . $product->main_image) }}"
                                             alt="{{ $product->name }}">

                                    @else

                                        <img src="{{ asset('uploads/products/allo-bhujia.jpg') }}"
                                             alt="{{ $product->name }}">

                                    @endif


                                    <span class="product-badge">
                                        Premium
                                    </span>

                                </div>



                                <!-- Product Content -->
                                <div class="product-content">

                                    <span class="product-category">
                                        {{ strtoupper($category->name) }}
                                    </span>


                                    <h3>
                                        {{ $product->name }}
                                    </h3>


                                    <p>
                                        {{ $product->description ?? 'Premium quality product suitable for retail and bulk requirements.' }}
                                    </p>



                                    <!-- Customer Authentication -->
                                    @customerAuth

                                        <a href="{{ route('product.details', [
                                                    'id' => $product->id,
                                                    'slug' => $product->slug
                                                ]) }}"
                                           class="product-btn">

                                            View Details

                                            <i class="bi bi-arrow-right"></i>

                                        </a>

                                    @else

                                        <a href="javascript:void(0)"
                                           class="product-btn"
                                           data-bs-toggle="modal"
                                           data-bs-target="#authChoiceModal">

                                            View Details

                                            <i class="bi bi-arrow-right"></i>

                                        </a>

                                    @endcustomerAuth


                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

    @endif

@endforeach



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


            @customerAuth
                <a href="{{ url('/buyer-inquiry') }}"
                   class="cta-btn">

                    Send Inquiry

                    <i class="bi bi-arrow-right"></i>

                </a>

            @else

                <a href="javascript:void(0)"
                   class="cta-btn"
                   data-bs-toggle="modal"
                   data-bs-target="#authChoiceModal">

                    Send Inquiry

                    <i class="bi bi-arrow-right"></i>

                </a>

            @endcustomerAuth

        </div>

    </div>

</section>