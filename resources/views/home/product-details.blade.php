@extends('layouts.app')

@section('title', ($product->name ?? 'Product') . ' | Headway')

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

        <a href="{{ route('products') }}">
            Products
        </a>

        <i class="bi bi-chevron-right"></i>

        <span>
            {{ $product->name }}
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

                    @if($product->main_image)

                        <img
                            id="mainProductImage"
                            src="{{ asset('storage/' . $product->main_image) }}"
                            alt="{{ $product->name }}"
                            onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}';"
                        >

                    @else

                        <img
                            id="mainProductImage"
                            src="{{ asset('images/no-image.png') }}"
                            alt="{{ $product->name }}"
                        >

                    @endif


                    @if(!empty($product->badge))

                        <span class="product-image-badge">
                            {{ $product->badge }}
                        </span>

                    @endif

                </div>


                <!-- Thumbnail -->
                    <div class="product-thumbnails">

                        {{-- Main image as first thumbnail --}}
                        @if($product->main_image)

                            <button
                                type="button"
                                class="product-thumb active"
                                onclick="changeProductImage(
                                    this,
                                    '{{ asset('storage/' . $product->main_image) }}'
                                )"
                            >

                                <img
                                    src="{{ asset('storage/' . $product->main_image) }}"
                                    alt="{{ $product->name }}"
                                    onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}';"
                                >

                            </button>

                        @endif

                        {{-- Variant images --}}
                        @foreach($product->images as $variantImage)

                            <button
                                type="button"
                                class="product-thumb"
                                onclick="changeProductImage(
                                    this,
                                    '{{ asset('storage/' . $variantImage->image_path) }}'
                                )"
                            >

                                <img
                                    src="{{ asset('storage/' . $variantImage->image_path) }}"
                                    alt="{{ $variantImage->color ?? $product->name }}"
                                    onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}';"
                                >

                            </button>

                        @endforeach

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
                    {{ optional($product->category)->name ?? 'PRODUCT' }}
                </span>


                <!-- Title -->
                <h1>
                    {{ $product->name }}
                </h1>


                <!-- Rating -->
                @if(isset($product->rating) || isset($product->reviews_count))

                    <div class="product-rating">

                        <div class="stars">

                            @php
                                $rating = (float) ($product->rating ?? 0);
                                $fullStars = floor($rating);
                            @endphp

                            @for($i = 1; $i <= 5; $i++)

                                @if($i <= $fullStars)

                                    <i class="bi bi-star-fill"></i>

                                @else

                                    <i class="bi bi-star"></i>

                                @endif

                            @endfor

                        </div>


                        <span>
                            {{ number_format($rating, 1) }}
                        </span>


                        @if(isset($product->reviews_count))

                            <span class="review-count">
                                ({{ $product->reviews_count }} Reviews)
                            </span>

                        @endif

                    </div>

                @endif


                <!-- SKU -->
                @if(!empty($product->sku))

                    <div class="product-sku">

                        SKU:

                        <strong>
                            {{ $product->sku }}
                        </strong>

                    </div>

                @endif


                <!-- Description -->
                @if(!empty($product->description))

                    <p class="product-detail-description">
                        {{ $product->description }}
                    </p>

                @endif


                <!-- Product Specifications -->
                <div class="product-specifications">

                    <!-- Packaging -->
                    @if(!empty($product->packaging))

                        <div class="product-spec-item">

                            <div class="spec-icon">
                                <i class="bi bi-box-seam"></i>
                            </div>

                            <div>

                                <span>
                                    Packaging Available
                                </span>

                                <strong>
                                    {{ $product->packaging }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    <!-- MOQ -->
                    @if(!empty($product->moq))

                        <div class="product-spec-item">

                            <div class="spec-icon">
                                <i class="bi bi-cart3"></i>
                            </div>

                            <div>

                                <span>
                                    Minimum Order Quantity (MOQ)
                                </span>

                                <strong>
                                    {{ $product->moq }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    <!-- Availability -->
                    @if(!empty($product->availability))

                        <div class="product-spec-item">

                            <div class="spec-icon">
                                <i class="bi bi-check-circle"></i>
                            </div>

                            <div>

                                <span>
                                    Availability
                                </span>

                                <strong class="available">
                                    {{ $product->availability }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    <!-- Suitable For -->
                    @if(!empty($product->suitable_for))

                        <div class="product-spec-item">

                            <div class="spec-icon">
                                <i class="bi bi-shop"></i>
                            </div>

                            <div>

                                <span>
                                    Suitable For
                                </span>

                                <strong>
                                    {{ $product->suitable_for }}
                                </strong>

                            </div>

                        </div>

                    @endif

                </div>


                <!-- Divider -->
                <div class="product-detail-divider"></div>


                <!-- CTA Buttons -->
                <div class="product-detail-actions">

                    <a
                        href="{{ route('buyer-inquiry') }}"
                        class="request-quote-btn"
                    >
                        <i class="bi bi-chat-square-text"></i>
                        Request a Quote
                    </a>


                    <button
                        type="button"
                        class="inquiry-cart-btn"
                        data-product-id="{{ $product->id }}"
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
                Why Choose Our <strong>Products?</strong>
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
                        Quality is at the heart of everything we offer.
                        Our products are carefully sourced from trusted
                        partners and processed under stringent quality
                        and hygiene standards to ensure consistent
                        quality, freshness, safety and authentic taste
                        in every batch.
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
                        Flexible packaging options designed to suit
                        retail, wholesale and bulk requirements while
                        ensuring product freshness, quality and protection.
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
                        Reliable bulk supply with consistent quality
                        and timely fulfilment for retailers, wholesalers,
                        distributors and exporters.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

<!-- =========================================================
     RELATED PRODUCTS
========================================================= -->

@if(isset($relatedProducts) && $relatedProducts->count())

<section class="related-products-section">

<div class="container">

    <div class="product-extra-heading">

        <span>
            YOU MAY ALSO LIKE
        </span>

        <h2>
            Related <strong>Products</strong>
        </h2>

    </div>


    <div class="row g-4">

        @foreach($relatedProducts as $relatedProduct)

            <div class="col-lg-3 col-md-6">

                <div class="product-card">

                    <div class="product-card-image">

                        @if($relatedProduct->main_image)

                            <img
                                src="{{ asset('storage/' . $relatedProduct->main_image) }}"
                                alt="{{ $relatedProduct->name }}"
                                onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}';"
                            >

                        @else

                            <img
                                src="{{ asset('images/no-image.png') }}"
                                alt="{{ $relatedProduct->name }}"
                            >

                        @endif

                    </div>


                    <div class="product-card-content">

                        @if($relatedProduct->category)

                            <span>
                                {{ $relatedProduct->category->name }}
                            </span>

                        @endif


                        <h4>
                            {{ $relatedProduct->name }}
                        </h4>


                        <a
                            href="{{ route('product.details', [
                                'id' => $relatedProduct->id,
                                'slug' => $relatedProduct->slug
                            ]) }}"
                            class="product-btn"
                        >

                            View Details

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

