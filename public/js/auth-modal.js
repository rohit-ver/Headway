/* =========================================================
 * LOGIN FORM
 * AJAX + PROFESSIONAL VALIDATION
 * ========================================================= */

(function () {

    'use strict';


    /* ---------------------------------------------------------
     * LOGIN ELEMENTS
     * --------------------------------------------------------- */

    const form =
        document.getElementById('loginForm');

    if (!form) {
        return;
    }


    const emailInput =
        document.getElementById('loginEmail');

    const passwordInput =
        document.getElementById('loginPassword');

    const emailError =
        document.getElementById('loginEmailError');

    const passwordError =
        document.getElementById('loginPasswordError');

    const generalErrorBox =
        document.getElementById('loginGeneralError');

    const submitBtn =
        document.getElementById('loginSubmitBtn');

    const spinner =
        document.getElementById('loginSpinner');

    const btnText =
        submitBtn
            ? submitBtn.querySelector('.btn-text')
            : null;


    /* =========================================================
     * CLEAR LOGIN ERRORS
     * ========================================================= */

    function clearLoginErrors() {

        /* Remove Bootstrap validation state */

        form.classList.remove('was-validated');


        /* Email */

        if (emailInput) {

            emailInput.classList.remove(
                'is-invalid',
                'is-valid'
            );

            emailInput.setCustomValidity('');
        }


        /* Password */

        if (passwordInput) {

            passwordInput.classList.remove(
                'is-invalid',
                'is-valid'
            );

            passwordInput.setCustomValidity('');
        }


        /* Reset error messages */

        if (emailError) {

            emailError.textContent =
                'Please enter a valid email address.';
        }


        if (passwordError) {

            passwordError.textContent =
                'Please enter your password.';
        }


        /* General error */

        if (generalErrorBox) {

            generalErrorBox.style.display =
                'none';

            generalErrorBox.textContent =
                '';
        }
    }


    /* =========================================================
     * SHOW FIELD ERROR
     * ========================================================= */

    function showFieldError(
        input,
        errorElement,
        message
    ) {

        if (!input) {
            return;
        }


        input.classList.remove('is-valid');

        input.classList.add('is-invalid');


        if (errorElement) {

            errorElement.textContent =
                message;
        }
    }


    /* =========================================================
     * SHOW GENERAL ERROR
     * ========================================================= */

    function showGeneralError(message) {

        if (!generalErrorBox) {
            return;
        }


        generalErrorBox.textContent =
            message ||
            'Unable to login. Please try again.';


        generalErrorBox.style.display =
            'block';
    }


    /* =========================================================
     * CLIENT SIDE LOGIN VALIDATION
     * ========================================================= */

    function validateLoginForm() {

        let valid = true;


        const email =
            emailInput
                ? emailInput.value.trim()
                : '';


        const password =
            passwordInput
                ? passwordInput.value
                : '';


        /* -----------------------------------------------------
         * EMAIL VALIDATION
         * ----------------------------------------------------- */

        if (!email) {

            showFieldError(
                emailInput,
                emailError,
                'Business email is required.'
            );

            valid = false;

        }

        else if (!emailInput.checkValidity()) {

            showFieldError(
                emailInput,
                emailError,
                'Please enter a valid email address.'
            );

            valid = false;

        }

        else {

            emailInput.classList.add(
                'is-valid'
            );
        }


        /* -----------------------------------------------------
         * PASSWORD VALIDATION
         * ----------------------------------------------------- */

        if (!password) {

            showFieldError(
                passwordInput,
                passwordError,
                'Password is required.'
            );

            valid = false;

        }

        else {

            passwordInput.classList.add(
                'is-valid'
            );
        }


        /* -----------------------------------------------------
         * BOOTSTRAP VALIDATION STATE
         * ----------------------------------------------------- */

        if (!valid) {

            form.classList.add(
                'was-validated'
            );
        }


        return valid;
    }


    /* =========================================================
     * EMAIL LIVE VALIDATION
     * ========================================================= */

    if (emailInput) {

        emailInput.addEventListener(
            'input',
            function () {

                const email =
                    emailInput.value.trim();


                emailInput.classList.remove(
                    'is-invalid',
                    'is-valid'
                );


                /* Empty */

                if (!email) {
                    return;
                }


                /* Valid */

                if (emailInput.checkValidity()) {

                    emailInput.classList.add(
                        'is-valid'
                    );

                }

                /* Invalid */

                else {

                    emailInput.classList.add(
                        'is-invalid'
                    );

                    if (emailError) {

                        emailError.textContent =
                            'Please enter a valid email address.';
                    }
                }
            }
        );
    }


    /* =========================================================
     * PASSWORD LIVE VALIDATION
     * ========================================================= */

    if (passwordInput) {

        passwordInput.addEventListener(
            'input',
            function () {

                passwordInput.classList.remove(
                    'is-invalid',
                    'is-valid'
                );


                if (!passwordInput.value) {
                    return;
                }


                passwordInput.classList.add(
                    'is-valid'
                );
            }
        );
    }


    /* =========================================================
     * LOGIN SUBMIT
     * ========================================================= */

    form.addEventListener(
        'submit',
        function (e) {

            /*
             * IMPORTANT:
             *
             * Prevent normal form submission.
             * Page reload nahi hoga.
             * Modal close nahi hoga.
             */

            e.preventDefault();


            /* -------------------------------------------------
             * CLEAR OLD ERRORS
             * ------------------------------------------------- */

            clearLoginErrors();


            /* -------------------------------------------------
             * CLIENT VALIDATION
             * ------------------------------------------------- */

            if (!validateLoginForm()) {

                const firstInvalid =
                    form.querySelector(
                        '.is-invalid'
                    );


                if (firstInvalid) {

                    firstInvalid.focus();
                }


                return;
            }


            /* -------------------------------------------------
             * DISABLE BUTTON
             * ------------------------------------------------- */

            if (submitBtn) {

                submitBtn.disabled =
                    true;
            }


            if (spinner) {

                spinner.classList.remove(
                    'd-none'
                );
            }


            if (btnText) {

                btnText.textContent =
                    'Signing in...';
            }


            /* -------------------------------------------------
             * LOGIN REQUEST
             * ------------------------------------------------- */

            fetch(
                form.action,
                {
                    method: 'POST',

                    headers: {

                        'X-CSRF-TOKEN':
                            form.querySelector(
                                'input[name="_token"]'
                            ).value,

                        'Accept':
                            'application/json',

                        'X-Requested-With':
                            'XMLHttpRequest'
                    },

                    body:
                        new FormData(form)
                }
            )


            /* -------------------------------------------------
             * CONVERT RESPONSE
             * ------------------------------------------------- */

            .then(
                function (response) {

                    return response
                        .json()
                        .catch(
                            function () {
                                return {};
                            }
                        )
                        .then(
                            function (data) {

                                return {
                                    status:
                                        response.status,

                                    ok:
                                        response.ok,

                                    data:
                                        data
                                };
                            }
                        );
                }
            )


            /* -------------------------------------------------
             * HANDLE RESPONSE
             * ------------------------------------------------- */

            .then(
                function (result) {

                    const status =
                        result.status;

                    const data =
                        result.data || {};


                    /* =================================================
                     * LOGIN SUCCESS
                     * ================================================= */

                    if (
                        status >= 200 &&
                        status < 300 &&
                        data.success
                    ) {

                        /*
                         * Successful login par hi
                         * redirect hoga.
                         */

                        window.location.href =
                            data.redirect ||
                            '/products';

                        return;
                    }


                    /* =================================================
                     * VALIDATION ERRORS - 422
                     * ================================================= */

                    if (
                        status === 422 &&
                        data.errors
                    ) {


                        /* EMAIL ERROR */

                        if (
                            data.errors.email &&
                            data.errors.email.length
                        ) {

                            showFieldError(
                                emailInput,
                                emailError,
                                data.errors.email[0]
                            );
                        }


                        /* PASSWORD ERROR */

                        if (
                            data.errors.password &&
                            data.errors.password.length
                        ) {

                            showFieldError(
                                passwordInput,
                                passwordError,
                                data.errors.password[0]
                            );
                        }


                        form.classList.add(
                            'was-validated'
                        );


                        /* Focus first error */

                        const firstInvalid =
                            form.querySelector(
                                '.is-invalid'
                            );


                        if (firstInvalid) {

                            firstInvalid.focus();
                        }


                        return;
                    }


                    /* =================================================
                     * WRONG CREDENTIALS
                     * ================================================= */

                    if (
                        status === 401 ||
                        status === 403
                    ) {


                        /*
                         * Agar backend field-wise error
                         * bhej raha hai.
                         */

                        if (data.errors) {


                            /* EMAIL */

                            if (
                                data.errors.email &&
                                data.errors.email.length
                            ) {

                                showFieldError(
                                    emailInput,
                                    emailError,
                                    data.errors.email[0]
                                );
                            }


                            /* PASSWORD */

                            if (
                                data.errors.password &&
                                data.errors.password.length
                            ) {

                                showFieldError(
                                    passwordInput,
                                    passwordError,
                                    data.errors.password[0]
                                );
                            }

                        }

                        else {

                            /*
                             * Backend ne general
                             * credentials error diya.
                             */

                            showGeneralError(
                                data.message ||
                                'The email or password you entered is incorrect.'
                            );
                        }


                        return;
                    }


                    /* =================================================
                     * TOO MANY LOGIN ATTEMPTS
                     * ================================================= */

                    if (status === 429) {

                        showGeneralError(
                            data.message ||
                            'Too many login attempts. Please wait a moment and try again.'
                        );

                        return;
                    }


                    /* =================================================
                     * OTHER SERVER ERRORS
                     * ================================================= */

                    showGeneralError(
                        data.message ||
                        'Unable to login right now. Please try again.'
                    );
                }
            )


            /* -------------------------------------------------
             * NETWORK ERROR
             * ------------------------------------------------- */

            .catch(
                function (error) {

                    console.error(
                        'Login error:',
                        error
                    );


                    showGeneralError(
                        'Something went wrong. Please check your connection and try again.'
                    );
                }
            )


            /* -------------------------------------------------
             * RESTORE BUTTON
             * ------------------------------------------------- */

            .finally(
                function () {

                    if (submitBtn) {

                        submitBtn.disabled =
                            false;
                    }


                    if (spinner) {

                        spinner.classList.add(
                            'd-none'
                        );
                    }


                    if (btnText) {

                        btnText.textContent =
                            'Login to Account';
                    }
                }
            );

        }
    );

})();

