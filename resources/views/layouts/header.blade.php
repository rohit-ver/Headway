<header class="main-header">

    <nav class="navbar navbar-expand-lg">

        <div class="container-fluid header-container">

            <a href="{{ url('/') }}" class="brand-logo">
                <img src="{{ asset('images/Headway-logo.png') }}"
                    alt="HeadwayStrata Logo"
                    class="brand-logo-img">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler custom-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">

                <span class="navbar-toggler-icon"></span>

            </button>


            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="mainNavbar">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ url('/') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                        href="{{ url('/about') }}">
                            About Us
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}"
                        href="{{ url('/products') }}">
                            Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('why-makhana*') ? 'active' : '' }}"
                        href="{{ url('/products') }}">
                            Shop
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                        href="{{ url('/contactus') }}">
                            Contact Us
                        </a>
                    </li>

                    <!-- Cart -->
                    <li class="nav-item cart-item">

                        <a href="{{ url('cart') }}" class="cart-link">

                            <i class="bi bi-cart3"></i>

                            <span class="cart-count">
                                0
                            </span>

                        </a>

                    </li>
                    <!-- USER MENU -->
                    <li class="nav-item user-menu">

                        <button type="button"
                                class="user-menu-toggle"
                                onclick="toggleUserMenu()">

                            <i class="bi bi-person user-icon"></i>

                            <span class="user-name">
                                Login
                            </span>

                            <i class="bi bi-chevron-down arrow-icon"></i>

                        </button>


                        <!-- USER POPUP -->

                        <div class="user-dropdown" id="userDropdown">

                            <div class="user-dropdown-header">

                                <div class="user-dropdown-avatar">
                                    <i class="bi bi-person"></i>
                                </div>

                                <div class="user-dropdown-info">

                                    <strong>
                                        User Name
                                    </strong>

                                    <span>
                                        Business Buyer
                                    </span>

                                </div>

                            </div>


                            <a href="#" class="user-dropdown-item">
                                <i class="bi bi-person"></i>
                                My Profile
                            </a>

                            <a href="#" class="user-dropdown-item">
                                <i class="bi bi-box-seam"></i>
                                My Orders
                            </a>

                            <a href="#" class="user-dropdown-item">
                                <i class="bi bi-cart3"></i>
                                Inquiry Cart
                            </a>

                            <a href="#" class="user-dropdown-item">
                                <i class="bi bi-chat-left-text"></i>
                                My Inquiries
                            </a>

                            <div class="user-dropdown-divider"></div>


                            <a href="#" class="user-dropdown-item logout">
                                <i class="bi bi-box-arrow-right"></i>
                                Logout
                            </a>

                        </div>

                    </li>
                </ul>

            </div>

        </div>

    </nav>

</header>

<script>
function toggleUserMenu() {

    const menu = document.querySelector('.user-menu');

    if (!menu) {
        console.log('User menu not found');
        return;
    }

    menu.classList.toggle('active');
}


document.addEventListener('click', function (event) {

    const menu = document.querySelector('.user-menu');

    if (!menu) return;

    if (!menu.contains(event.target)) {
        menu.classList.remove('active');
    }

});
</script>