</section>

@endif

@endsection

<style>
/* =========================================
   RELATED PRODUCTS - TEXT ONLY
========================================= */

.related-products-section .product-card-content {
    padding: 24px 22px 22px;
    display: flex;
    flex-direction: column;
    height: 100%;
    background: #ffffff;
}

/* Category Name */
.related-products-section .product-card-content > span {
    display: block;
    margin-bottom: 8px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.4px;
    text-transform: uppercase;
    color: #A01414;
}

/* Product Name */
.related-products-section .product-card-content h4 {
    margin: 0 0 20px;
    min-height: 54px;
    font-size: 20px;
    line-height: 1.35;
    font-weight: 600;
    color: #242222;
}

/* View Details Button */
.related-products-section .product-btn {
    margin-top: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 12px 16px;
    border-radius: 8px;
    background: #4A1014;
    color: #ffffff;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s ease;
}

/* Arrow */
.related-products-section .product-btn i {
    font-size: 17px;
    transition: transform 0.3s ease;
}

/* Button Hover */
.related-products-section .product-btn:hover {
    background: #A01414;
    color: #ffffff;
}

/* Arrow Animation */
.related-products-section .product-btn:hover i {
    transform: translateX(5px);
}

/* Mobile */
@media (max-width: 575px) {

    .related-products-section .product-card-content {
        padding: 20px 18px 18px;
    }

    .related-products-section .product-card-content h4 {
        font-size: 18px;
        min-height: auto;
    }

    .related-products-section .product-btn {
        font-size: 13px;
        padding: 11px 14px;
    }
}
</style>
@push('scripts')

<script>

function changeProductImage(button, imageUrl) {

    const mainImage = document.getElementById('mainProductImage');

    if (!mainImage) {
        return;
    }


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

document.addEventListener('DOMContentLoaded', function () {

    const addToCartBtn = document.querySelector('.inquiry-cart-btn');

    if (!addToCartBtn) {
        return;
    }

    addToCartBtn.addEventListener('click', function () {

        const productId = this.dataset.productId;
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute('content');

        // Disable button while request is in progress
        addToCartBtn.disabled = true;

        fetch(`/cart/add/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                quantity: 1,
                unit: 'Box',
            }),
        })
        .then(function (response) {

            if (response.status === 401) {
                alert('Please login first to add products to cart.');
                addToCartBtn.disabled = false;
                return null;
            }

            return response.json();
        })
        .then(function (data) {

            if (!data) {
                return;
            }

            if (data.success) {

                // Update button text
                addToCartBtn.innerHTML =
                    '<i class="bi bi-check-circle"></i> Added to Cart';

                // Update navbar cart count instantly
                const cartCountEl = document.getElementById('cartCount');

                if (cartCountEl && data.cart_count !== undefined) {
                    cartCountEl.textContent = data.cart_count;
                }

                // Re-enable button after 2 seconds so user can add again if needed
                setTimeout(function () {
                    addToCartBtn.disabled = false;
                    addToCartBtn.innerHTML =
                        '<i class="bi bi-cart-plus"></i> Add to Inquiry Cart';
                }, 2000);

            } else {
                alert(data.message || 'Something went wrong.');
                addToCartBtn.disabled = false;
            }
        })
        .catch(function (error) {
            console.error(error);
            addToCartBtn.disabled = false;
        });

    });

});


document.addEventListener('DOMContentLoaded', function () {

    const addToCartBtn = document.querySelector('.inquiry-cart-btn');

    if (!addToCartBtn) {
        return;
    }

    addToCartBtn.addEventListener('click', function () {

        const productId = this.dataset.productId;
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute('content');

        fetch(`/cart/add/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                quantity: 1,
                unit: 'Box',
            }),
        })
        .then(function (response) {

            if (response.status === 401) {
                alert('Please login first to add products to cart.');
                return null;
            }

            return response.json();
        })
        .then(function (data) {

            if (!data) {
                return;
            }

            if (data.success) {
                addToCartBtn.innerHTML =
                    '<i class="bi bi-check-circle"></i> Added to Cart';
            } else {
                alert(data.message || 'Something went wrong.');
            }
        })
        .catch(function (error) {
            console.error(error);
        });

    });

});
</script>

@endpush
