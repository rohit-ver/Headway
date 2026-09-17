<?php

namespace App\Exports;

use App\Models\Inquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InquiriesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $rows = collect();

        $inquiries = Inquiry::with('items.product')->latest()->get();

        foreach ($inquiries as $inquiry) {
            if ($inquiry->items && $inquiry->items->count()) {
                foreach ($inquiry->items as $item) {
                    $rows->push([
                        $inquiry->name,
                        $inquiry->email,
                        $inquiry->customer_type,
                        $inquiry->phone,
                        $inquiry->message,
                        $item->product->name ?? $item->product_name ?? '-',
                        $item->quantity ?? '-',
                        $inquiry->created_at->format('d-m-Y'),
                    ]);
                }
            } else {
                $rows->push([
                    $inquiry->name,
                    $inquiry->email,
                    $inquiry->customer_type,
                    $inquiry->phone,
                    $inquiry->message,
                    '-',
                    '-',
                    $inquiry->created_at->format('d-m-Y'),
                ]);
            }
        }

        return $rows;
    }

    public function headings(): array
    {
        return ['Buyer', 'Email', 'Customer Type', 'Phone', 'Message', 'Product', 'Quantity', 'Date'];
    }
}