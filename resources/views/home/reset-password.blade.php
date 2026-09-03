@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center" style="min-height: 80vh; align-items: center;">

        <div class="col-md-6 col-lg-5">

            <div class="hw-auth-modal" style="border-radius: 12px; overflow: hidden;">

                <div class="modal-header border-0">

                    <div>

                        <span class="hw-auth-tag">
                            RESET PASSWORD
                        </span>

                        <h3 class="hw-modal-title">
                            Set New Password
                        </h3>

                    </div>

                </div>


                <div class="modal-body">

                    <p class="hw-modal-description">
                        Please enter your new password below.
                    </p>

                    <form action="{{ route('password.update') }}"
                          method="POST">

                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

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
                                       value="{{ $email ?? old('email') }}"
                                       required>

                            </div>

                            @error('email')
                                <div class="hw-modal-description" style="color: #dc3545; margin-top: 5px;">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- New Password --}}

                        <div class="hw-form-group">

                            <label>
                                New Password
                                <span>*</span>
                            </label>

                            <div class="hw-input-wrapper">

                                <i class="bi bi-lock"></i>

                                <input type="password"
                                       name="password"
                                       id="newPassword"
                                       placeholder="Enter new password"
                                       required>

                                <button type="button"
                                        class="password-toggle"
                                        data-password-toggle="newPassword">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </div>

                            @error('password')
                                <div class="hw-modal-description" style="color: #dc3545; margin-top: 5px;">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Confirm Password --}}

                        <div class="hw-form-group">

                            <label>
                                Confirm Password
                                <span>*</span>
                            </label>

                            <div class="hw-input-wrapper">

                                <i class="bi bi-lock"></i>

                                <input type="password"
                                       name="password_confirmation"
                                       id="confirmPassword"
                                       placeholder="Confirm new password"
                                       required>

                                <button type="button"
                                        class="password-toggle"
                                        data-password-toggle="confirmPassword">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </div>

                        </div>


                        <button type="submit"
                                class="hw-submit-btn">

                            Reset Password

                            <i class="bi bi-arrow-right"></i>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection