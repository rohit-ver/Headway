@extends('buyer-dashboard.layouts.buyer')

@section('title', 'My Inquiries | HeadwayStrata')

@section('content')

@php
    // status ke hisaab se class aur icon
    $statusMeta = [
        'pending'   => ['label' => 'Pending',   'icon' => 'bi-clock'],
        'replied'   => ['label' => 'Replied',   'icon' => 'bi-chat-left-text'],
        'completed' => ['label' => 'Completed', 'icon' => 'bi-check-circle'],
    ];
    $pad = fn ($n) => str_pad($n, 2, '0', STR_PAD_LEFT);
@endphp

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
         INQUIRY SUMMARY (dynamic)
    ========================================== --}}

    <div class="row g-4 inquiry-summary">

        <div class="col-xl-3 col-md-6">
            <div class="inquiry-stat-card">
                <div class="inquiry-stat-icon">
                    <i class="bi bi-send"></i>
                </div>
                <div>
                    <span>Total Inquiries</span>
                    <strong>{{ $pad($stats['total']) }}</strong>
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
                    <strong>{{ $pad($stats['pending']) }}</strong>
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
                    <strong>{{ $pad($stats['replied']) }}</strong>
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
                    <strong>{{ $pad($stats['completed']) }}</strong>
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
                <option value="all">All Status</option>
                <option value="pending">Pending</option>
                <option value="replied">Replied</option>
                <option value="completed">Completed</option>
            </select>
        </div>

    </div>


    {{-- =========================================
         INQUIRY TABLE (dynamic)
    ========================================== --}}

    <div class="buyer-table-card">

        <div class="buyer-table-header">

            <div>
                <h3>Inquiry History</h3>
                <p>Your recent product inquiries</p>
            </div>

            <span class="inquiry-count">
                {{ $stats['total'] }} {{ \Illuminate\Support\Str::plural('Inquiry', $stats['total']) }}
            </span>

        </div>


        <div class="table-responsive">

            <table class="buyer-inquiry-table">

                <thead>
                    <tr>
                        <th>Inquiry ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody id="inquiryTableBody">

                    @foreach ($inquiries as $inquiry)

                        @php
                            $status = strtolower($inquiry->status ?? 'pending');
                            if (! isset($statusMeta[$status])) {
                                $status = 'pending';
                            }

                            $items      = $inquiry->items;
                            $firstItem  = $items->first();
                            $product    = optional($firstItem)->product;
                            $moreCount  = max($items->count() - 1, 0);

                            $image = $product && $product->main_image
                                ? asset('uploads/' . $product->main_image)
                                : asset('images/no-image.png');
                        @endphp

                        <tr data-status="{{ $status }}">

                            <td>
                                <span class="inquiry-id">
                                    #INQ-{{ $inquiry->id }}
                                </span>
                            </td>


                            <td>
                                <div class="inquiry-product">

                                    <div class="inquiry-product-image">
                                        <img src="{{ $image }}"
                                             alt="{{ $product->name ?? 'Product' }}">
                                    </div>

                                    <div>
                                        <strong>
                                            {{ $product->name ?? 'Product removed' }}
                                        </strong>

                                        <span>
                                            @if ($moreCount > 0)
                                                +{{ $moreCount }} more {{ \Illuminate\Support\Str::plural('product', $moreCount) }}
                                            @else
                                                {{ optional($product->category ?? null)->name }}
                                            @endif
                                        </span>
                                    </div>

                                </div>
                            </td>


                            <td>
                                @if ($items->count() > 1)
                                    {{ $items->count() }} items
                                @elseif ($firstItem)
                                    {{ $firstItem->quantity }} {{ $firstItem->unit ?? '' }}
                                @else
                                    -
                                @endif
                            </td>


                            <td>
                                {{ $inquiry->created_at->format('d M Y') }}
                            </td>


                            <td>
                                <span class="inquiry-status {{ $status }}">
                                    <i class="bi {{ $statusMeta[$status]['icon'] }}"></i>
                                    {{ $statusMeta[$status]['label'] }}
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

                    @endforeach

                </tbody>

            </table>

        </div>


        {{-- EMPTY RESULT (search/filter ke baad) --}}
        <div class="inquiry-empty"
             id="inquiryEmpty"
             style="display: {{ $inquiries->isEmpty() ? 'block' : 'none' }};">

            <i class="bi bi-search"></i>

            @if ($inquiries->isEmpty())
                <h4>No inquiries yet</h4>
                <p>
                    Browse our products and send your first inquiry.
                </p>
            @else
                <h4>No inquiries found</h4>
                <p>Try changing your search or filter.</p>
            @endif

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
                <h3>Need help with an inquiry?</h3>
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

    const searchInput  = document.getElementById('inquirySearch');
    const statusFilter = document.getElementById('inquiryStatus');
    const rows         = document.querySelectorAll('#inquiryTableBody tr');
    const emptyState   = document.getElementById('inquiryEmpty');

    function filterInquiries() {

        const searchValue = searchInput.value.toLowerCase().trim();
        const statusValue = statusFilter.value;

        let visibleCount = 0;

        rows.forEach(function (row) {

            const matchesSearch = row.innerText.toLowerCase().includes(searchValue);
            const matchesStatus = statusValue === 'all' || row.dataset.status === statusValue;

            if (matchesSearch && matchesStatus) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }

        });

        // rows hain par filter ne sab chhupa diye ho tab hi message dikhao
        if (rows.length > 0) {
            emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
        }
    }

    searchInput.addEventListener('input', filterInquiries);
    statusFilter.addEventListener('change', filterInquiries);

});

</script>

@endsection