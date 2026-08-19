@extends('layouts.app')

@section('title', 'Contact Us | HeadwayStrata')

@section('content')

{{-- =========================================================
     CONTACT HERO
========================================================= --}}

<section class="contact-hero">

    <div class="contact-hero-overlay"></div>

    <div class="container">

        <div class="contact-hero-content">

            <span class="contact-tag">
                GET IN TOUCH
            </span>

            <h1>
                Let's Build Your
                <span>Business Together</span>
            </h1>

            <p>
                Have a question about our products, bulk supply,
                packaging or export requirements? Our team is here
                to help you with the right solution.
            </p>

        </div>

    </div>

</section>


{{-- =========================================================
     CONTACT INFO
========================================================= --}}

<section class="contact-info-section">

    <div class="container">

        <div class="section-heading text-center">

            <span class="section-tag">
                CONTACT HEADWAYSTRATA
            </span>

            <h2 class="section-title">
                We're Here To
                <span>Help</span>
            </h2>

            <p class="section-description">
                Connect with our team for product enquiries,
                bulk orders, distribution and export opportunities.
            </p>

        </div>


        <div class="row g-4 contact-info-row">

            {{-- EMAIL --}}

            <div class="col-lg-4 col-md-6">

                <div class="contact-info-card">

                    <div class="contact-icon">
                        <i class="bi bi-envelope"></i>
                    </div>

                    <span class="contact-card-tag">
                        EMAIL US
                    </span>

                    <h3>
                        Business Enquiries
                    </h3>

                    <p>
                        Send us your requirements and our
                        team will get back to you.
                    </p>

                    <a href="mailto:info@headwaystrata.com">
                        info@headwaystrata.com
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>


            {{-- PHONE --}}

            <div class="col-lg-4 col-md-6">

                <div class="contact-info-card">

                    <div class="contact-icon">
                        <i class="bi bi-telephone"></i>
                    </div>

                    <span class="contact-card-tag">
                        CALL US
                    </span>

                    <h3>
                        Speak With Our Team
                    </h3>

                    <p>
                        Discuss your product and business
                        requirements directly with us.
                    </p>

                    <a href="tel:+919351456123">
                        +91 93514 56123
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>


            {{-- LOCATION --}}

            <div class="col-lg-4 col-md-12">

                <div class="contact-info-card">

                    <div class="contact-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>

                    <span class="contact-card-tag">
                        OUR LOCATION
                    </span>

                    <h3>
                        Visit Our Office
                    </h3>

                    <p>
                        Connect with our team for business
                        meetings and partnership discussions.
                    </p>

                    <a href="#">
                        Jaipur, Rajasthan, India
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     CONTACT FORM
========================================================= --}}

