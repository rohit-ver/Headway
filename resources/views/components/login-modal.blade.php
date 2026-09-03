{{-- LOGIN MODAL --}}

<div class="modal fade"
     id="loginModal"
     tabindex="-1"
     aria-labelledby="loginModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content hw-auth-modal">

            {{-- HEADER --}}
            <div class="modal-header border-0">

                <div>
                    <span class="hw-auth-tag">
                        CUSTOMER LOGIN
                    </span>

                    <h3 class="hw-modal-title">
                        Welcome Back
                    </h3>
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>
            </div>


            {{-- BODY --}}
            <div class="modal-body">

                <p class="hw-modal-description">
                    Login to continue exploring our products
                    and manage your business inquiries.
                </p>


                {{-- GENERAL ERROR --}}
                <div id="loginGeneralError"
                     class="alert alert-danger py-2 px-3 small"
                     role="alert"
                     aria-live="polite"
                     style="display: none;">
                </div>


                {{-- LOGIN FORM --}}
                <form action="{{ route('login') }}"
                      method="POST"
                      id="loginForm"
                      class="needs-validation"
                      novalidate>

                    @csrf


                    {{-- EMAIL --}}
                    <div class="hw-form-group">

                        <label class="contact-label" for="loginEmail">
                            Business Email
                            <span>*</span>
                        </label>

                        <div class="hw-input-wrapper">

                            <i class="bi bi-envelope"></i>

                            <input type="email"
                                   name="email"
                                   id="loginEmail"
                                   class="form-control"
                                   placeholder="Enter your email"
                                   autocomplete="email"
                                   maxlength="150"
                                   required
                                   aria-describedby="loginEmailError">

                            <div class="valid-feedback">
                                Looks good!
                            </div>

                            <div class="invalid-feedback"
                                 id="loginEmailError"
                                 aria-live="polite">
                                Please enter a valid email address.
                            </div>

                        </div>
                    </div>


                    {{-- PASSWORD --}}
                    <div class="hw-form-group">

                        <label class="contact-label" for="loginPassword">
                            Password
                            <span>*</span>
                        </label>

                        <div class="hw-input-wrapper">

                            <i class="bi bi-lock"></i>

                            <input type="password"
                                   name="password"
                                   id="loginPassword"
                                   class="form-control"
                                   placeholder="Enter password"
                                   autocomplete="current-password"
                                   required
                                   aria-describedby="loginPasswordError">

                            {{-- SHOW / HIDE PASSWORD --}}
                            <button type="button"
                                    class="password-toggle"
                                    data-password-toggle="loginPassword"
                                    aria-label="Show password">

                                <i class="bi bi-eye"></i>

                            </button>

                            <div class="valid-feedback">
                                Looks good!
                            </div>

                            <div class="invalid-feedback"
                                 id="loginPasswordError"
                                 aria-live="polite">
                                Please enter your password.
                            </div>

                        </div>
                    </div>


                    {{-- FORGOT PASSWORD --}}
                    <div class="hw-forgot">

                        <a href="#"
                           id="openForgotPassword">
                            Forgot Password?
                        </a>

                    </div>


                    {{-- LOGIN BUTTON --}}
                    <button type="submit"
                            class="hw-submit-btn hw-login-btn"
                            id="loginSubmitBtn">

                        <span class="btn-text">
                            Login to Account
                        </span>

                        <span class="spinner-border spinner-border-sm ms-2 d-none"
                              id="loginSpinner"
                              aria-hidden="true">
                        </span>

                        <i class="bi bi-arrow-right"></i>

                    </button>

                </form>


                {{-- REGISTER --}}
                <div class="hw-switch-text">

                    Don't have an account?

                    <button type="button"
                            data-open-register>
                        Register Now
                    </button>

                </div>

            </div>
        </div>
    </div>
</div>