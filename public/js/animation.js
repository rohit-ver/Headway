document.addEventListener("DOMContentLoaded", function () {

    const heroCarousel = document.getElementById("heroCarousel");

    if (heroCarousel) {

        heroCarousel.addEventListener("slid.bs.carousel", function () {

            const activeSlide =
                heroCarousel.querySelector(".carousel-item.active");

            if (!activeSlide) return;

            const animatedElements =
                activeSlide.querySelectorAll(
                    ".hero-badge, h1, p, .hero-features, .hero-btn"
                );

            animatedElements.forEach(function (element) {

                element.style.animation = "none";

                element.offsetHeight;

                element.style.animation = "";

            });

        });

    }


    /*
    =========================================
    NAVBAR CLOSE ON MOBILE LINK CLICK
    =========================================
    */

    const navLinks =
        document.querySelectorAll("#mainNavbar .nav-link");

    const navbar =
        document.getElementById("mainNavbar");

    navLinks.forEach(function (link) {

        link.addEventListener("click", function () {

            if (window.innerWidth < 992) {

                const bsCollapse =
                    bootstrap.Collapse.getInstance(navbar);

                if (bsCollapse) {
                    bsCollapse.hide();
                }

            }

        });

    });

});

window.addEventListener("scroll", function () {

    const header = document.querySelector(".main-header");

    if (!header) return;

    if (window.scrollY > 30) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }

});