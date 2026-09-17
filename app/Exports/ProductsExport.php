<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::with('category')
            ->latest()
            ->get()
            ->map(function ($product) {

                return [
                    $product->id,
                    $product->name,
                    $product->sku,
                    $product->category->name ?? '-',
                    $product->unit ?? '-',
                    $product->moq ?? '-',
                    $product->packaging_options ?? '-',
                    $product->status ?? '-',
                    $product->created_at
                        ? $product->created_at->format('d-m-Y')
                        : '-',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Product Name',
            'SKU',
            'Category',
            'Unit',
            'MOQ',
            'Packaging Options',
            'Status',
            'Created Date',
        ];
    }
}