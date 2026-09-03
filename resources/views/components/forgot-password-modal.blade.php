{{-- FORGOT PASSWORD MODAL --}}

<div class="modal fade"
     id="forgotPasswordModal"
     tabindex="-1"
     aria-labelledby="forgotPasswordModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content hw-auth-modal">

            <div class="modal-header border-0">

                <div>

                    <span class="hw-auth-tag">
                        RESET PASSWORD
                    </span>

                    <h3 class="hw-modal-title">
                        Forgot Password?
                    </h3>

                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body">

                <p class="hw-modal-description">
                    Enter your registered email address and we'll
                    send you a link to reset your password.
                </p>

                @if (session('status'))
                    <div class="hw-modal-description" style="color: #198754;">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('password.email') }}"
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
                                   placeholder="Enter your registered email"
                                   value="{{ old('email') }}"
                                   required>

                        </div>

                        @error('email')
                            <div class="hw-modal-description" style="color: #dc3545; margin-top: 5px;">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <button type="submit"
                            class="hw-submit-btn">

                        Send Reset Link

                        <i class="bi bi-arrow-right"></i>

                    </button>

                </form>


                <div class="hw-switch-text">

                    Remembered your password?

                    <button type="button"
                            data-open-login>

                        Back to Login

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>