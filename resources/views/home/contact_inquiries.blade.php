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


                    <form action="{{ route('contact.store') }}"
                            method="POST"
                            class="row g-3 needs-validation"
                            novalidate>

                            @csrf

                            {{-- NAME --}}
                            <div class="col-md-6">

                                <label class="contact-label" for="validationName">
                                    Full Name
                                    <span>*</span>
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-person"></i>

                                    <input type="text"
                                        name="name"
                                        id="validationName"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}"
                                        placeholder="Enter your name"
                                        minlength="2"
                                        maxlength="150"
                                        required>

                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @else
                                            Please enter your full name.
                                        @enderror
                                    </div>

                                </div>

                            </div>


                            {{-- EMAIL --}}
                            <div class="col-md-6">

                                <label class="contact-label" for="validationEmail">
                                    Email
                                    <span>*</span>
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-envelope"></i>

                                    <input type="email"
                                        name="email"
                                        id="validationEmail"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}"
                                        placeholder="Enter business email"
                                        maxlength="150"
                                        required>

                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    <div class="invalid-feedback">
                                        @error('email')
                                            {{ $message }}
                                        @else
                                            Please enter a valid email address.
                                        @enderror
                                    </div>

                                </div>

                            </div>


                            {{-- PHONE --}}
                            <div class="col-md-6">

                                <label class="contact-label" for="validationPhone">
                                    Phone Number
                                    <span>*</span>
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-telephone"></i>

                                    <input type="tel"
                                        name="phone"
                                        id="validationPhone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}"
                                        placeholder="Enter phone number"
                                        pattern="[0-9]{10,15}"
                                        maxlength="15"
                                        required>

                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    <div class="invalid-feedback">
                                        @error('phone')
                                            {{ $message }}
                                        @else
                                            Please enter a valid phone number.
                                        @enderror
                                    </div>

                                </div>

                            </div>


                            {{-- WHATSAPP --}}
                            <div class="col-md-6">

                                <label class="contact-label" for="validationWhatsapp">
                                    WhatsApp Number
                                    <span>*</span>
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-whatsapp"></i>

                                    <input type="tel"
                                        name="whatsapp"
                                        id="validationWhatsapp"
                                        class="form-control @error('whatsapp') is-invalid @enderror"
                                        value="{{ old('whatsapp') }}"
                                        placeholder="Enter WhatsApp number"
                                        pattern="[0-9]{10,15}"
                                        maxlength="15"
                                        required>

                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    <div class="invalid-feedback">
                                        @error('whatsapp')
                                            {{ $message }}
                                        @else
                                            Please enter a valid WhatsApp number.
                                        @enderror
                                    </div>

                                </div>

                            </div>


                            {{-- CUSTOMER TYPE --}}
                            <div class="col-md-6">

                                <label class="contact-label" for="validationCustomerType">
                                    Customer Type
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-briefcase"></i>

                                    <select name="customer_type"
                                            id="validationCustomerType"
                                            class="form-select @error('customer_type') is-invalid @enderror">

                                        <option value="">
                                            Select customer type
                                        </option>

                                        <option value="domestic"
                                            {{ old('customer_type') == 'domestic' ? 'selected' : '' }}>
                                            Domestic Buyer
                                        </option>

                                        <option value="international"
                                            {{ old('customer_type') == 'international' ? 'selected' : '' }}>
                                            International Buyer
                                        </option>

                                        <option value="retailer"
                                            {{ old('customer_type') == 'retailer' ? 'selected' : '' }}>
                                            Retailer
                                        </option>

                                        <option value="wholesaler"
                                            {{ old('customer_type') == 'wholesaler' ? 'selected' : '' }}>
                                            Wholesaler
                                        </option>

                                        <option value="distributor"
                                            {{ old('customer_type') == 'distributor' ? 'selected' : '' }}>
                                            Distributor
                                        </option>

                                    </select>

                                    <div class="invalid-feedback">
                                        @error('customer_type')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                </div>

                            </div>


                            {{-- SUBJECT --}}
                            <div class="col-md-6">

                                <label class="contact-label" for="validationSubject">
                                    Subject
                                </label>

                                <div class="contact-input-wrapper">

                                    <i class="bi bi-chat-left-text"></i>

                                    <select name="subject"
                                            id="validationSubject"
                                            class="form-select @error('subject') is-invalid @enderror">

                                        <option value="">
                                            Select enquiry type
                                        </option>

                                        <option value="bulk-order"
                                            {{ old('subject') == 'bulk-order' ? 'selected' : '' }}>
                                            Bulk Order
                                        </option>

                                        <option value="product-enquiry"
                                            {{ old('subject') == 'product-enquiry' ? 'selected' : '' }}>
                                            Product Enquiry
                                        </option>

                                        <option value="export"
                                            {{ old('subject') == 'export' ? 'selected' : '' }}>
                                            Export Enquiry
                                        </option>

                                        <option value="packaging"
                                            {{ old('subject') == 'packaging' ? 'selected' : '' }}>
                                            Packaging Requirement
                                        </option>

                                        <option value="other"
                                            {{ old('subject') == 'other' ? 'selected' : '' }}>
                                            Other
                                        </option>

                                    </select>

                                    <div class="invalid-feedback">
                                        @error('subject')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                </div>

                            </div>


                            {{-- MESSAGE --}}
                            <div class="col-12">

                                <label class="contact-label" for="validationMessage">
                                    Message
                                    <span>*</span>
                                </label>

                                <div class="contact-input-wrapper textarea-wrapper">

                                    <i class="bi bi-pencil-square"></i>

                                    <textarea name="message"
                                            id="validationMessage"
                                            rows="5"
                                            class="form-control @error('message') is-invalid @enderror"
                                            placeholder="Tell us about your requirements..."
                                            minlength="10"
                                            maxlength="5000"
                                            required>{{ old('message') }}</textarea>

                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                    <div class="invalid-feedback">
                                        @error('message')
                                            {{ $message }}
                                        @else
                                            Please enter your requirements.
                                        @enderror
                                    </div>

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
<script>
    document.getElementById('contactForm').addEventListener('submit', function (e) {
  e.preventDefault();
  const form = this;

  fetch(form.action, {
    method: 'POST',
    body: new FormData(form),
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
      'Accept': 'application/json'
    }
  })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        showToast('success', 'Message Sent!', 'Hum jaldi aapse contact karenge.');
        form.reset();
      } else {
        showToast('error', 'Something went wrong', data.message || 'Please try again.');
      }
    })
    .catch(() => {
      showToast('error', 'Network Error', 'Please check your connection.');
    });
});
</script>

@endsection

