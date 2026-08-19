@extends('layouts.app')

@section('title', 'About Us | Headway Makhana')

@section('content')


<!-- =========================================================
     ABOUT HERO
========================================================= -->

<section class="about-hero">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- Left Content -->

            <div class="col-lg-6">

                <span class="about-tag">
                    ABOUT HEADWAY
                </span>

                <h1 class="about-hero-title">
                    Quality Foods
                    <span>Trusted Globally.</span>
                </h1>

                <p class="about-hero-text">
                    We started Sethia Marketing to honor the way flavor, texture & scent can stir something deeper - a memory, a mood, a moment of care. 
                    Whether it's a bite of delicious ethnic sweet, snacking for quick & flavourful treat, ready-to-eat comfort 
                    dish which can soften a hard day, or a pinch of spice that can take you home or to your favourite resonated
                    spot. We believe food should feel like a ritual. A way to connect-to culture, to self, to others.
                </p>

                <div class="about-hero-buttons">

                    <a href="{{ url('/products') }}"
                       class="about-primary-btn">

                        Explore Products

                        <i class="bi bi-arrow-right"></i>

                    </a>

                    <a href="{{ url('/contact') }}"
                       class="about-outline-btn">

                        Send Inquiry

                    </a>

                </div>

            </div>


            <!-- Right Image -->

            <div class="col-lg-6">

                <div class="about-hero-image">

                    <img src="{{ asset('images/about.png') }}"
                         alt="Premium Makhana">

                    <div class="about-image-badge">

                        <strong>100%</strong>

                        <span>
                            Quality Focused
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     OUR STORY
========================================================= -->

<section class="about-story">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- Image -->

            <div class="col-lg-5">

                <div class="story-image">

                    <img src="{{ asset('images/processing.png') }}"
                         alt="Makhana Processing">

                </div>

            </div>


            <!-- Content -->

            <div class="col-lg-7">

                <span class="section-tag">
                    OUR VISION
                </span>

                <h2 class="section-title">
                    Progressing With
                    <span>Roots..</span>
                </h2>

                <p class="section-text">
                    At Headway, we believe that food is a medium of
                    transformation — not just for consumption, but also for
                    cultural expression and social interaction. We believe
                    in the power of authenticity, progressing with roots.
                </p>

                <p class="section-text">
                    Celebrating "the journey of flavors" across borders,
                    while honoring local traditions and embracing global
                    curiosity — our mission is to season the world
                    soulfully, dedicated to crafting ethically sourced
                    products that honor traditions and elevate daily
                    rituals.
                </p>


                <div class="story-points">

                    <div class="story-point">

                        <div class="story-icon">
                            <i class="bi bi-check-lg"></i>
                        </div>

                        <div>
                            <h5>Trusted Sourcing</h5>
                            <p>
                                Carefully sourced from trusted farming
                                partners.
                            </p>
                        </div>

                    </div>


                    <div class="story-point">

                        <div class="story-icon">
                            <i class="bi bi-check-lg"></i>
                        </div>

                        <div>
                            <h5>Quality Processing</h5>
                            <p>
                                Processed and packed with quality in mind.
                            </p>
                        </div>

                    </div>


                    <div class="story-point">

                        <div class="story-icon">
                            <i class="bi bi-check-lg"></i>
                        </div>

                        <div>
                            <h5>Reliable Supply</h5>
                            <p>
                                Consistent solutions for retail and bulk
                                requirements.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     OUR VALUES
========================================================= -->

<section class="about-values">

    <div class="container">

        <div class="text-center values-heading">

            <span class="section-tag">
                WHAT DRIVES US
            </span>

            <h2 class="section-title">
                Built Around
                <span>Quality & Trust.</span>
            </h2>

            <p>
                We believe long-term business relationships are built
                through quality, consistency and transparency.
            </p>

        </div>


        <div class="row g-4">


            <!-- Value 1 -->

            <div class="col-lg-4 col-md-6">

                <div class="value-card">

                    <div class="value-icon">
                        <i class="bi bi-award"></i>
                    </div>

                    <h3>Quality First</h3>

                    <p>
                        We maintain a strong focus on product quality,
                        hygiene and consistency throughout the supply
                        process.
                    </p>

                </div>

            </div>


            <!-- Value 2 -->

            <div class="col-lg-4 col-md-6">

                <div class="value-card">

                    <div class="value-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h3>Trusted Partnership</h3>

                    <p>
                        We aim to build dependable long-term relationships
                        with buyers, distributors and business partners.
                    </p>

                </div>

            </div>


            <!-- Value 3 -->

            <div class="col-lg-4 col-md-6">

                <div class="value-card">

                    <div class="value-icon">
                        <i class="bi bi-globe2"></i>
                    </div>

                    <h3>Global Vision</h3>

                    <p>
                        Our approach is designed to support both domestic
                        business requirements and international markets.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>



<!-- =========================================================
     BUSINESS STATS
========================================================= -->

<section class="about-stats">

    <div class="container">

        <div class="row g-0">


            <div class="col-6 col-lg-3">

                <div class="stat-item">

                    <i class="bi bi-box-seam"></i>

                    <strong>Premium</strong>

                    <span>Product Quality</span>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="stat-item">

                    <i class="bi bi-people"></i>

                    <strong>Trusted</strong>

                    <span>Business Partners</span>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="stat-item">

                    <i class="bi bi-globe"></i>

                    <strong>Global</strong>

                    <span>Market Focus</span>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="stat-item">

                    <i class="bi bi-headset"></i>

                    <strong>Reliable</strong>

                    <span>Business Support</span>

                </div>

            </div>


        </div>

    </div>

</section>

@endsection