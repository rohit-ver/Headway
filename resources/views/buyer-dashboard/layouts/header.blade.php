<header class="buyer-topbar">

    {{-- LEFT SIDE --}}
    <div class="buyer-topbar-left">

        {{-- Mobile Sidebar Toggle --}}
        <button type="button"
                class="buyer-menu-toggle"
                onclick="toggleBuyerSidebar()">

            <i class="bi bi-list"></i>

        </button>


        {{-- Page Heading --}}
        <div class="buyer-page-heading">

            <span>
                BUYER PORTAL
            </span>

            <h1>
                @yield('page-heading', 'Dashboard')
            </h1>

        </div>

    </div>


    {{-- RIGHT SIDE --}}
    <div class="buyer-topbar-right">


        {{-- Search --}}
        <button type="button"
                class="buyer-topbar-icon"
                title="Search">

            <i class="bi bi-search"></i>

        </button>


        {{-- Notifications --}}
        <button type="button"
                class="buyer-topbar-icon buyer-notification"
                title="Notifications">

            <i class="bi bi-bell"></i>

            <span class="notification-dot"></span>

        </button>


        {{-- User --}}
        <div class="buyer-top-profile">

            <div class="buyer-top-avatar">

                <i class="bi bi-person"></i>

            </div>


            <div class="buyer-top-user">

                <strong>
                    Buyer Name
                </strong>

                <span>
                    Business Buyer
                </span>

            </div>


            <i class="bi bi-chevron-down buyer-profile-arrow"></i>

        </div>

    </div>

</header>