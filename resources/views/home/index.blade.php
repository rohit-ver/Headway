@extends('layouts.app')

@section('title', 'Makhana | Premium Fox Nuts')

@section('content')

    {{-- =====================================================
         AUTH MODALS
    ====================================================== --}}

    @guest

        @include('components.auth-modal')

        @include('components.login-modal')

        @include('components.registration-modal')

        @include('components.forgot-password-modal')

    @endguest

    @if (session('status'))
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999">
    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('status') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toastEl = document.getElementById('successToast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        }

        setTimeout(function () {
            const loginModalEl = document.getElementById('loginModal');
            if (loginModalEl) {
                const loginModal = new bootstrap.Modal(loginModalEl);
                loginModal.show();
            }
        }, 1000);
    });
</script>
@endif
@if ($errors->has('email') && old('password'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const loginModalEl = document.getElementById('loginModal');
        if (loginModalEl) {
            const loginModal = new bootstrap.Modal(loginModalEl);
            loginModal.show();
        }
    });
</script>
@endif


    {{-- =====================================================
         HERO SECTION
    ====================================================== --}}

    <section class="hero-section">

        <div class="hero-wrapper">


            {{-- =================================================
                 BACKGROUND IMAGE CAROUSEL
            ================================================== --}}

            <div id="heroCarousel"
                 class="carousel slide carousel-fade"
                 data-bs-ride="carousel"
                 data-bs-interval="2000">


                {{-- Carousel Indicators --}}

                <div class="carousel-indicators">

                    <button type="button"
                            data-bs-target="#heroCarousel"
                            data-bs-slide-to="0"
                            class="active"
                            aria-current="true"
                            aria-label="Slide 1">
                    </button>

                    <button type="button"
                            data-bs-target="#heroCarousel"
                            data-bs-slide-to="1"
                            aria-label="Slide 2">
                    </button>

                    <button type="button"
                            data-bs-target="#heroCarousel"
                            data-bs-slide-to="2"
                            aria-label="Slide 3">
                    </button>

                </div>


                {{-- =================================================
                     CAROUSEL IMAGES
                ================================================== --}}

                <div class="carousel-inner">

                    {{-- Banner 1 --}}

                    <div class="carousel-item active">

                        <img src="{{ asset('images/banner1.png') }}"
                             class="hero-bg"
                             alt="Premium Makhana">

                    </div>


                    {{-- Banner 2 --}}

                    <div class="carousel-item">

                        <img src="{{ asset('images/banner2.png') }}"
                             class="hero-bg"
                             alt="Healthy Makhana">

                    </div>


                    {{-- Banner 3 --}}

                    <div class="carousel-item">

                        <img src="{{ asset('images/banner3.png') }}"
                             class="hero-bg"
                             alt="Makhana Wholesale">

                    </div>

                </div>


                {{-- Previous Button --}}

                <button class="carousel-control-prev"
                        type="button"
                        data-bs-target="#heroCarousel"
                        data-bs-slide="prev">

                    <span class="carousel-control-prev-icon"></span>

                    <span class="visually-hidden">
                        Previous
                    </span>

                </button>


                {{-- Next Button --}}

                <button class="carousel-control-next"
                        type="button"
                        data-bs-target="#heroCarousel"
                        data-bs-slide="next">

                    <span class="carousel-control-next-icon"></span>

                    <span class="visually-hidden">
                        Next
                    </span>

                </button>

            </div>


            {{-- =================================================
                 HERO OVERLAY
            ================================================== --}}

            <div class="hero-overlay"></div>


            {{-- =================================================
                 HERO CONTENT
            ================================================== --}}

            <div class="hero-content-wrapper">

                <div class="container">

                    <div class="hero-content">


                        {{-- Badge --}}

                        <span class="hero-badge">
                            100% Natural & Premium Quality
                        </span>


                        {{-- Heading --}}

                        <h1>

                            Premium Foods

                            <span>
                                Made for Every Occasion!
                            </span>

                        </h1>


                        {{-- Description --}}

                        <p>
                            From premium Makhana and Namkeen to
                            traditional Sweets and curated Gift Boxes,
                            we deliver quality food products crafted
                            for retail, wholesale and business
                            requirements.
                        </p>


                        {{-- Features --}}

                        <div class="hero-features">

                            <span>
                                <i class="bi bi-check2"></i>
                                Premium Quality
                            </span>

                            <span>
                                <i class="bi bi-check2"></i>
                                Bulk Orders
                            </span>

                            <span>
                                <i class="bi bi-check2"></i>
                                Custom Solutions
                            </span>

                        </div>


                        {{-- =================================================
                             EXPLORE PRODUCTS BUTTON
                        ================================================== --}}

                       @customerAuth
                            <a href="{{ route('products') }}"
                            class="hero-btn explore-products-btn">

                                Explore Products
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @else
                            <a href="#"
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


            {{-- =================================================
                 FLOATING DECORATIVE ELEMENTS
            ================================================== --}}

            <div class="floating-leaf leaf-one">

                <i class="bi bi-leaf-fill"></i>

            </div>


            <div class="floating-leaf leaf-two">

                <i class="bi bi-leaf-fill"></i>

            </div>


            <div class="floating-dot dot-one"></div>

            <div class="floating-dot dot-two"></div>


        </div>

    </section>
    
    {{-- =====================================================
         PRODUCTS SECTION--}}

  @include('home.products-content')



@endsection