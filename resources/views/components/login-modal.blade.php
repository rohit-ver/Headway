{{-- LOGIN MODAL --}}

<div class="modal fade"
     id="loginModal"
     tabindex="-1"
     aria-labelledby="loginModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content hw-auth-modal">

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
                        data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body">

                <p class="hw-modal-description">
                    Login to continue exploring our products
                    and manage your business inquiries.
                </p>


                <form action="#"
                      method="POST">

                    @csrf

                    {{-- Email --}}

                    <div class="hw-form-group">

                        <label>
                            Business Email
                            <span>*</span>
                        </label>

                        <div class="hw-input-wrapper">

                            <i class="bi bi-envelope"></i>

                            <input type="email"
                                   name="email"
                                   placeholder="Enter your email"
                                   required>

                        </div>

                    </div>


                    {{-- Password --}}

                    <div class="hw-form-group">

                        <label>
                            Password
                            <span>*</span>
                        </label>

                        <div class="hw-input-wrapper">

                            <i class="bi bi-lock"></i>

                            <input type="password"
                                   name="password"
                                   id="loginPassword"
                                   placeholder="Enter password"
                                   required>

                            <button type="button"
                                    class="password-toggle"
                                    data-password-toggle="loginPassword">

                                <i class="bi bi-eye"></i>

                            </button>

                        </div>

                    </div>


                    <div class="hw-forgot">

                        <a href="#">
                            Forgot Password?
                        </a>

                    </div>


                    <button type="submit"
                            class="hw-submit-btn">

                        Login to Account

                        <i class="bi bi-arrow-right"></i>

                    </button>

                </form>


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