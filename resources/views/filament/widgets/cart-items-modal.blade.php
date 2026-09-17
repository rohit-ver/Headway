<style>
    .cart-items-modal-wrapper {
        padding: 4px 0;
    }

    .cart-items-modal-wrapper .empty-state {
        text-align: center;
        padding: 30px 10px;
        color: #6b7280;
        font-size: 13.5px;
    }

    .cart-items-modal-wrapper table {
        width: 100%;
        font-size: 13.5px;
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
    }

    .cart-items-modal-wrapper thead {
        background: #f9fafb;
    }

    .cart-items-modal-wrapper th {
        text-align: left;
        padding: 10px 14px;
        font-weight: 600;
        font-size: 12px;
        letter-spacing: 0.03em;
        text-transform: uppercase;
        color: #6b7280;
        border-bottom: 1px solid #e5e7eb;
    }

    .cart-items-modal-wrapper td {
        padding: 12px 14px;
        color: #111827;
        border-top: 1px solid #f3f4f6;
    }

    .cart-items-modal-wrapper tbody tr:hover {
        background: #f9fafb;
    }

    .cart-items-modal-wrapper .status-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11.5px;
        font-weight: 600;
        text-transform: capitalize;
    }

    .cart-items-modal-wrapper .status-pending {
        background: rgba(245, 158, 11, 0.12);
        color: #d97706;
    }

    .cart-items-modal-wrapper .status-approved,
    .cart-items-modal-wrapper .status-completed {
        background: rgba(16, 185, 129, 0.12);
        color: #059669;
    }

    .cart-items-modal-wrapper .status-rejected,
    .cart-items-modal-wrapper .status-cancelled {
        background: rgba(239, 68, 68, 0.12);
        color: #dc2626;
    }

    /* Dark mode */
    .dark .cart-items-modal-wrapper table {
        border-color: #374151;
    }

    .dark .cart-items-modal-wrapper thead {
        background: #1f2937;
    }

    .dark .cart-items-modal-wrapper th {
        color: #9ca3af;
        border-bottom-color: #374151;
    }

    .dark .cart-items-modal-wrapper td {
        color: #f3f4f6;
        border-top-color: #374151;
    }

    .dark .cart-items-modal-wrapper tbody tr:hover {
        background: #1f2937;
    }

    .dark .cart-items-modal-wrapper .empty-state {
        color: #9ca3af;
    }
</style>

<div class="cart-items-modal-wrapper">

    @if ($items->isEmpty())

        <p class="empty-state">
            No products found for this inquiry.
        </p>

    @else

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->unit }}</td>
                        <td>
                            <span class="status-badge status-{{ $item->item_status }}">
                                {{ $item->item_status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif

</div>