document.addEventListener("DOMContentLoaded", function () {

    /* =========================================================
     * AUTH MODAL INSTANCES
     * ========================================================= */

    const authChoiceModal = document.getElementById("authChoiceModal");
    const loginModal = document.getElementById("loginModal");
    const registrationModal = document.getElementById("registrationModal");

    let authChoiceInstance = null;
    let loginInstance = null;
    let registrationInstance = null;

    if (authChoiceModal) {
        authChoiceInstance =
            bootstrap.Modal.getOrCreateInstance(authChoiceModal);
    }

    if (loginModal) {
        loginInstance =
            bootstrap.Modal.getOrCreateInstance(loginModal);
    }

    if (registrationModal) {
        registrationInstance =
            bootstrap.Modal.getOrCreateInstance(registrationModal);
    }


    /* =========================================================
     * OPEN LOGIN
     * ========================================================= */

    document.querySelectorAll("[data-open-login]")
        .forEach(function (button) {

            button.addEventListener("click", function () {

                if (authChoiceInstance) {
                    authChoiceInstance.hide();
                }

                setTimeout(function () {

                    if (loginInstance) {
                        loginInstance.show();
                    }

                }, 300);
            });

        });


    /* =========================================================
     * OPEN REGISTRATION
     * ========================================================= */

    document.querySelectorAll("[data-open-register]")
        .forEach(function (button) {

            button.addEventListener("click", function () {

                if (authChoiceInstance) {
                    authChoiceInstance.hide();
                }

                if (loginInstance) {
                    loginInstance.hide();
                }

                setTimeout(function () {

                    if (registrationInstance) {
                        registrationInstance.show();
                    }

                }, 300);
            });

        });


    /* =========================================================
     * DOMESTIC / INTERNATIONAL CUSTOMER
     * ========================================================= */

    const typeCards =
        document.querySelectorAll("[data-customer-type]");

    const customerTypeInput =
        document.getElementById("customerTypeInput");

    const domesticFields =
        document.querySelectorAll(".domestic-field");

    const internationalFields =
        document.querySelectorAll(".international-field");

    const country =
        document.getElementById("country");


    typeCards.forEach(function (card) {

        card.addEventListener("click", function () {

            const selectedType =
                this.getAttribute("data-customer-type");


            /* Remove active class from all cards */

            typeCards.forEach(function (item) {
                item.classList.remove("active");
            });


            /* Add active class to selected card */

            this.classList.add("active");


            /* Set hidden customer type input */

            if (customerTypeInput) {
                customerTypeInput.value = selectedType;
            }


            /* =====================================================
             * DOMESTIC CUSTOMER
             * ===================================================== */

            if (selectedType === "domestic") {

                domesticFields.forEach(function (field) {
                    field.classList.remove("d-none");
                });

                internationalFields.forEach(function (field) {
                    field.classList.add("d-none");
                });

                if (country) {
                    country.removeAttribute("required");
                    country.value = "";
                }
            }


            /* =====================================================
             * INTERNATIONAL CUSTOMER
             * ===================================================== */

            if (selectedType === "international") {

                domesticFields.forEach(function (field) {
                    field.classList.add("d-none");
                });

                internationalFields.forEach(function (field) {
                    field.classList.remove("d-none");
                });

                if (country) {
                    country.setAttribute("required", "required");
                }
            }

        });

    });


    /* =========================================================
     * LOGIN EMAIL — LIVE GREEN BORDER ON VALID FORMAT
     * =========================================================
     *
     * Pure visual feedback as the user types. Does not replace
     * or duplicate the server-side validation in LoginController —
     * wrong credentials / empty fields still show red via the
     * @error() blocks after the real submit.
     * ========================================================= */

    const loginEmailInput =
        document.querySelector(
            '#loginModal input[name="email"]'
        );

    if (loginEmailInput) {

        loginEmailInput.addEventListener(
            "input",
            function () {

                const value =
                    loginEmailInput.value.trim();


                /* Clear any server-rendered error state
                 * once the user starts correcting it */

                loginEmailInput.classList.remove(
                    "is-invalid"
                );


                if (value === "") {

                    loginEmailInput.classList.remove(
                        "is-valid"
                    );

                    return;

                }


                const isValidFormat =
                    loginEmailInput.checkValidity();


                loginEmailInput.classList.toggle(
                    "is-valid",
                    isValidFormat
                );

            }
        );

    }


    /* =========================================================
     * PASSWORD SHOW / HIDE
     * ========================================================= */

    document.querySelectorAll("[data-password-toggle]")
        .forEach(function (button) {

            button.addEventListener("click", function () {

                const inputId =
                    this.getAttribute("data-password-toggle");

                const input =
                    document.getElementById(inputId);

                const icon =
                    this.querySelector("i");


                if (!input) {
                    return;
                }


                if (input.type === "password") {

                    input.type = "text";

                    if (icon) {
                        icon.classList.remove("bi-eye");
                        icon.classList.add("bi-eye-slash");
                    }

                } else {

                    input.type = "password";

                    if (icon) {
                        icon.classList.remove("bi-eye-slash");
                        icon.classList.add("bi-eye");
                    }
                }

            });

        });


    /* =========================================================
     * RESET REGISTRATION MODAL
     * ========================================================= */

    if (registrationModal) {

        registrationModal.addEventListener(
            "hidden.bs.modal",
            function () {

                /* Reset customer type cards */

                typeCards.forEach(function (card) {
                    card.classList.remove("active");
                });


                /* Make Domestic selected by default */

                const domesticCard =
                    document.querySelector(
                        '[data-customer-type="domestic"]'
                    );

                if (domesticCard) {
                    domesticCard.classList.add("active");
                }


                /* Reset hidden customer type */

                if (customerTypeInput) {
                    customerTypeInput.value = "domestic";
                }


                /* Show domestic fields */

                domesticFields.forEach(function (field) {
                    field.classList.remove("d-none");
                });


                /* Hide international fields */

                internationalFields.forEach(function (field) {
                    field.classList.add("d-none");
                });


                /* Reset country */

                if (country) {
                    country.removeAttribute("required");
                    country.value = "";
                }

            }
        );

    }


    /* =========================================================
     * CUSTOMER TYPE - TWO STEP REGISTRATION
     * ========================================================= */

    window.selectCustomerType = function (type) {

        const choiceStep =
            document.getElementById("customerTypeStep");

        const formStep =
            document.getElementById("registrationFormStep");

        const customerType =
            document.getElementById("customerType");

        const selectedType =
            document.getElementById("selectedCustomerType");

        const countryField =
            document.getElementById("countryField");

        const countryInput =
            document.getElementById("country");


        if (!choiceStep || !formStep || !customerType) {
            return;
        }


        /* Set customer type */

        customerType.value = type;


        /* Hide customer type selection */

        choiceStep.style.display = "none";


        /* Show registration form */

        formStep.style.display = "block";


        /* =====================================================
         * DOMESTIC
         * ===================================================== */

        if (type === "domestic") {

            if (selectedType) {
                selectedType.textContent = "DOMESTIC CUSTOMER";
            }

            if (countryField) {
                countryField.style.display = "none";
            }

            if (countryInput) {
                countryInput.required = false;
                countryInput.value = "";
            }

        }


        /* =====================================================
         * INTERNATIONAL
         * ===================================================== */

        else {

            if (selectedType) {
                selectedType.textContent =
                    "INTERNATIONAL CUSTOMER";
            }

            if (countryField) {
                countryField.style.display = "block";
            }

            if (countryInput) {
                countryInput.required = true;
            }

        }

    };


    /* =========================================================
     * BACK TO CUSTOMER TYPE
     * ========================================================= */

    window.backToCustomerType = function () {

        const formStep =
            document.getElementById("registrationFormStep");

        const choiceStep =
            document.getElementById("customerTypeStep");


        if (formStep) {
            formStep.style.display = "none";
        }

        if (choiceStep) {
            choiceStep.style.display = "block";
        }

    };


    /* =========================================================
     * AUTH MODAL BODY CLASS
     * ========================================================= */

    const authModalIds = [
        "authChoiceModal",
        "loginModal",
        "registrationModal"
    ];


    authModalIds.forEach(function (modalId) {

        const modal =
            document.getElementById(modalId);

        if (!modal) {
            return;
        }


        /* Modal opening */

        modal.addEventListener(
            "show.bs.modal",
            function () {

                document.body.classList.add(
                    "auth-modal-open"
                );

            }
        );


        /* Modal completely closed */

        modal.addEventListener(
            "hidden.bs.modal",
            function () {

                document.body.classList.remove(
                    "auth-modal-open"
                );

            }
        );

    });


    /* =========================================================
     * OTP REGISTRATION
     * ========================================================= */

    const registrationForm =
        document.getElementById("registrationForm");

    const phoneInput =
        document.getElementById("registrationPhone");

    const countryCodeSelect =
        document.getElementById("countryCode");

    const requestOtpButton =
        document.getElementById("requestPhoneOtp");

    const resendOtpButton =
        document.getElementById("resendPhoneOtp");

    const otpSection =
        document.getElementById("phoneOtpSection");

    const otpInputs =
        document.querySelectorAll(
            "#phoneOtpFields .hw-otp-input"
        );

    const otpValueInput =
        document.getElementById("phoneOtp");

    const confirmOtpButton =
        document.getElementById("confirmPhoneOtp");

    const otpMessage =
        document.getElementById("phoneOtpMessage");

    const otpStatus =
        document.getElementById("phoneOtpStatus");

    const phoneVerifiedInput =
        document.getElementById("phoneVerified");


    /*
     * If registration form / OTP fields don't exist,
     * stop OTP initialization.
     */

    if (
        !registrationForm ||
        !phoneInput ||
        !requestOtpButton ||
        !otpSection
    ) {
        return;
    }


    /* =========================================================
     * GET PHONE NUMBER
     * ========================================================= */

    function getPhoneNumber() {

        return phoneInput.value.replace(/\D/g, "");

    }


    /* =========================================================
     * GET COUNTRY CODE
     * ========================================================= */

    function getCountryCode() {

        return countryCodeSelect
            ? countryCodeSelect.value
            : "+91";

    }


    /* =========================================================
     * CLEAR OTP
     * ========================================================= */

    function clearOtp() {

        otpInputs.forEach(function (input) {
            input.value = "";
        });


        if (otpValueInput) {
            otpValueInput.value = "";
        }

    }


    /* =========================================================
     * SET PHONE VERIFICATION STATE
     * ========================================================= */

    function setVerificationState(
        isVerified,
        message
    ) {

        if (phoneVerifiedInput) {

            phoneVerifiedInput.value =
                isVerified ? "1" : "0";

        }


        if (otpStatus) {

            otpStatus.textContent =
                message || "";

            otpStatus.classList.toggle(
                "is-verified",
                isVerified
            );

        }


        requestOtpButton.textContent =
            isVerified
                ? "Verified"
                : (!otpSection.hidden
                    ? "Resend"
                    : "Verify");


        requestOtpButton.classList.toggle(
            "is-verified",
            isVerified
        );

    }


    /* =========================================================
     * UPDATE OTP VALUE
     * ========================================================= */

    function updateOtpValue() {

        const otp =
            Array.from(otpInputs)
                .map(function (input) {
                    return input.value;
                })
                .join("");


        if (otpValueInput) {
            otpValueInput.value = otp;
        }


        if (confirmOtpButton) {

            confirmOtpButton.disabled =
                otp.length !== otpInputs.length;

        }

    }


    /* =========================================================
     * SEND / RESEND OTP
     * ========================================================= */

    function showOtpFields() {

        const phoneNumber =
            getPhoneNumber();


        /* Validate phone number */

        if (
            phoneNumber.length < 7 ||
            phoneNumber.length > 15
        ) {

            phoneInput.setCustomValidity(
                "Enter a valid phone number before requesting an OTP."
            );

            phoneInput.reportValidity();
            phoneInput.focus();

            return;
        }


        phoneInput.setCustomValidity("");


        /* Check routes */

        if (
            !window.ROUTES ||
            !window.ROUTES.otpSend
        ) {

            console.error(
                "window.ROUTES.otpSend is not defined. " +
                "Add the routes script in the blade file."
            );

            return;
        }


        /* Disable button */

        requestOtpButton.disabled = true;


        const originalLabel =
            requestOtpButton.textContent;


        requestOtpButton.textContent =
            "Sending...";


        /* =====================================================
         * SEND OTP REQUEST
         * ===================================================== */

        fetch(
            window.ROUTES.otpSend,
            {
                method: "POST",

                headers: {
                    "Content-Type":
                        "application/json",

                    "X-CSRF-TOKEN":
                        window.CSRF_TOKEN,

                    "Accept":
                        "application/json"
                },

                body: JSON.stringify({

                    country_code:
                        getCountryCode(),

                    phone:
                        phoneNumber

                })
            }
        )

        .then(function (res) {

            return res.json()
                .then(function (data) {

                    return {
                        status: res.status,
                        data: data
                    };

                });

        })

        .then(function (result) {

            requestOtpButton.disabled = false;


            const data =
                result.data;


            /* =================================================
             * OTP SEND FAILED
             * ================================================= */

            if (!data.success) {

                requestOtpButton.textContent =
                    originalLabel;


                if (otpStatus) {

                    otpStatus.textContent =
                        data.message ||
                        "Failed to send OTP.";

                }

                return;
            }


            /* =================================================
             * OTP SEND SUCCESS
             * ================================================= */

            otpSection.hidden = false;


            if (otpMessage) {

                otpMessage.textContent =
                    "Enter the 6-digit OTP sent to " +
                    phoneInput.value.trim() +
                    ".";

            }


            requestOtpButton.textContent =
                "Resend";


            requestOtpButton.classList.remove(
                "is-verified"
            );


            otpInputs.forEach(function (input) {

                input.disabled = false;

            });


            clearOtp();


            setVerificationState(
                false,
                data.message || "OTP sent."
            );


            if (otpInputs[0]) {
                otpInputs[0].focus();
            }

        })

        .catch(function (error) {

            console.error(
                "OTP send error:",
                error
            );


            requestOtpButton.disabled =
                false;


            requestOtpButton.textContent =
                originalLabel;


            if (otpStatus) {

                otpStatus.textContent =
                    "Something went wrong. Please try again.";

            }

        });

    }


    /* =========================================================
     * OTP SEND BUTTON
     * ========================================================= */

    requestOtpButton.addEventListener(
        "click",
        showOtpFields
    );


    /* =========================================================
     * OTP RESEND BUTTON
     * ========================================================= */

    if (resendOtpButton) {

        resendOtpButton.addEventListener(
            "click",
            showOtpFields
        );

    }


    /* =========================================================
     * PHONE INPUT CHANGE
     * ========================================================= */

    phoneInput.addEventListener(
        "input",
        function () {

            setVerificationState(
                false,
                ""
            );


            if (!otpSection.hidden) {

                clearOtp();


                if (confirmOtpButton) {

                    confirmOtpButton.disabled =
                        true;

                }

            }

        }
    );


    /* =========================================================
     * OTP INPUT HANDLING
     * ========================================================= */

    otpInputs.forEach(
        function (input, index) {


            /* -------------------------------------------------
             * OTP INPUT
             * ------------------------------------------------- */

            input.addEventListener(
                "input",
                function () {

                    const digit =
                        input.value
                            .replace(/\D/g, "")
                            .slice(-1);


                    input.value =
                        digit;


                    /* Move to next input */

                    if (
                        digit &&
                        otpInputs[index + 1]
                    ) {

                        otpInputs[
                            index + 1
                        ].focus();

                    }


                    setVerificationState(
                        false,
                        ""
                    );


                    updateOtpValue();

                }
            );


            /* -------------------------------------------------
             * BACKSPACE
             * ------------------------------------------------- */

            input.addEventListener(
                "keydown",
                function (event) {

                    if (
                        event.key === "Backspace" &&
                        !input.value &&
                        otpInputs[index - 1]
                    ) {

                        otpInputs[
                            index - 1
                        ].focus();

                    }

                }
            );


            /* -------------------------------------------------
             * PASTE OTP
             * ------------------------------------------------- */

            input.addEventListener(
                "paste",
                function (event) {

                    const clipboard =
                        event.clipboardData ||
                        window.clipboardData;


                    const pastedOtp =
                        clipboard
                            .getData("text")
                            .replace(/\D/g, "")
                            .slice(
                                0,
                                otpInputs.length
                            );


                    if (!pastedOtp) {
                        return;
                    }


                    event.preventDefault();


                    pastedOtp
                        .split("")
                        .forEach(
                            function (
                                digit,
                                digitIndex
                            ) {

                                if (
                                    otpInputs[
                                        index +
                                        digitIndex
                                    ]
                                ) {

                                    otpInputs[
                                        index +
                                        digitIndex
                                    ].value =
                                        digit;

                                }

                            }
                        );


                    const nextIndex =
                        Math.min(
                            index +
                            pastedOtp.length,
                            otpInputs.length - 1
                        );


                    if (otpInputs[nextIndex]) {

                        otpInputs[
                            nextIndex
                        ].focus();

                    }


                    setVerificationState(
                        false,
                        ""
                    );


                    updateOtpValue();

                }
            );

        }
    );


    /* =========================================================
     * VERIFY OTP
     * ========================================================= */

    if (confirmOtpButton) {

        confirmOtpButton.addEventListener(
            "click",
            function () {


                /* Check OTP length */

                if (
                    !otpValueInput ||
                    otpValueInput.value.length !==
                        otpInputs.length
                ) {

                    return;

                }


                /* Check verify route */

                if (
                    !window.ROUTES ||
                    !window.ROUTES.otpVerify
                ) {

                    console.error(
                        "window.ROUTES.otpVerify is not defined. " +
                        "Add the routes script in the blade file."
                    );

                    return;
                }


                confirmOtpButton.disabled =
                    true;


                const originalLabel =
                    confirmOtpButton.textContent;


                confirmOtpButton.textContent =
                    "Verifying...";


                /* =================================================
                 * VERIFY OTP REQUEST
                 * ================================================= */

                fetch(
                    window.ROUTES.otpVerify,
                    {
                        method: "POST",

                        headers: {

                            "Content-Type":
                                "application/json",

                            "X-CSRF-TOKEN":
                                window.CSRF_TOKEN,

                            "Accept":
                                "application/json"

                        },

                        body: JSON.stringify({

                            country_code:
                                getCountryCode(),

                            phone:
                                getPhoneNumber(),

                            otp:
                                otpValueInput.value

                        })

                    }
                )

                .then(function (res) {

                    return res.json()
                        .then(function (data) {

                            return {
                                status: res.status,
                                data: data
                            };

                        });

                })

                .then(function (result) {

                    const data =
                        result.data;


                    confirmOtpButton.textContent =
                        originalLabel;


                    /* =========================================
                     * OTP VERIFIED
                     * ========================================= */

                    if (data.success) {

                        setVerificationState(
                            true,
                            data.message ||
                                "Phone number verified."
                        );


                        otpInputs.forEach(
                            function (input) {

                                input.disabled =
                                    true;

                            }
                        );


                        confirmOtpButton.disabled =
                            true;


                        /* Hide OTP section */

                        otpSection.hidden =
                            true;


                        return;
                    }


                    /* =========================================
                     * INVALID OTP
                     * ========================================= */

                    setVerificationState(
                        false,
                        data.message ||
                            "Invalid OTP."
                    );


                    confirmOtpButton.disabled =
                        false;

                })

                .catch(function (error) {

                    console.error(
                        "OTP verification error:",
                        error
                    );


                    confirmOtpButton.textContent =
                        originalLabel;


                    confirmOtpButton.disabled =
                        false;


                    if (otpStatus) {

                        otpStatus.textContent =
                            "Something went wrong. Please try again.";

                    }

                });

            }
        );

    }


    /* =========================================================
     * REGISTRATION FORM SUBMIT
     * ========================================================= */

    registrationForm.addEventListener(
        "submit",
        function (event) {

            /*
             * Registration always happens through AJAX.
             */

            event.preventDefault();


            /* =================================================
             * PHONE VERIFICATION CHECK
             * ================================================= */

            if (
                !phoneVerifiedInput ||
                phoneVerifiedInput.value !== "1"
            ) {

                showOtpFields();


                if (otpStatus) {

                    otpStatus.textContent =
                        "Verify your phone number before creating your account.";

                }


                return;
            }


            /* =================================================
             * SUBMIT BUTTON
             * ================================================= */

            const submitButton =
                registrationForm.querySelector(
                    ".hw-register-btn"
                );


            const originalButtonText =
                submitButton
                    ? submitButton.innerHTML
                    : "";


            if (submitButton) {

                submitButton.disabled =
                    true;

                submitButton.textContent =
                    "Creating account...";

            }


            /* =================================================
             * FORM DATA
             * ================================================= */

            const formData =
                new FormData(
                    registrationForm
                );


            const payload = {};


            formData.forEach(
                function (value, key) {

                    payload[key] =
                        value;

                }
            );


            /* =================================================
             * REGISTER REQUEST
             * ================================================= */

            fetch(
                registrationForm.action,
                {
                    method: "POST",

                    headers: {

                        "Content-Type":
                            "application/json",

                        "X-CSRF-TOKEN":
                            window.CSRF_TOKEN,

                        "Accept":
                            "application/json"

                    },

                    body:
                        JSON.stringify(payload)

                }
            )

            .then(function (res) {

                return res.json()
                    .then(function (data) {

                        return {
                            status: res.status,
                            data: data
                        };

                    });

            })

            .then(function (result) {

                const data =
                    result.data;


                /* =============================================
                 * REGISTRATION SUCCESS
                 * ============================================= */

                if (data.success) {

                    window.location.href =
                        "/products";

                    return;
                }


                /* =============================================
                 * REGISTRATION FAILED
                 * ============================================= */

                if (submitButton) {

                    submitButton.disabled =
                        false;

                    submitButton.innerHTML =
                        originalButtonText;

                }


                alert(
                    data.message ||
                    "Registration failed. Please try again."
                );

            })

            .catch(function (error) {

                console.error(
                    "Registration error:",
                    error
                );


                if (submitButton) {

                    submitButton.disabled =
                        false;

                    submitButton.innerHTML =
                        originalButtonText;

                }


                alert(
                    "Something went wrong. Please try again."
                );

            });

        }
    );


    /* =========================================================
     * REGISTRATION MODAL OPEN / CLOSE
     * ========================================================= */

    if (registrationModal) {

        registrationModal.addEventListener(
            "shown.bs.modal",
            function () {

                document.body.classList.add(
                    "auth-modal-open"
                );

            }
        );


        registrationModal.addEventListener(
            "hidden.bs.modal",
            function () {

                document.body.classList.remove(
                    "auth-modal-open"
                );

            }
        );

    }

});


document.getElementById('openForgotPassword')?.addEventListener('click', function (e) {
    e.preventDefault();

    const loginModalEl = document.getElementById('loginModal');
    const loginModal = bootstrap.Modal.getInstance(loginModalEl);

    loginModalEl.addEventListener('hidden.bs.modal', function handler() {
        const forgotModal = new bootstrap.Modal(document.getElementById('forgotPasswordModal'));
        forgotModal.show();

        loginModalEl.removeEventListener('hidden.bs.modal', handler);
    });

    loginModal.hide();
});