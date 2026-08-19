<div class="modal fade" id="registrationModal" tabindex="-1"
     aria-labelledby="registrationModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content hw-auth-modal">

            {{-- HEADER --}}
            <div class="modal-header">

                <div>
                    <span class="hw-modal-tag">
                        HEADWAYSTRATA
                    </span>

                    <h4 class="modal-title" id="registrationModalLabel">
                        Create Your Account
                    </h4>
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body">

                {{-- =====================================
                     STEP 1 : CUSTOMER TYPE
                ====================================== --}}

                <div id="customerTypeStep">

                    <div class="hw-choice-header">

                        <h3>
                            Where are you located?
                        </h3>

                        <p>
                            Select your business type to continue registration.
                        </p>

                    </div>


                    <div class="row g-4">

                        {{-- DOMESTIC --}}

                        <div class="col-md-6">

                            <button type="button"
                                    class="customer-type-card"
                                    onclick="selectCustomerType('domestic')">

                                <div class="customer-type-icon">
                                    🇮🇳
                                </div>

                                <div>

                                    <h5>
                                        Domestic
                                    </h5>

                                    <p>
                                        I am a buyer based in India.
                                    </p>

                                </div>

                                <i class="bi bi-arrow-right"></i>

                            </button>

                        </div>


                        {{-- INTERNATIONAL --}}

                        <div class="col-md-6">

                            <button type="button"
                                    class="customer-type-card"
                                    onclick="selectCustomerType('international')">

                                <div class="customer-type-icon">
                                    🌎
                                </div>

                                <div>

                                    <h5>
                                        International
                                    </h5>

                                    <p>
                                        I am a buyer from outside India.
                                    </p>

                                </div>

                                <i class="bi bi-arrow-right"></i>

                            </button>

                        </div>

                    </div>

                </div>


                {{-- =====================================
                     STEP 2 : REGISTRATION FORM
                ====================================== --}}

                <div id="registrationFormStep"
                     style="display:none;">

                    <button type="button"
                            class="hw-back-btn"
                            onclick="backToCustomerType()">

                        <i class="bi bi-arrow-left"></i>

                        Back

                    </button>


                    <div class="hw-form-heading">

                        <span class="hw-modal-tag"
                              id="selectedCustomerType">
                            DOMESTIC CUSTOMER
                        </span>
                        <hr>
                    </div>


                    <form action="#" method="POST">

                        @csrf

                        {{-- Customer Type --}}

                        <input type="hidden"
                               name="customer_type"
                               id="customerType">


                        <div class="row g-3">

                            {{-- Name --}}

                            <div class="col-md-6">

                                <label class="hw-form-label">
                                    Full Name
                                    <span>*</span>
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control hw-input"
                                       placeholder="Enter your name"
                                       required>

                            </div>


                            {{-- Email --}}

                            <div class="col-md-6">

                                <label class="hw-form-label">
                                    Business Email
                                    <span>*</span>
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control hw-input"
                                       placeholder="Enter business email"
                                       required>

                            </div>


                            {{-- Company --}}

                            <div class="col-md-6">

                                <label class="hw-form-label">
                                    Company Name
                                    <span>*</span>
                                </label>

                                <input type="text"
                                       name="company_name"
                                       class="form-control hw-input"
                                       placeholder="Enter company name"
                                       required>

                            </div>


                            {{-- Phone --}}

                            <div class="col-md-6">

                                <label class="hw-form-label">
                                    Phone Number
                                    <span>*</span>
                                </label>

                                <input type="tel"
                                       name="phone"
                                       class="form-control hw-input"
                                       placeholder="Enter phone number"
                                       required>

                            </div>


                            {{-- COUNTRY
                                 ONLY INTERNATIONAL
                            --}}

                            <div class="col-md-6"
                                 id="countryField"
                                 style="display:none;">

                                <label class="hw-form-label">
                                    Country
                                    <span>*</span>
                                </label>

                                <select name="country"
                                        id="country"
                                        class="form-select hw-input">

                                    <option value="">
                                        Select Country
                                    </option>

                                    <option value="USA">
                                        United States
                                    </option>

                                    <option value="UK">
                                        United Kingdom
                                    </option>

                                    <option value="UAE">
                                        United Arab Emirates
                                    </option>

                                    <option value="Canada">
                                        Canada
                                    </option>

                                    <option value="Australia">
                                        Australia
                                    </option>

                                    <option value="Other">
                                        Other
                                    </option>

                                </select>

                            </div>


                            {{-- City --}}

                            <div class="col-md-6">

                                <label class="hw-form-label">
                                    City
                                    <span>*</span>
                                </label>

                                <input type="text"
                                       name="city"
                                       class="form-control hw-input"
                                       placeholder="Enter city"
                                       required>

                            </div>


                            {{-- Password --}}

                            <div class="col-md-6">

                                <label class="hw-form-label">
                                    Password
                                    <span>*</span>
                                </label>

                                <input type="password"
                                       name="password"
                                       class="form-control hw-input"
                                       placeholder="Create password"
                                       required>

                            </div>


                            {{-- Confirm Password --}}

                            <div class="col-md-6">

                                <label class="hw-form-label">
                                    Confirm Password
                                    <span>*</span>
                                </label>

                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control hw-input"
                                       placeholder="Confirm password"
                                       required>

                            </div>


                        </div>


                        <button type="submit"
                                class="hw-register-btn">

                            Create Account

                            <i class="bi bi-arrow-right"></i>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>