<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Buyer Requests</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .buyer-block { margin-bottom: 18px; border: 1px solid #999; padding: 8px; }
        .buyer-info { width: 100%; border-collapse: collapse; margin-bottom: 6px; }
        .buyer-info th, .buyer-info td { border: 1px solid #ddd; padding: 5px; }
        .buyer-info th { background: #f2f2f2; text-align: left; }
        .items-table { width: 100%; border-collapse: collapse; margin-top: 4px; }
        .items-table th, .items-table td { border: 1px solid #ddd; padding: 4px 5px; }
        .items-table th { background: #fafafa; }
        .no-items { font-style: italic; color: #777; margin: 4px 0; }
    </style>
</head>
<body>
    <h2>Buyer Requests</h2>

    @foreach($inquiries as $inquiry)
    <div class="buyer-block">
        <table class="buyer-info">
            <thead>
                <tr style="background:#f2f2f2;">
                    <th>Buyer</th>
                    <th>Email</th>
                    <th>Customer Type</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->customer_type }}</td>
                    <td>{{ $inquiry->phone }}</td>
                    <td>{{ $inquiry->message }}</td>
                    <td>{{ $inquiry->created_at->format('d-m-Y') }}</td>
                </tr>
            </tbody>
        </table>

        @if($inquiry->items && $inquiry->items->count())
        <table class="items-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inquiry->items as $item)
                <tr>
                    <td>{{ $item->product->name ?? $item->product_name ?? '-' }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="no-items">No products in this request</p>
        @endif
    </div>
    @endforeach
</body>
</html>