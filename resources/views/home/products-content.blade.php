
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

            <!-- Makhana -->

            <div class="col-lg-3 col-md-6">

                <div class="category-card active">

                    <div class="category-image">

                        <img src="{{ asset('uploads/products/makhana.jpg') }}"
                             alt="Makhana">

                        <div class="category-overlay"></div>

                    </div>

                    <div class="category-content">

                        <span>01</span>

                        <h3>Makhana</h3>

                        <p>
                            Premium quality fox nuts in multiple grades
                            and sizes.
                        </p>

                        <a href="{{ Auth::check() ? route('home.products') : '#' }}"
                            class="hero-btn explore-products-btn"
                            @guest
                                data-bs-toggle="modal"
                                data-bs-target="#customerRegistrationModal"
                            @endguest>
                                
                                Explore Products
                                <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


            <!-- Namkeen -->

            <div class="col-lg-3 col-md-6">

                <div class="category-card">

                    <div class="category-image">

                        <img src="{{ asset('uploads/products/namkeen.jpg') }}"
                             alt="Namkeen">

                        <div class="category-overlay"></div>

                    </div>

                    <div class="category-content">

                        <span>02</span>

                        <h3>Namkeen</h3>

                        <p>
                            Delicious and crunchy snacks made for
                            everyday enjoyment.
                        </p>

                        <a href="#namkeen-products">
                            Explore Products
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


            <!-- Sweets -->

            <div class="col-lg-3 col-md-6">

                <div class="category-card">

                    <div class="category-image">

                        <img src="{{ asset('uploads/products/sweets.jpg') }}"
                             alt="Sweets">

                        <div class="category-overlay"></div>

                    </div>

                    <div class="category-content">

                        <span>03</span>

                        <h3>Sweets</h3>

                        <p>
                            Traditional sweets crafted for retail
                            and gifting requirements.
                        </p>

                        <a href="#sweets-products">
                            Explore Products
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


            <!-- Gift Packs -->

            <div class="col-lg-3 col-md-6">

                <div class="category-card">

                    <div class="category-image">

                        <img src="{{ asset('uploads/products/gift-pack.jpg') }}"
                             alt="Gift Packs">

                        <div class="category-overlay"></div>

                    </div>

                    <div class="category-content">

                        <span>04</span>

                        <h3>Gift Packs</h3>

                        <p>
                            Premium packaging solutions for festivals,
                            gifting and corporate occasions.
                        </p>

                        <a href="#gift-products">
                            Explore Products
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================
     MAKHANA PRODUCTS
========================================= -->

<section class="product-list-section" id="makhana-products">

    <div class="container">

        <div class="product-section-heading">

            <div>
                <span class="section-tag">
                    CATEGORY 01
                </span>

                <h2>
                    Premium <span>Makhana</span>
                </h2>
            </div>

            <p>
                Our premium fox nuts are carefully selected and processed
                to maintain quality, taste and crunch.
            </p>

        </div>


        <div class="row g-4">


            <!-- Product 1 -->

            <div class="col-lg-4 col-md-6">

                <div class="product-card">

                    <div class="product-image">

                        <img src="{{ asset('uploads/products/makhana-4-suta.jpg') }}"
                             alt="4 Suta Makhana">

                        <span class="product-badge">
                            Premium
                        </span>

                    </div>

                    <div class="product-content">

                        <span class="product-category">
                            MAKHANA
                        </span>

                        <h3>4 Suta Makhana</h3>

                        <p>
                            Carefully selected premium fox nuts suitable
                            for retail and bulk requirements.
                        </p>

                        <a href="{{route('product.details')}}" class="product-btn">
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

                        <img src="{{ asset('uploads/products/makhana-5-suta.jpg') }}"
                             alt="5 Suta Makhana">

                        <span class="product-badge">
                            Best Seller
                        </span>

                    </div>

                    <div class="product-content">

                        <span class="product-category">
                            MAKHANA
                        </span>

                        <h3>5 Suta Makhana</h3>

                        <p>
                            Uniform size, excellent crunch and premium
                            quality for business requirements.
                        </p>

                        <a href="#" class="product-btn">
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

                        <img src="{{ asset('uploads/products/makhana-6-suta.jpg') }}"
                             alt="6 Suta Makhana">

                        <span class="product-badge">
                            Premium
                        </span>

                    </div>

                    <div class="product-content">

                        <span class="product-category">
                            MAKHANA
                        </span>

                        <h3>6 Suta Makhana</h3>

                        <p>
                            Large-sized fox nuts ideal for premium retail
                            and export requirements.
                        </p>

                        <a href="#" class="product-btn">
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
     NAMKEEN
========================================= -->

<section class="product-list-section alternate-section"
         id="namkeen-products">

    <div class="container">

        <div class="product-section-heading">

            <div>

                <span class="section-tag">
                    CATEGORY 02
                </span>

                <h2>
                    Crunchy <span>Namkeen</span>
                </h2>

            </div>

            <p>
                A range of flavorful and crunchy namkeen products
                suitable for retail and wholesale markets.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="product-card">

                    <div class="product-image">

                        <img src="{{ asset('uploads/products/aloo-bhujia.jpg') }}"
                             alt="Aloo Bhujia">

                    </div>

                    <div class="product-content">

                        <span class="product-category">
                            NAMKEEN
                        </span>

                        <h3>Aloo Bhujia</h3>

                        <p>
                            Classic crunchy snack with authentic flavour.
                        </p>

                        <a href="#" class="product-btn">
                            View Details
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="product-card">

                    <div class="product-image">

                        <img src="{{ asset('uploads/products/mix-namkeen.jpg') }}"
                             alt="Mix Namkeen">

                    </div>

                    <div class="product-content">

                        <span class="product-category">
                            NAMKEEN
                        </span>

                        <h3>Mix Namkeen</h3>

                        <p>
                            A delicious combination of crunchy ingredients.
                        </p>

                        <a href="#" class="product-btn">
                            View Details
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="product-card">

                    <div class="product-image">

                        <img src="{{ asset('uploads/products/khatta-meetha.jpg') }}"
                             alt="Khatta Meetha">

                    </div>

                    <div class="product-content">

                        <span class="product-category">
                            NAMKEEN
                        </span>

                        <h3>Khatta Meetha</h3>

                        <p>
                            Sweet and tangy flavour with a satisfying crunch.
                        </p>

                        <a href="#" class="product-btn">
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
     CTA
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

            <a href="{{ url('/contact') }}" class="cta-btn">
                Send Inquiry
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>

</section>