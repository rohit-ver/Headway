<div class="modal fade" id="registrationModal" tabindex="-1"
     aria-labelledby="registrationModalLabel" aria-hidden="true">
     <meta name="csrf-token" content="{{ csrf_token() }}">

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


                    <form action="{{ route('register.store')}}" method="POST" id="registrationForm">

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
                                     Email
                                    <span>*</span>
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control hw-input"
                                       placeholder="Enter your email"
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

                            {{-- Phone --}}
                            <div class="col-md-6">

                                <label class="hw-form-label">
                                    Phone Number
                                    <span>*</span>
                                </label>

                                <div class="hw-phone-verification">

                                    <div class="input-group">

                                        <select name="country_code"
                                                id="countryCode"
                                                class="form-select hw-input hw-country-code"
                                                style="max-width: 160px; flex: 0 0 auto;">

                                            <option value="+91" selected>🇮🇳 +91</option>
                                            <option value="+1">🇺🇸 +1</option>
                                            <option value="+44">🇬🇧 +44</option>
                                            <option value="+971">🇦🇪 +971</option>
                                            <option value="+61">🇦🇺 +61</option>
                                            <option value="+65">🇸🇬 +65</option>

                                        </select>

                                        <input type="tel"
                                            name="phone"
                                            id="registrationPhone"
                                            class="form-control hw-input"
                                            placeholder="Enter phone number"
                                            autocomplete="tel"
                                            inputmode="tel"
                                            maxlength="10"
                                            required>

                                    </div>

                                    <button type="button"
                                            class="hw-verify-phone-btn"
                                            id="requestPhoneOtp">

                                        Verify

                                    </button>

                                </div>

                            </div>


                            {{-- Phone OTP --}}

                            <div class="col-12"
                                 id="phoneOtpSection"
                                 hidden
                                 aria-live="polite">

                                <div class="hw-otp-panel">

                                    <div class="hw-otp-heading">

                                        <div>

                                            <label class="hw-form-label"
                                                   for="phoneOtp1">
                                                Verify phone number
                                                <span>*</span>
                                            </label>

                                            <p class="hw-otp-help"
                                               id="phoneOtpMessage">
                                                Enter the 6-digit OTP sent to your phone.
                                            </p>

                                        </div>

                                        <button type="button"
                                                class="hw-resend-otp-btn"
                                                id="resendPhoneOtp">

                                            Resend OTP

                                        </button>

                                    </div>

                                    <div class="hw-otp-fields"
                                         id="phoneOtpFields">

                                        @for ($digit = 1; $digit <= 6; $digit++)
                                            <input type="text"
                                                   id="phoneOtp{{ $digit }}"
                                                   class="hw-otp-input"
                                                   inputmode="numeric"
                                                   autocomplete="{{ $digit === 1 ? 'one-time-code' : 'off' }}"
                                                   maxlength="1"
                                                   aria-label="OTP digit {{ $digit }}"
                                                   disabled>
                                        @endfor

                                    </div>

                                    <input type="hidden"
                                           name="phone_otp"
                                           id="phoneOtp">

                                    <input type="hidden"
                                           name="phone_verified"
                                           id="phoneVerified"
                                           value="0">

                                    <div class="hw-otp-footer">

                                        <button type="button"
                                                class="hw-confirm-otp-btn"
                                                id="confirmPhoneOtp"
                                                disabled>

                                            Verify OTP

                                        </button>

                                        <span class="hw-otp-status"
                                              id="phoneOtpStatus"
                                              role="status"></span>

                                    </div>

                                </div>

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
