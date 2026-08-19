document.addEventListener("DOMContentLoaded", function () {

    const authChoiceModal =
        document.getElementById("authChoiceModal");

    const loginModal =
        document.getElementById("loginModal");

    const registrationModal =
        document.getElementById("registrationModal");


    /*
    |--------------------------------------------------------------------------
    | Bootstrap Modal Instances
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | OPEN LOGIN
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | OPEN REGISTRATION
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | DOMESTIC / INTERNATIONAL
    |--------------------------------------------------------------------------
    */

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


            /*
            | Remove active from all cards
            */

            typeCards.forEach(function (item) {

                item.classList.remove("active");

            });


            /*
            | Add active to selected
            */

            this.classList.add("active");


            /*
            | Set hidden input
            */

            if (customerTypeInput) {

                customerTypeInput.value =
                    selectedType;

            }


            /*
            |--------------------------------------------------------------------------
            | DOMESTIC
            |--------------------------------------------------------------------------
            */

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


            /*
            |--------------------------------------------------------------------------
            | INTERNATIONAL
            |--------------------------------------------------------------------------
            */

            if (selectedType === "international") {

                domesticFields.forEach(function (field) {

                    field.classList.add("d-none");

                });


                internationalFields.forEach(function (field) {

                    field.classList.remove("d-none");

                });


                if (country) {

                    country.setAttribute(
                        "required",
                        "required"
                    );

                }

            }

        });

    });


    /*
    |--------------------------------------------------------------------------
    | PASSWORD SHOW / HIDE
    |--------------------------------------------------------------------------
    */

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

                    icon.classList.remove("bi-eye");

                    icon.classList.add("bi-eye-slash");

                } else {

                    input.type = "password";

                    icon.classList.remove("bi-eye-slash");

                    icon.classList.add("bi-eye");

                }

            });

        });


    /*
    |--------------------------------------------------------------------------
    | RESET REGISTRATION MODAL
    |--------------------------------------------------------------------------
    */

    if (registrationModal) {

        registrationModal.addEventListener(
            "hidden.bs.modal",
            function () {

                typeCards.forEach(function (card) {

                    card.classList.remove("active");

                });


                const domesticCard =
                    document.querySelector(
                        '[data-customer-type="domestic"]'
                    );


                if (domesticCard) {

                    domesticCard.classList.add("active");

                }


                if (customerTypeInput) {

                    customerTypeInput.value =
                        "domestic";

                }


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
        );

    }

});

function selectCustomerType(type) {

    const choiceStep = document.getElementById('customerTypeStep');
    const formStep = document.getElementById('registrationFormStep');

    const customerType = document.getElementById('customerType');
    const selectedType = document.getElementById('selectedCustomerType');

    const countryField = document.getElementById('countryField');
    const country = document.getElementById('country');

    customerType.value = type;

    choiceStep.style.display = 'none';
    formStep.style.display = 'block';


    if (type === 'domestic') {

        selectedType.textContent = 'DOMESTIC CUSTOMER';

        countryField.style.display = 'none';

        country.required = false;

    } else {

        selectedType.textContent = 'INTERNATIONAL CUSTOMER';

        countryField.style.display = 'block';

        country.required = true;

    }
}


function backToCustomerType() {

    document.getElementById('registrationFormStep').style.display = 'none';

    document.getElementById('customerTypeStep').style.display = 'block';

}

document.addEventListener('DOMContentLoaded', function () {

    const authModalIds = [
        'authChoiceModal',
        'loginModal',
        'registrationModal'
    ];

    authModalIds.forEach(function (modalId) {

        const modal = document.getElementById(modalId);

        if (!modal) return;

        // Modal open
        modal.addEventListener('show.bs.modal', function () {
            document.body.classList.add('auth-modal-open');
        });

        // Modal completely close
        modal.addEventListener('hidden.bs.modal', function () {
            document.body.classList.remove('auth-modal-open');
        });

    });

});


document.addEventListener('DOMContentLoaded', function () {

    const registrationModal = document.getElementById('registrationModal');

    if (!registrationModal) {
        return;
    }

    // Registration modal OPEN
    registrationModal.addEventListener('shown.bs.modal', function () {

        document.body.classList.add('auth-modal-open');

    });

    // Registration modal CLOSE
    registrationModal.addEventListener('hidden.bs.modal', function () {

        document.body.classList.remove('auth-modal-open');

    });

});

