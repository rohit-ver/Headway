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
                <span>{{ $cartItems->count() }} Products</span>
            </div>

        </div>


        <div class="row g-4">

            <!-- =================================================
                 CART PRODUCTS
            ================================================== -->

            <div class="col-lg-8">

                <div class="hw-cart-box">

                    @forelse($cartItems as $item)

                        <div class="hw-cart-product" data-cart-item-id="{{ $item->id }}">

                            <div class="hw-cart-product-image">

                                @if($item->product && $item->product->main_image)
                                    <img
                                        src="{{ asset('storage/' . $item->product->main_image) }}"
                                        alt="{{ $item->product->name }}"
                                        onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}';"
                                    >
                                @else
                                    <img
                                        src="{{ asset('images/no-image.png') }}"
                                        alt="{{ $item->product->name ?? 'Product' }}"
                                    >
                                @endif

                            </div>

                            <div class="hw-cart-product-info">

                                <span class="hw-cart-category">
                                    {{ optional(optional($item->product)->category)->name ?? 'PRODUCT' }}
                                </span>

                                <h3>
                                    {{ $item->product->name ?? 'Product unavailable' }}
                                </h3>

                                @if($item->product && $item->product->description)
                                    <p>
                                        {{ Str::limit($item->product->description, 90) }}
                                    </p>
                                @endif

                                <div class="hw-cart-meta">

                                    <span>
                                        <strong>MOQ:</strong> {{ $item->product->moq ?? 'N/A' }}
                                    </span>

                                    <span>
                                        <strong>Packaging:</strong> {{ $item->product->packaging_options ?? 'N/A' }}
                                    </span>

                                </div>

                            </div>


                            <div class="hw-cart-product-action">

                                <span class="hw-price-request">
                                    Price on Request
                                </span>

                                <div
                                    class="hw-qty-box"
                                    data-cart-item-id="{{ $item->id }}"
                                    data-moq="1"
                                    data-step="1"
                                    data-unit="{{ $item->unit }}"
                                >
                                    <button type="button" class="qty-decrease">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <span class="qty-value">{{ $item->quantity }} {{ $item->unit }}</span>
                                    <button type="button" class="qty-increase">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <small class="qty-warning text-danger" style="display:none;"></small>

                                <button
                                    class="hw-remove-btn"
                                    data-cart-item-id="{{ $item->id }}"
                                >
                                    <i class="bi bi-trash3"></i>
                                    Remove
                                </button>

                            </div>

                        </div>

                    @empty

                        <div class="hw-cart-empty">

                            <div class="hw-cart-empty-icon">
                                <i class="bi bi-bag-x"></i>
                            </div>

                            <h3>
                                Your Inquiry Cart is Empty
                            </h3>

                            <p>
                                Looks like you haven't added any products yet.
                                Browse our catalog and add products you're
                                interested in.
                            </p>

                            <a href="{{ route('products') }}" class="hw-cart-empty-btn">
                                <i class="bi bi-grid"></i>
                                Browse Products
                            </a>

                        </div>

                    @endforelse

                </div>


                <!-- CONTINUE SHOPPING -->

                <div class="hw-continue-shopping">

                    <a href="{{ route('products') }}">
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

                        <strong id="summarySelectedCount">
                            {{ $cartItems->count() }}
                        </strong>

                    </div>


                    <div class="hw-summary-line">

                        <span>
                            Total Quantity
                        </span>

                        <strong id="summaryTotalQty">
                            {{ $cartItems->sum('quantity') }}
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


                    <a href="{{ route('buyer-inquiry') }}"
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

<style>
    /* =========================================
   EMPTY CART STATE
========================================= */

.hw-cart-empty {
    text-align: center;
    padding: 70px 30px;
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #eee;
}

.hw-cart-empty-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f7f0ea;
    border-radius: 50%;
}

.hw-cart-empty-icon i {
    font-size: 34px;
    color: #A01414;
}

.hw-cart-empty h3 {
    font-size: 22px;
    font-weight: 700;
    color: #242222;
    margin-bottom: 10px;
}

.hw-cart-empty p {
    font-size: 15px;
    color: #6b6b6b;
    max-width: 380px;
    margin: 0 auto 26px;
    line-height: 1.6;
}

.hw-cart-empty-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 26px;
    background: #4A1014;
    color: #ffffff;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.hw-cart-empty-btn:hover {
    background: #A01414;
    color: #ffffff;
}

/* Mobile */
@media (max-width: 575px) {

    .hw-cart-empty {
        padding: 50px 20px;
    }

    .hw-cart-empty h3 {
        font-size: 19px;
    }

    .hw-cart-empty p {
        font-size: 14px;
    }
}
</style>


@endsection

@push('scripts')

<script>

const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute('content');

function updateSummary(deltaCount, deltaQty) {

    const countEl = document.getElementById('summarySelectedCount');
    const qtyEl = document.getElementById('summaryTotalQty');

    countEl.textContent = parseInt(countEl.textContent, 10) + deltaCount;
    qtyEl.textContent = parseInt(qtyEl.textContent, 10) + deltaQty;
}


document.querySelectorAll('.hw-qty-box').forEach(function (box) {

    const moq = parseInt(box.dataset.moq, 10) || 1;
    const step = parseInt(box.dataset.step, 10) || 1;
    const unit = box.dataset.unit || '';
    const cartItemId = box.dataset.cartItemId;

    const qtySpan = box.querySelector('.qty-value');
    const decreaseBtn = box.querySelector('.qty-decrease');
    const increaseBtn = box.querySelector('.qty-increase');
    const warningEl = box.nextElementSibling; // .qty-warning

    let currentQty = parseInt(qtySpan.textContent, 10) || moq;

    function updateDisplay() {
        qtySpan.textContent = currentQty + ' ' + unit;
    }

    function showWarning(message) {
        warningEl.textContent = message;
        warningEl.style.display = 'block';
        box.classList.add('qty-shake');

        setTimeout(function () {
            warningEl.style.display = 'none';
            box.classList.remove('qty-shake');
        }, 1800);
    }

    function syncQuantity(newQty) {

        fetch(`/cart/${cartItemId}`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                quantity: newQty,
                unit: unit,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                showWarning(data.message || 'Could not update quantity.');
            }
        })
        .catch(err => console.error(err));
    }

    decreaseBtn.addEventListener('click', function () {
        if (currentQty - step >= moq) {
            currentQty -= step;
            updateDisplay();
            syncQuantity(currentQty);
            updateSummary(0, -step);
        } else {
            showWarning('Minimum order quantity is ' + moq + ' ' + unit);
        }
    });

    increaseBtn.addEventListener('click', function () {
        currentQty += step;
        updateDisplay();
        syncQuantity(currentQty);
        updateSummary(0, step);
    });

});


document.querySelectorAll('.hw-remove-btn').forEach(function (btn) {

    btn.addEventListener('click', function () {

        const cartItemId = this.dataset.cartItemId;
        const productRow = this.closest('.hw-cart-product');
        const qtyBox = productRow.querySelector('.hw-qty-box');
        const removedQty = parseInt(
            qtyBox.querySelector('.qty-value').textContent,
            10
        ) || 0;

        fetch(`/cart/${cartItemId}`, {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        })
        .then(response => response.json())
        .then(data => {

            if (data.success) {
                productRow.remove();
                updateSummary(-1, -removedQty);
            } else {
                alert(data.message || 'Could not remove product.');
            }
        })
        .catch(err => console.error(err));

    });

});

</script>

@endpush