<section class="contact-form-section">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- LEFT CONTENT --}}

            <div class="col-lg-5">

                <div class="contact-form-content">

                    <span class="contact-tag">
                        BUSINESS ENQUIRY
                    </span>

                    <h2>
                        Tell Us What
                        <span>You Need</span>
                    </h2>

                    <p>
                        Whether you are a retailer, wholesaler,
                        distributor or international buyer,
                        share your requirements with us.
                    </p>


                    <div class="contact-feature">

                        <div class="contact-feature-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>

                        <div>
                            <h4>
                                Bulk Orders
                            </h4>

                            <p>
                                Discuss your wholesale and
                                bulk supply requirements.
                            </p>
                        </div>

                    </div>


                    <div class="contact-feature">

                        <div class="contact-feature-icon">
                            <i class="bi bi-globe2"></i>
                        </div>

                        <div>
                            <h4>
                                Export Enquiries
                            </h4>

                            <p>
                                Looking for reliable Indian food
                                products for international markets?
                            </p>
                        </div>

                    </div>


                    <div class="contact-feature">

                        <div class="contact-feature-icon">
                            <i class="bi bi-box2-heart"></i>
                        </div>

                        <div>
                            <h4>
                                Custom Packaging
                            </h4>

                            <p>
                                Explore packaging options according
                                to your business requirements.
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT FORM --}}

            <div class="col-lg-7">

                <div class="contact-form-card">

                    <div class="form-card-heading">

                        <span>
                            SEND US A MESSAGE
                        </span>

                        <h3>
                            How Can We Help?
                        </h3>

                        <p>
                            Fill in the details below and our team
                            will contact you shortly.
                        </p>

                    </div>


                    <form action="#" method="POST">

                        @csrf

                        <div class="row g-4">

                            {{-- NAME --}}

                            <div class="col-md-6">

                                <label class="contact-label">
                                    Full Name
                                    <span>*</span>
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-person"></i>

                                    <input type="text"
                                           name="name"
                                           placeholder="Enter your name"
                                           required>

                                </div>

                            </div>


                            {{-- EMAIL --}}

                            <div class="col-md-6">

                                <label class="contact-label">
                                     Email
                                    <span>*</span>
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-envelope"></i>

                                    <input type="email"
                                           name="email"
                                           placeholder="Enter business email"
                                           required>

                                </div>

                            </div>

                            {{-- PHONE --}}

                            <div class="col-md-6">

                                <label class="contact-label">
                                    Phone Number
                                    <span>*</span>
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-telephone"></i>

                                    <input type="tel"
                                           name="phone"
                                           placeholder="Enter phone number"
                                           required>

                                </div>

                            </div>

                            {{--Whatsapp Number --}}

                            <div class="col-md-6">

                                <label class="contact-label">
                                    Whatsapp Number
                                    <span>*</span>
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-telephone"></i>

                                    <input type="tel"
                                           name="phone"
                                           placeholder="Enter Whatsapp number"
                                           required>

                                </div>

                            </div>


                            {{-- CUSTOMER TYPE --}}

                            <div class="col-md-6">

                                <label class="contact-label">
                                    Customer Type
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-briefcase"></i>

                                    <select name="customer_type">

                                        <option value="">
                                            Select customer type
                                        </option>

                                        <option value="domestic">
                                            Domestic Buyer
                                        </option>

                                        <option value="international">
                                            International Buyer
                                        </option>

                                        <option value="retailer">
                                            Retailer
                                        </option>

                                        <option value="wholesaler">
                                            Wholesaler
                                        </option>

                                        <option value="distributor">
                                            Distributor
                                        </option>

                                    </select>

                                </div>

                            </div>


                            {{-- SUBJECT --}}

                            <div class="col-md-6">

                                <label class="contact-label">
                                    Subject
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-chat-left-text"></i>

                                    <select name="subject">

                                        <option value="">
                                            Select enquiry type
                                        </option>

                                        <option value="bulk-order">
                                            Bulk Order
                                        </option>

                                        <option value="product-enquiry">
                                            Product Enquiry
                                        </option>

                                        <option value="export">
                                            Export Enquiry
                                        </option>

                                        <option value="packaging">
                                            Packaging Requirement
                                        </option>

                                        <option value="other">
                                            Other
                                        </option>

                                    </select>

                                </div>

                            </div>


                            {{-- MESSAGE --}}

                            <div class="col-12">

                                <label class="contact-label">
                                    Message
                                    <span>*</span>
                                </label>

                                <div class="contact-input-wrapper textarea-wrapper">

                                    <i class="bi bi-pencil-square"></i>

                                    <textarea name="message"
                                              rows="5"
                                              placeholder="Tell us about your requirements..."
                                              required></textarea>

                                </div>

                            </div>


                            {{-- SUBMIT --}}

                            <div class="col-12">

                                <button type="submit"
                                        class="contact-submit-btn">

                                    Send Inquiry

                                    <i class="bi bi-arrow-right"></i>

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     BUSINESS CTA
========================================================= --}}

<section class="contact-cta">

    <div class="container">

        <div class="contact-cta-box">

            <div>

                <span>
                    READY TO WORK WITH US?
                </span>

                <h2>
                    Let's grow your
                    <strong>business together.</strong>
                </h2>

            </div>

            <a href="{{ url('/products') }}"
               class="contact-cta-btn">

                Explore Products

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</section>

@endsection