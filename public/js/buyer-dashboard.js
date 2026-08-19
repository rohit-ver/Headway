/* =========================================================
   HEADWAYSTRATA - BUYER DASHBOARD JS
========================================================= */


/* =========================================================
   MOBILE SIDEBAR
========================================================= */

function toggleBuyerSidebar() {

    const sidebar = document.getElementById("buyerSidebar");
    const overlay = document.getElementById("buyerSidebarOverlay");

    if (!sidebar || !overlay) {
        return;
    }

    sidebar.classList.toggle("active");
    overlay.classList.toggle("active");

    document.body.classList.toggle(
        "buyer-sidebar-open"
    );
}


/* =========================================================
   CLOSE SIDEBAR
========================================================= */

function closeBuyerSidebar() {

    const sidebar = document.getElementById("buyerSidebar");
    const overlay = document.getElementById("buyerSidebarOverlay");

    if (!sidebar || !overlay) {
        return;
    }

    sidebar.classList.remove("active");
    overlay.classList.remove("active");

    document.body.classList.remove(
        "buyer-sidebar-open"
    );
}


/* =========================================================
   CLOSE SIDEBAR ON NAVIGATION - MOBILE
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const navLinks =
        document.querySelectorAll(
            ".buyer-nav-link"
        );

    navLinks.forEach(function (link) {

        link.addEventListener(
            "click",
            function () {

                if (window.innerWidth <= 991) {

                    closeBuyerSidebar();

                }

            }
        );

    });

});


/* =========================================================
   ESC KEY - CLOSE SIDEBAR
========================================================= */

document.addEventListener("keydown", function (event) {

    if (event.key === "Escape") {

        closeBuyerSidebar();

    }

});


/* =========================================================
   WINDOW RESIZE
========================================================= */

window.addEventListener("resize", function () {

    if (window.innerWidth > 991) {

        closeBuyerSidebar();

    }

});


/* =========================================================
   PAGE LOAD ANIMATION
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    document.body.classList.add(
        "buyer-dashboard-loaded"
    );

});

/* =========================================================
   BUYER PROFILE - EDIT TOGGLE
========================================================= */

function toggleProfileEdit() {

    const editCard = document.getElementById('profileEditCard');

    if (!editCard) {
        return;
    }

    editCard.classList.toggle('show');

    if (editCard.classList.contains('show')) {

        setTimeout(function () {

            editCard.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

        }, 100);

    }

}

document.addEventListener('DOMContentLoaded', function () {

    // Sidebar toggle
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.buyer-sidebar');

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function () {
            sidebar.classList.toggle('active');
        });
    }


    // Close sidebar on mobile
    document.addEventListener('click', function (event) {

        if (!sidebar || !sidebarToggle) return;

        if (
            window.innerWidth <= 991 &&
            !sidebar.contains(event.target) &&
            !sidebarToggle.contains(event.target)
        ) {
            sidebar.classList.remove('active');
        }

    });


    // Profile dropdown
    const profileToggle = document.querySelector('.buyer-profile-toggle');
    const profileDropdown = document.querySelector('.buyer-profile-dropdown');

    if (profileToggle && profileDropdown) {

        profileToggle.addEventListener('click', function (event) {

            event.stopPropagation();

            profileDropdown.classList.toggle('active');

        });

        document.addEventListener('click', function () {
            profileDropdown.classList.remove('active');
        });

    }


    // Dashboard cards animation
    const animatedItems = document.querySelectorAll(
        '.dashboard-card, .order-card, .inquiry-card, .profile-card'
    );

    animatedItems.forEach((item, index) => {

        item.style.animationDelay = `${index * 0.08}s`;

    });

});

/* =========================================================
   MY INQUIRIES - SEARCH & FILTER
========================================================= */

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('inquirySearch');
    const statusFilter = document.getElementById('inquiryStatus');
    const tableBody = document.getElementById('inquiryTableBody');
    const emptyState = document.getElementById('inquiryEmpty');

    if (!searchInput || !statusFilter || !tableBody) {
        return;
    }

    const rows = tableBody.querySelectorAll('tr');


    function filterInquiries() {

        const searchValue =
            searchInput.value.toLowerCase().trim();

        const statusValue =
            statusFilter.value;

        let visibleRows = 0;


        rows.forEach(function (row) {

            const rowText =
                row.textContent.toLowerCase();

            const rowStatus =
                row.dataset.status || '';


            const searchMatch =
                rowText.includes(searchValue);

            const statusMatch =
                statusValue === 'all' ||
                rowStatus === statusValue;


            if (searchMatch && statusMatch) {

                row.style.display = '';

                visibleRows++;

            } else {

                row.style.display = 'none';

            }

        });


        if (emptyState) {

            emptyState.style.display =
                visibleRows === 0
                    ? 'block'
                    : 'none';

        }

    }


    /* Search */

    searchInput.addEventListener(
        'input',
        filterInquiries
    );


    /* Status Filter */

    statusFilter.addEventListener(
        'change',
        filterInquiries
    );


    /* =====================================================
       VIEW BUTTON ANIMATION
    ===================================================== */

    document
        .querySelectorAll('.inquiry-view-btn')
        .forEach(function (button) {

            button.addEventListener('mouseenter', function () {

                const icon =
                    this.querySelector('i');

                if (icon) {
                    icon.style.transform =
                        'translateX(4px)';
                }

            });


            button.addEventListener('mouseleave', function () {

                const icon =
                    this.querySelector('i');

                if (icon) {
                    icon.style.transform =
                        'translateX(0)';
                }

            });

        });

});