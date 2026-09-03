document.addEventListener("DOMContentLoaded", function () {

    const heroCarousel = document.getElementById("heroCarousel");

    if (heroCarousel) {

        heroCarousel.addEventListener("slid.bs.carousel", function () {

            const activeSlide =
                heroCarousel.querySelector(".carousel-item.active");

            if (!activeSlide) return;

            const animatedElements =
                activeSlide.querySelectorAll(
                    ".hero-badge, h1, p, .hero-features, .hero-btn"
                );

            animatedElements.forEach(function (element) {

                element.style.animation = "none";

                element.offsetHeight;

                element.style.animation = "";

            });

        });

    }


    /*
    =========================================
    NAVBAR CLOSE ON MOBILE LINK CLICK
    =========================================
    */

    const navLinks =
        document.querySelectorAll("#mainNavbar .nav-link");

    const navbar =
        document.getElementById("mainNavbar");

    navLinks.forEach(function (link) {

        link.addEventListener("click", function () {

            if (window.innerWidth < 992) {

                const bsCollapse =
                    bootstrap.Collapse.getInstance(navbar);

                if (bsCollapse) {
                    bsCollapse.hide();
                }

            }

        });

    });

});

window.addEventListener("scroll", function () {

    const header = document.querySelector(".main-header");

    if (!header) return;

    if (window.scrollY > 30) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }

});
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | DATA FROM LARAVEL
    |--------------------------------------------------------------------------
    */

    const cartItems = window.inquiryCartItems || [];
    const availableProducts = window.inquiryProducts || [];


    /*
    |--------------------------------------------------------------------------
    | STATE
    |--------------------------------------------------------------------------
    */

    let selectedProducts = [];


    /*
    |--------------------------------------------------------------------------
    | DOM
    |--------------------------------------------------------------------------
    */

    const form =
        document.getElementById('buyerInquiryForm');

    const selectedContainer =
        document.getElementById('selectedProductsContainer');

    const emptyProducts =
        document.getElementById('emptyProducts');

    const addProductBtn =
        document.getElementById('addProductBtn');

    const overlay =
        document.getElementById('productSelectorOverlay');

    const closeSelector =
        document.getElementById('closeSelector');

    const doneSelector =
        document.getElementById('selectorDoneBtn');

    const availableContainer =
        document.getElementById('availableProductsContainer');


    /*
    |--------------------------------------------------------------------------
    | INITIALIZE CART PRODUCTS
    |--------------------------------------------------------------------------
    */

    function initializeCartProducts() {

        selectedProducts = [];


        cartItems.forEach(function (item) {

            const product =
                normalizeProduct(item.product || item);


            if (!product || !product.id) {
                return;
            }


            /*
            | Prevent duplicate products
            */

            const exists =
                selectedProducts.some(function (selected) {

                    return Number(selected.id) ===
                        Number(product.id);

                });


            if (exists) {
                return;
            }


            selectedProducts.push({

                ...product,

                quantity:
                    Number(
                        item.quantity ??
                        product.min_quantity ??
                        1
                    )

            });

        });


        /*
        | Make sure quantity respects MOQ
        */

        selectedProducts.forEach(function (product) {

            const minimum =
                Number(product.min_quantity || 1);


            if (product.quantity < minimum) {

                product.quantity = minimum;

            }

        });


        renderSelectedProducts();

    }


    /*
    |--------------------------------------------------------------------------
    | NORMALIZE PRODUCT DATA
    |--------------------------------------------------------------------------
    */

    function normalizeProduct(product) {

        if (!product) {
            return null;
        }


        return {

            id:
                product.id,

            name:
                product.name || 'Product',

            category:
                product.category_name ||
                product.category?.name ||
                product.category ||
                '',

            image:
                product.image_url ||
                product.image ||
                product.main_image ||
                '/images/placeholder-product.jpg',

            unit:
                product.unit ||
                'Units',

            min_quantity:
                Number(
                    product.min_quantity ??
                    product.minimum_quantity ??
                    product.moq ??
                    1
                )

        };

    }


    /*
    |--------------------------------------------------------------------------
    | OPEN PRODUCT SELECTOR
    |--------------------------------------------------------------------------
    */

    if (addProductBtn) {

        addProductBtn.addEventListener(
            'click',
            function () {

                renderAvailableProducts();

                overlay.classList.add('active');

                overlay.setAttribute(
                    'aria-hidden',
                    'false'
                );

                document.body.style.overflow = 'hidden';

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | CLOSE PRODUCT SELECTOR
    |--------------------------------------------------------------------------
    */

    function closeProductSelector() {

        overlay.classList.remove('active');

        overlay.setAttribute(
            'aria-hidden',
            'true'
        );

        document.body.style.overflow = '';

    }


    if (closeSelector) {

        closeSelector.addEventListener(
            'click',
            closeProductSelector
        );

    }


    if (doneSelector) {

        doneSelector.addEventListener(
            'click',
            closeProductSelector
        );

    }


    /*
    |--------------------------------------------------------------------------
    | CLOSE ON BACKDROP
    |--------------------------------------------------------------------------
    */

    if (overlay) {

        overlay.addEventListener(
            'click',
            function (event) {

                if (event.target === overlay) {

                    closeProductSelector();

                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | ESCAPE KEY
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === 'Escape' &&
                overlay.classList.contains('active')
            ) {

                closeProductSelector();

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | RENDER AVAILABLE PRODUCTS
    |--------------------------------------------------------------------------
    */

    function renderAvailableProducts() {

        availableContainer.innerHTML = '';


        if (availableProducts.length === 0) {

            availableContainer.innerHTML = `
                <div style="
                    padding:30px 10px;
                    text-align:center;
                    color:#777;
                    font-size:13px;
                ">
                    No products available.
                </div>
            `;

            return;

        }


        availableProducts.forEach(
            function (rawProduct) {

                const product =
                    normalizeProduct(rawProduct);


                if (!product) {
                    return;
                }


                const alreadySelected =
                    selectedProducts.some(
                        function (item) {

                            return Number(item.id) ===
                                Number(product.id);

                        }
                    );


                const wrapper =
                    document.createElement('div');

                wrapper.className =
                    'available-product';


                wrapper.innerHTML = `

                    <div class="available-product-image">

                        <img
                            src="${escapeHtml(product.image)}"
                            alt="${escapeHtml(product.name)}"
                        >

                    </div>


                    <div class="available-product-info">

                        <strong>
                            ${escapeHtml(product.name)}
                        </strong>

                        <span>
                            ${escapeHtml(product.category)}
                        </span>

                    </div>


                    <button
                        type="button"
                        class="select-product-btn ${
                            alreadySelected ? 'added' : ''
                        }"
                        data-product-id="${product.id}"
                        ${alreadySelected ? 'disabled' : ''}
                    >
                        ${alreadySelected ? 'Added' : 'Add'}
                    </button>

                `;


                availableContainer.appendChild(wrapper);

            }
        );


        attachAvailableProductEvents();

    }


    /*
    |--------------------------------------------------------------------------
    | AVAILABLE PRODUCT EVENTS
    |--------------------------------------------------------------------------
    */

    function attachAvailableProductEvents() {

        document
            .querySelectorAll('.select-product-btn')
            .forEach(
                function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            const productId =
                                Number(
                                    this.dataset.productId
                                );


                            addProduct(productId);

                        }
                    );

                }
            );

    }


    /*
    |--------------------------------------------------------------------------
    | ADD PRODUCT
    |--------------------------------------------------------------------------
    */

    function addProduct(productId) {

        const rawProduct =
            availableProducts.find(
                function (item) {

                    return Number(item.id) ===
                        Number(productId);

                }
            );


        const product =
            normalizeProduct(rawProduct);


        if (!product) {
            return;
        }


        const exists =
            selectedProducts.some(
                function (item) {

                    return Number(item.id) ===
                        Number(product.id);

                }
            );


        if (exists) {
            return;
        }


        selectedProducts.push({

            ...product,

            quantity:
                Number(product.min_quantity || 1)

        });


        renderSelectedProducts();

        renderAvailableProducts();

    }


    /*
    |--------------------------------------------------------------------------
    | REMOVE PRODUCT
    |--------------------------------------------------------------------------
    */

    function removeProduct(index) {

        selectedProducts.splice(index, 1);

        /*
        | IMPORTANT:
        | This only removes the product from the inquiry.
        | It does NOT remove it from the original cart.
        */

        renderSelectedProducts();

        renderAvailableProducts();

    }


    /*
    |--------------------------------------------------------------------------
    | RENDER SELECTED PRODUCTS
    |--------------------------------------------------------------------------
    */

    function renderSelectedProducts() {

        selectedContainer.innerHTML = '';


        if (selectedProducts.length === 0) {

            emptyProducts.style.display = 'block';

        } else {

            emptyProducts.style.display = 'none';

        }


        selectedProducts.forEach(
            function (product, index) {

                const row =
                    document.createElement('div');

                row.className =
                    'product-row';


                const minimum =
                    Number(
                        product.min_quantity || 1
                    );


                row.innerHTML = `

                    <div class="product-image">

                        <img
                            src="${escapeHtml(product.image)}"
                            alt="${escapeHtml(product.name)}"
                        >

                    </div>


                    <div class="product-info">

                        <h3 title="${escapeHtml(product.name)}">
                            ${escapeHtml(product.name)}
                        </h3>

                        <span class="product-category">
                            ${escapeHtml(product.category)}
                        </span>

                    </div>


                    <div class="quantity-wrapper">

                        <button
                            type="button"
                            class="quantity-btn decrease-btn"
                            data-index="${index}"
                            aria-label="Decrease quantity"
                        >
                            −
                        </button>


                        <input
                            type="number"
                            class="quantity-input"
                            value="${product.quantity}"
                            min="${minimum}"
                            step="1"
                            data-index="${index}"
                            aria-label="Quantity"
                        >


                        <button
                            type="button"
                            class="quantity-btn increase-btn"
                            data-index="${index}"
                            aria-label="Increase quantity"
                        >
                            +
                        </button>

                    </div>


                    <span class="product-unit">
                        ${escapeHtml(product.unit)}
                    </span>


                    <button
                        type="button"
                        class="remove-product"
                        data-index="${index}"
                        title="Remove product from inquiry"
                        aria-label="Remove ${escapeHtml(product.name)}"
                    >
                        ×
                    </button>


                    <input
                        type="hidden"
                        name="products[${index}][product_id]"
                        value="${product.id}"
                    >


                    <input
                        type="hidden"
                        name="products[${index}][quantity]"
                        value="${product.quantity}"
                    >

                `;


                selectedContainer.appendChild(row);

            }
        );


        attachSelectedProductEvents();

    }


    /*
    |--------------------------------------------------------------------------
    | SELECTED PRODUCT EVENTS
    |--------------------------------------------------------------------------
    */

    function attachSelectedProductEvents() {


        /*
        | Increase
        */

        document
            .querySelectorAll('.increase-btn')
            .forEach(
                function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            const index =
                                Number(
                                    this.dataset.index
                                );


                            if (
                                !selectedProducts[index]
                            ) {
                                return;
                            }


                            selectedProducts[index].quantity++;


                            renderSelectedProducts();

                        }
                    );

                }
            );


        /*
        | Decrease
        */

        document
            .querySelectorAll('.decrease-btn')
            .forEach(
                function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            const index =
                                Number(
                                    this.dataset.index
                                );


                            const product =
                                selectedProducts[index];


                            if (!product) {
                                return;
                            }


                            const minimum =
                                Number(
                                    product.min_quantity || 1
                                );


                            if (
                                product.quantity >
                                minimum
                            ) {

                                product.quantity--;

                                renderSelectedProducts();

                            }

                        }
                    );

                }
            );


        /*
        | Manual quantity
        */

        document
            .querySelectorAll('.quantity-input')
            .forEach(
                function (input) {

                    input.addEventListener(
                        'change',
                        function () {

                            const index =
                                Number(
                                    this.dataset.index
                                );


                            const product =
                                selectedProducts[index];


                            if (!product) {
                                return;
                            }


                            const minimum =
                                Number(
                                    product.min_quantity || 1
                                );


                            let quantity =
                                parseInt(
                                    this.value,
                                    10
                                );


                            if (
                                isNaN(quantity) ||
                                quantity < minimum
                            ) {

                                quantity = minimum;

                            }


                            product.quantity =
                                quantity;


                            renderSelectedProducts();

                        }
                    );

                }
            );


        /*
        | Remove
        */

        document
            .querySelectorAll('.remove-product')
            .forEach(
                function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            const index =
                                Number(
                                    this.dataset.index
                                );


                            removeProduct(index);

                        }
                    );

                }
            );

    }


    /*
    |--------------------------------------------------------------------------
    | FORM VALIDATION
    |--------------------------------------------------------------------------
    */

    if (form) {

        form.addEventListener(
            'submit',
            function (event) {

                let isValid = true;


                /*
                | Product validation
                */

                if (
                    selectedProducts.length === 0
                ) {

                    event.preventDefault();

                    alert(
                        'Please select at least one product for your inquiry.'
                    );

                    return;

                }


                /*
                | Validate Name
                */

                const name =
                    document.getElementById(
                        'customer_name'
                    );


                if (
                    name.value.trim().length < 2
                ) {

                    showError('customer_name');

                    isValid = false;

                } else {

                    hideError('customer_name');

                }


                /*
                | Validate Company
                */

                const company =
                    document.getElementById(
                        'company_name'
                    );


                if (
                    company.value.trim().length < 2
                ) {

                    showError('company_name');

                    isValid = false;

                } else {

                    hideError('company_name');

                }


                /*
                | Validate Email
                */

                const email =
                    document
                        .getElementById('email')
                        .value
                        .trim();


                const emailPattern =
                    /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


                if (
                    !emailPattern.test(email)
                ) {

                    showError('email');

                    isValid = false;

                } else {

                    hideError('email');

                }


                /*
                | Validate Phone
                */

                const phone =
                    document
                        .getElementById('phone')
                        .value
                        .replace(/\D/g, '');


                if (phone.length < 8) {

                    showError('phone');

                    isValid = false;

                } else {

                    hideError('phone');

                }


                /*
                | Customer Type
                */

                const customerType =
                    document.getElementById(
                        'customer_type'
                    );


                if (!customerType.value) {

                    showError('customer_type');

                    isValid = false;

                } else {

                    hideError('customer_type');

                }


                /*
                | Country
                */

                const country =
                    document.getElementById(
                        'country'
                    );


                if (
                    country.value.trim().length < 2
                ) {

                    showError('country');

                    isValid = false;

                } else {

                    hideError('country');

                }


                /*
                | Stop if invalid
                */

                if (!isValid) {

                    event.preventDefault();


                    const firstError =
                        document.querySelector(
                            '.error-message.show'
                        );


                    if (firstError) {

                        firstError
                            .closest('.form-group')
                            .scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });

                    }


                    return;

                }


                /*
                | Prevent double submission
                | Only visual protection for now.
                */

                const submitButton =
                    document.getElementById(
                        'submitInquiryBtn'
                    );


                if (submitButton) {

                    submitButton.disabled = true;

                    submitButton.querySelector(
                        'span'
                    ).textContent =
                        'Sending Inquiry...';

                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | ERROR HELPERS
    |--------------------------------------------------------------------------
    */

    function showError(field) {

        const input =
            document.getElementById(field);

        const error =
            document.getElementById(
                field + '_error'
            );


        if (input) {

            input.classList.add(
                'is-invalid'
            );

        }


        if (error) {

            error.classList.add(
                'show'
            );

        }

    }


    function hideError(field) {

        const input =
            document.getElementById(field);

        const error =
            document.getElementById(
                field + '_error'
            );


        if (input) {

            input.classList.remove(
                'is-invalid'
            );

        }


        if (error) {

            error.classList.remove(
                'show'
            );

        }

    }


    /*
    |--------------------------------------------------------------------------
    | ESCAPE HTML
    |--------------------------------------------------------------------------
    */

    function escapeHtml(value) {

        if (value === null || value === undefined) {
            return '';
        }


        return String(value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');

    }


    /*
    |--------------------------------------------------------------------------
    | INITIALIZE
    |--------------------------------------------------------------------------
    */

    initializeCartProducts();

});

(function () {
    'use strict';

    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(function (form) {

        form.addEventListener('submit', function (event) {

            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');

        }, false);

    });

})();


function showToast(type = 'success', title = '', message = '', duration = 4000) {
  let container = document.querySelector('.toast-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'toast-container';
    document.body.appendChild(container);
  }

  const icon = type === 'success' ? '✓' : '✕';

  const toast = document.createElement('div');
  toast.className = `custom-toast ${type}`;
  toast.style.position = 'relative';
  toast.innerHTML = `
    <div class="custom-toast-icon">${icon}</div>
    <div class="custom-toast-content">
      <p class="custom-toast-title">${title}</p>
      <p class="custom-toast-message">${message}</p>
    </div>
    <button class="custom-toast-close">&times;</button>
    <div class="custom-toast-progress" style="animation-duration:${duration}ms"></div>
  `;

  container.appendChild(toast);
  requestAnimationFrame(() => toast.classList.add('show'));

  const removeToast = () => {
    toast.classList.remove('show');
    toast.classList.add('hide');
    setTimeout(() => toast.remove(), 400);
  };

  const timer = setTimeout(removeToast, duration);

  toast.querySelector('.custom-toast-close').addEventListener('click', () => {
    clearTimeout(timer);
    removeToast();
  });
}
