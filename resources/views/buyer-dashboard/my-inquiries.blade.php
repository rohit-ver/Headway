@extends('buyer-dashboard.layouts.buyer')

@section('title', 'My Inquiries | HeadwayStrata')

@section('content')

<div class="buyer-page-wrapper">

    {{-- =========================================
         PAGE HEADER
    ========================================== --}}

    <div class="buyer-page-header">

        <div>
            <span class="buyer-page-tag">
                BUSINESS ACTIVITY
            </span>

            <h1>
                My <span>Inquiries</span>
            </h1>

            <p>
                Track and manage all your product inquiries in one place.
            </p>
        </div>

        <a href="{{ url('/products') }}" class="buyer-primary-btn">
            <i class="bi bi-plus-lg"></i>
            New Inquiry
        </a>

    </div>


    {{-- =========================================
         INQUIRY SUMMARY
    ========================================== --}}

    <div class="row g-4 inquiry-summary">

        <div class="col-xl-3 col-md-6">

            <div class="inquiry-stat-card">

                <div class="inquiry-stat-icon">
                    <i class="bi bi-send"></i>
                </div>

                <div>
                    <span>Total Inquiries</span>
                    <strong>12</strong>
                </div>

            </div>

        </div>


        <div class="col-xl-3 col-md-6">

            <div class="inquiry-stat-card">

                <div class="inquiry-stat-icon pending">
                    <i class="bi bi-clock"></i>
                </div>

                <div>
                    <span>Pending</span>
                    <strong>04</strong>
                </div>

            </div>

        </div>


        <div class="col-xl-3 col-md-6">

            <div class="inquiry-stat-card">

                <div class="inquiry-stat-icon replied">
                    <i class="bi bi-chat-left-text"></i>
                </div>

                <div>
                    <span>Replied</span>
                    <strong>05</strong>
                </div>

            </div>

        </div>


        <div class="col-xl-3 col-md-6">

            <div class="inquiry-stat-card">

                <div class="inquiry-stat-icon completed">
                    <i class="bi bi-check-circle"></i>
                </div>

                <div>
                    <span>Completed</span>
                    <strong>03</strong>
                </div>

            </div>

        </div>

    </div>


    {{-- =========================================
         INQUIRY FILTER
    ========================================== --}}

    <div class="inquiry-toolbar">

        <div class="inquiry-search">

            <i class="bi bi-search"></i>

            <input type="text"
                   id="inquirySearch"
                   placeholder="Search inquiries...">

        </div>


        <div class="inquiry-filter">

            <select id="inquiryStatus">

                <option value="all">
                    All Status
                </option>

                <option value="pending">
                    Pending
                </option>

                <option value="replied">
                    Replied
                </option>

                <option value="completed">
                    Completed
                </option>

            </select>

        </div>

    </div>


    {{-- =========================================
         INQUIRY TABLE
    ========================================== --}}

    <div class="buyer-table-card">

        <div class="buyer-table-header">

            <div>

                <h3>
                    Inquiry History
                </h3>

                <p>
                    Your recent product inquiries
                </p>

            </div>

            <span class="inquiry-count">
                12 Inquiries
            </span>

        </div>


        <div class="table-responsive">

            <table class="buyer-inquiry-table">

                <thead>

                    <tr>

                        <th>
                            Inquiry ID
                        </th>

                        <th>
                            Product
                        </th>

                        <th>
                            Quantity
                        </th>

                        <th>
                            Date
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody id="inquiryTableBody">


                    {{-- INQUIRY 1 --}}

                    <tr data-status="replied">

                        <td>

                            <span class="inquiry-id">
                                #INQ-1024
                            </span>

                        </td>


                        <td>

                            <div class="inquiry-product">

                                <div class="inquiry-product-image">

                                    <img src="{{ asset('uploads/products/makhana-5-suta.jpg') }}"
                                         alt="5 Suta Makhana">

                                </div>

                                <div>

                                    <strong>
                                        5 Suta Makhana
                                    </strong>

                                    <span>
                                        Premium Makhana
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>
                            500 KG
                        </td>


                        <td>
                            12 Aug 2026
                        </td>


                        <td>

                            <span class="inquiry-status replied">
                                <i class="bi bi-chat-left-text"></i>
                                Replied
                            </span>

                        </td>


                        <td>

                            <a href="#"
                               class="inquiry-view-btn">

                                View
                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </td>

                    </tr>



                    {{-- INQUIRY 2 --}}

                    <tr data-status="pending">

                        <td>

                            <span class="inquiry-id">
                                #INQ-1023
                            </span>

                        </td>


                        <td>

                            <div class="inquiry-product">

                                <div class="inquiry-product-image">

                                    <img src="{{ asset('uploads/products/makhana-6-suta.jpg') }}"
                                         alt="6 Suta Makhana">

                                </div>

                                <div>

                                    <strong>
                                        6 Suta Makhana
                                    </strong>

                                    <span>
                                        Premium Makhana
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>
                            1000 KG
                        </td>


                        <td>
                            10 Aug 2026
                        </td>


                        <td>

                            <span class="inquiry-status pending">
                                <i class="bi bi-clock"></i>
                                Pending
                            </span>

                        </td>


                        <td>

                            <a href="#"
                               class="inquiry-view-btn">

                                View
                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </td>

                    </tr>



                    {{-- INQUIRY 3 --}}

                    <tr data-status="completed">

                        <td>

                            <span class="inquiry-id">
                                #INQ-1022
                            </span>

                        </td>


                        <td>

                            <div class="inquiry-product">

                                <div class="inquiry-product-image">

                                    <img src="{{ asset('uploads/products/aloo-bhujia.jpg') }}"
                                         alt="Aloo Bhujia">

                                </div>

                                <div>

                                    <strong>
                                        Aloo Bhujia
                                    </strong>

                                    <span>
                                        Namkeen
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>
                            250 KG
                        </td>


                        <td>
                            06 Aug 2026
                        </td>


                        <td>

                            <span class="inquiry-status completed">
                                <i class="bi bi-check-circle"></i>
                                Completed
                            </span>

                        </td>


                        <td>

                            <a href="#"
                               class="inquiry-view-btn">

                                View
                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </td>

                    </tr>



                    {{-- INQUIRY 4 --}}

                    <tr data-status="pending">

                        <td>

                            <span class="inquiry-id">
                                #INQ-1021
                            </span>

                        </td>


                        <td>

                            <div class="inquiry-product">

                                <div class="inquiry-product-image">

                                    <img src="{{ asset('uploads/products/mix-namkeen.jpg') }}"
                                         alt="Mix Namkeen">

                                </div>

                                <div>

                                    <strong>
                                        Mix Namkeen
                                    </strong>

                                    <span>
                                        Namkeen
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>
                            300 KG
                        </td>


                        <td>
                            04 Aug 2026
                        </td>


                        <td>

                            <span class="inquiry-status pending">
                                <i class="bi bi-clock"></i>
                                Pending
                            </span>

                        </td>


                        <td>

                            <a href="#"
                               class="inquiry-view-btn">

                                View
                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </td>

                    </tr>



                </tbody>

            </table>

        </div>


        {{-- EMPTY RESULT --}}

        <div class="inquiry-empty"
             id="inquiryEmpty"
             style="display:none;">

            <i class="bi bi-search"></i>

            <h4>
                No inquiries found
            </h4>

            <p>
                Try changing your search or filter.
            </p>

        </div>

    </div>


    {{-- =========================================
         BOTTOM CTA
    ========================================== --}}

    <div class="inquiry-bottom-cta">

        <div>

            <div class="inquiry-cta-icon">
                <i class="bi bi-chat-square-text"></i>
            </div>

            <div>

                <h3>
                    Need help with an inquiry?
                </h3>

                <p>
                    Our business team is ready to help you with pricing,
                    quantities and product requirements.
                </p>

            </div>

        </div>


        <a href="{{ url('/contact') }}"
           class="buyer-outline-btn">

            Contact Team
            <i class="bi bi-arrow-right"></i>

        </a>

    </div>

</div>

@endsection


@section('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('inquirySearch');
    const statusFilter = document.getElementById('inquiryStatus');
    const rows = document.querySelectorAll('#inquiryTableBody tr');
    const emptyState = document.getElementById('inquiryEmpty');


    function filterInquiries() {

        const searchValue =
            searchInput.value.toLowerCase().trim();

        const statusValue =
            statusFilter.value;

        let visibleCount = 0;


        rows.forEach(function (row) {

            const rowText =
                row.innerText.toLowerCase();

            const rowStatus =
                row.dataset.status;


            const matchesSearch =
                rowText.includes(searchValue);

            const matchesStatus =
                statusValue === 'all' ||
                rowStatus === statusValue;


            if (matchesSearch && matchesStatus) {

                row.style.display = '';

                visibleCount++;

            } else {

                row.style.display = 'none';

            }

        });


        if (visibleCount === 0) {

            emptyState.style.display = 'block';

        } else {

            emptyState.style.display = 'none';

        }

    }


    searchInput.addEventListener(
        'input',
        filterInquiries
    );


    statusFilter.addEventListener(
        'change',
        filterInquiries
    );

});

</script>

@endsection