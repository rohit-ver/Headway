@extends('layouts.app')

@section('title', 'About Us | Headway Makhana')

@section('content')


<!-- =========================================================
     FOUNDER'S NOTE
========================================================= -->

<section class="about-story">
    <div class="container">
        <div class="row align-items-start g-5">

            <!-- Founder Image -->
            <div class="col-lg-6">
                <div class="story-image">
                    <img src="{{ asset('images/founder.png') }}"
                         alt="Founder of Headway">
                </div>
            </div>

            <!-- Founder Message -->
            <div class="col-lg-6">

                <div class="heading-ornament">
                    <h2 class="section-title title-green">Founder's Note</h2>
                    <img src="{{ asset('images/divider.png') }}" alt="" class="heading-divider">
                </div>

                <p class="section-text">
                    We started<strong> Headway- Globally Local</strong> to honor the way
                    <span class="hand">flavor, texture &amp; scent</span>
                    can stir something deeper – a memory, a mood, a moment of care.
                    Whether it’s a bite of
                    <span class="hand">delicious ethnic sweet, snacking for quick &amp; flavourful treat, ready-to-eat comfort dish</span>
                    which can soften a hard day, or
                    <span class="hand">a pinch of spice</span>
                    that can take you home or to your favourite resonated spot.
                    We believe food should feel like a ritual. A way to connect—to culture, to self, to others.
                </p>

                <p class="section-text">
                    Our authenticity ensure that every product or ingredient we choose &amp; offer
                    stays true to its roots. This is our way of blending progress with roots.
                    By offering products that nourish more than hunger, that speak in whispers
                    not slogans, that invite feel not just to consume but more than that.
                </p>

                <p class="founder-quote"> <span class="hand">Here’s to flavour with feelings. Here’s to Headway</span></p>

                <p class="founder-names">Rachna Sethia – Anshu Choudhary</p>

            </div>

        </div>
    </div>
</section>

    {{-- private label --}}
    <section class="about-story">
        <div class="container">
            <div class="row align-items-start g-5 flex-lg-row-reverse">

                <!-- Image (left) -->
                <div class="col-lg-6">
                    <div class="story-image">
                        <img src="{{ asset('images/mission.png') }}"
                            alt="Our Mission">
                    </div>
                </div>

                <!-- Text (right) -->
                <div class="col-lg-6">

                    <div class="heading-ornament">
                        <h2 class="section-title title-green">Private Labelling</h2>
                        <img src="{{ asset('images/divider.png') }}" alt="" class="heading-divider">
                    </div>

                    <p class="section-text">
                       We extend this vision by offering partners access to our signature sweets, blends, snacks, ready to creation that help grow own brand identity through essential everyday line or premium seasonal inspired editions. We ensure authenticity, quality, & emotional connection remain at the core. We help partners to elevate their private label ranges into experiences that inspire loyalty & delight.
                        <br>    
                        We also believe in strategic partnership to redefine food experiences. We want to join mid & micro portfolio brands to create offerings that resonate deeply with consumers. These alliances allow us to blend our cultural storytelling & sensory innovation with partner’s by creating value that goes beyond products.
                        <br>
                        Together, private labelling & strategic partnerships form a powerful pathway to scale, diversify, & showcase the artistry of food while honouring cultural depth & consumer trust.
                    </p>

                    {{-- <p class="section-text">
                        Yahan doosra paragraph likho.
                    </p> --}}

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

            <span class="section-tag">WHAT DRIVES US</span>

            <h2 class="section-title">
                Built Around
                <span>Quality &amp; Trust.</span>
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