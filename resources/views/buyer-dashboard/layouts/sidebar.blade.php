<aside class="buyer-sidebar"
       id="buyerSidebar">


    {{-- =====================================================
         LOGO
    ====================================================== --}}

    <div class="buyer-sidebar-logo">

        <a href="{{ url('/') }}">

            <img src="{{ asset('images/Headway-logo.png') }}"
                 alt="HeadwayStrata Logo">

        </a>

    </div>


    {{-- Mobile Close --}}
    <button type="button"
            class="buyer-sidebar-close"
            onclick="closeBuyerSidebar()">

        <i class="bi bi-x-lg"></i>

    </button>



    {{-- =====================================================
         USER PROFILE
    ====================================================== --}}

    <div class="buyer-mini-profile">

        <div class="buyer-avatar">

            <i class="bi bi-person"></i>

        </div>


        <div class="buyer-mini-info">

            <strong>
                Buyer Name
            </strong>

            <span>
                Business Buyer
            </span>

        </div>

    </div>



    {{-- =====================================================
         NAVIGATION
    ====================================================== --}}

    <nav class="buyer-sidebar-nav">


        <span class="buyer-nav-label">
            MAIN MENU
        </span>


        {{-- Dashboard --}}
        <a href="{{ url('/buyer/dashboard') }}"
           class="buyer-nav-link
           {{ request()->is('buyer/dashboard') ? 'active' : '' }}">

            <i class="bi bi-grid-1x2"></i>

            <span>
                Dashboard
            </span>

        </a>

        {{-- Orders --}}
        <a href="{{ url('/buyer/orders') }}"
           class="buyer-nav-link
           {{ request()->is('buyer/orders') ? 'active' : '' }}">

            <i class="bi bi-box-seam"></i>

            <span>
                My Orders
            </span>

            <span class="buyer-nav-badge">
                2
            </span>

        </a>


        {{-- Inquiries --}}
        <a href="{{ url('/buyer/my-inquiries') }}"
           class="buyer-nav-link
           {{ request()->is('/buyer/my-inquiries') ? 'active' : '' }}">

            <i class="bi bi-chat-left-text"></i>

            <span>
                My Inquiries
            </span>

        </a>


        {{-- Cart --}}
        <a href="{{ url('/cart') }}"
           class="buyer-nav-link">

            <i class="bi bi-cart3"></i>

            <span>
                Inquiry Cart
            </span>

            <span class="buyer-nav-badge">
                0
            </span>

        </a>
        {{-- =================================================
             ACCOUNT
        ================================================== --}}

        <span class="buyer-nav-label buyer-nav-label-space">
            ACCOUNT
        </span>


        {{-- Settings --}}
        <a href="{{ url('/buyer/settings') }}"
           class="buyer-nav-link
           {{ request()->is('buyer/settings') ? 'active' : '' }}">

            <i class="bi bi-gear"></i>

            <span>
                Account Settings
            </span>

        </a>


        {{-- Logout --}}
        <a href="#"
           class="buyer-nav-link buyer-logout-link">

            <i class="bi bi-box-arrow-right"></i>

            <span>
                Logout
            </span>

        </a>

    </nav>



    {{-- =====================================================
         HELP BOX
    ====================================================== --}}

    <div class="buyer-sidebar-bottom">

        <div class="buyer-help-box">


            <div class="buyer-help-icon">

                <i class="bi bi-headset"></i>

            </div>


            <div class="buyer-help-content">

                <strong>
                    Need Help?
                </strong>

                <span>
                    Talk to our team
                </span>

            </div>


            <a href="{{ url('/contact') }}"
               class="buyer-help-arrow">

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>


</aside>