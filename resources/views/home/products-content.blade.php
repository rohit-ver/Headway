<!-- =========================================
     SHOP LAYOUT STYLE
     (chaho to isko apni main CSS file me move kar do)
========================================= -->
<style>
    :root {
        --nav-h: 122px;          /* agar navbar fixed/sticky hai to uski height yahan likho, jaise 80px */
        --shop-blue: #2874f0;
    }

    /* sticky ke liye zaroori: hidden ki jagah clip */
    html, body { overflow-x: clip; }

    /* ---------- Layout: poori width, left me koi gap nahi ---------- */
    .shop-layout {
        padding: 0;
        max-width: 100%;
    }
    .shop-layout > .row {
        margin: 0;
        --bs-gutter-x: 0;
    }
    .shop-layout > .row > aside,
    .shop-layout > .row > .shop-main {
        padding: 0;
    }

    .shop-main {
        padding: 24px 28px 40px !important;
        min-width: 0;
    }

    /* ---------- Sidebar: top se bottom tak fit ---------- */
    .shop-sidebar {
        position: sticky;
        top: var(--nav-h);
        height: calc(100vh - var(--nav-h));
        display: flex;
        flex-direction: column;
        background: #F4E5D6;
        border-right: 1px solid #e0e0e0;
        box-shadow: 0 1px 4px rgba(0, 0, 0, .10);
    }

    .sidebar-title {
        flex: 0 0 auto;
        padding: 18px 24px;
        margin: 0;
        font-size: 22px;
        font-weight: 600;
        color: #1ac53f;
        border-bottom: 1px solid #eee;
        text-align: center;
    }

    .sidebar-label {
        flex: 0 0 auto;
        padding: 16px 24px 6px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .5px;
        text-transform: uppercase;
        color: #212121;
    }

    /* categories list: baaki jagah bhare aur zarurat ho to andar scroll kare */
    .sidebar-scroll {
        flex: 1 1 auto;
        overflow-y: auto;
        padding-bottom: 24px;
    }
    .sidebar-scroll::-webkit-scrollbar { width: 5px; }
    .sidebar-scroll::-webkit-scrollbar-thumb { background: #ccc; border-radius: 4px; }

    .sidebar-cat-toggle {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 24px;
        background: none;
        border: 0;
        text-align: left;
        font-size: 15px;
        font-weight: 500;
        color: #212121;
    }
    .sidebar-cat-toggle i { font-size: 12px; transition: transform .2s; }
    .sidebar-cat-toggle:not(.collapsed) i { transform: rotate(90deg); }
    .sidebar-cat-toggle:hover { color: var(--shop-blue); }

    .sidebar-products { list-style: none; margin: 0; padding: 0 0 8px; }
    .sidebar-products li a {
        display: block;
        padding: 6px 24px 6px 48px;
        font-size: 14px;
        color: #444;
        text-decoration: none;
    }
    .sidebar-products li a:hover { color: var(--shop-blue); }
    .sidebar-products li.view-all a { color: var(--shop-blue); font-weight: 500; }

    /* anchor click par content navbar ke neeche na chhupe */
    .product-list-section,
    .product-card { scroll-margin-top: calc(var(--nav-h) + 20px); }

    .product-card.highlight {
        box-shadow: 0 0 0 3px var(--shop-blue);
        transition: box-shadow .3s;
    }

    /* ---------- Mobile / tablet ---------- */
    @media (max-width: 991px) {
        .shop-sidebar {
            position: static;
            height: auto;
            border-right: 0;
        }
        .sidebar-scroll { overflow: visible; }
        .shop-main { padding: 20px 16px 32px !important; }
    }
</style>


<div class="container-fluid shop-layout">

    <div class="row">

        <!-- =========================================
             SIDEBAR (dynamic: categories + unke products)
        ========================================= -->
        <aside class="col-lg-3 col-xl-2">

            <div class="shop-sidebar">

                <h4 class="sidebar-title">Filters</h4>
                <img src="{{ asset('images/divider.png') }}" alt="" class="heading-divider">

                <div class="sidebar-label">Categories</div>

                <div class="sidebar-scroll">

                    @foreach ($categories as $category)

                        @if ($category->products->count() > 0)

                            <div class="sidebar-cat">

                                <button class="sidebar-cat-toggle @if(!$loop->first) collapsed @endif"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#sidebar-cat-{{ $category->id }}"
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}">

                                    <i class="bi bi-chevron-right"></i>

                                    {{ $category->name }}

                                </button>

                                <div id="sidebar-cat-{{ $category->id }}"
                                     class="collapse @if($loop->first) show @endif">

                                    <ul class="sidebar-products">

                                        @foreach ($category->products as $product)
                                            <li>
                                                <a href="#product-{{ $product->id }}"
                                                   data-product="product-{{ $product->id }}">
                                                    {{ $product->name }}
                                                </a>
                                            </li>
                                        @endforeach

                                        <li class="view-all">
                                            <a href="#{{ $category->slug }}-products">
                                                View all {{ $category->name }}
                                            </a>
                                        </li>

                                    </ul>

                                </div>

                            </div>

                        @endif

                    @endforeach

                </div>

            </div>

        </aside>


        <!-- =========================================
             MAIN CONTENT
        ========================================= -->
        <div class="col-lg-9 col-xl-10 shop-main">

            <!-- =========================================
                 CATEGORY SECTION
            ========================================= -->
            <section class="products-section">

                <div class="section-heading text-center">

                    <div class="heading-ornament">
                        <h2 class="section-title title-green">Choose Your Product</h2>
                        <img src="{{ asset('images/divider.png') }}" alt="" class="heading-divider">
                    </div>

                    <p class="section-description">
                        Explore our product and discover the right
                        products for your business requirements.
                    </p>

                </div>


                <!-- Category Cards -->
                {{-- <div class="row g-4 category-row">

                    @foreach ($categories as $index => $category)

                        <div class="col-xl-4 col-md-6">

                            <div class="category-card @if($loop->first) active @endif">

                                <div class="category-image">

                                    @if($category->image)

                                        <img src="{{ asset('uploads/' . $category->image) }}"
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

            </section> --}}



            <!-- =========================================
                 DYNAMIC PRODUCTS
            ========================================= -->
            @foreach ($categories as $category)

                @if ($category->products->count() > 0)

                    <section
                        class="product-list-section @if($loop->iteration % 2 == 0) alternate-section @endif"
                        id="{{ $category->slug }}-products"
                    >

                        <!-- Section Heading -->
                        <div class="product-section-heading">

                            <div>

                                <span class="section-tag">
                                    {{ strtoupper($category->name) }}
                                </span>

                            </div>


                            {{-- <p>
                                Explore our premium quality
                                {{ strtolower($category->name) }}
                                products carefully selected for retail,
                                wholesale and business requirements.
                            </p> --}}

                        </div>



                        <!-- Products -->
                        <div class="row g-4">

                            @foreach ($category->products as $product)

                                <div class="col-xl-3 col-lg-4 col-md-6">

                                    <div class="product-card" id="product-{{ $product->id }}">


                                        <!-- Product Image -->
                                        <div class="product-image">

                                            @if($product->main_image)

                                                <img src="{{ asset('uploads/' . $product->main_image) }}"
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

                    </section>

                @endif

            @endforeach

        </div>

    </div>

</div>



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


<!-- Sidebar me product par click karne par card ko highlight karo -->
<script>
    document.querySelectorAll('.sidebar-products a[data-product]').forEach(function (link) {
        link.addEventListener('click', function () {
            var card = document.getElementById(this.dataset.product);
            if (!card) return;
            card.classList.add('highlight');
            setTimeout(function () { card.classList.remove('highlight'); }, 1800);
        });
    });
</script>