<?php

namespace App\Http\Controllers;

use App\Exports\InquiriesExport;
use App\Models\Inquiry;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class InquiryPdfController extends Controller
{
    public function exportPdf()
    {
        $inquiries = Inquiry::latest()->get();
        $pdf = Pdf::loadView('exports.inquiries-pdf', compact('inquiries'));
        return $pdf->stream('buyer-requests-' . now()->format('Y-m-d') . '.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new InquiriesExport, 'buyer-requests-' . now()->format('Y-m-d') . '.xlsx');
    }
    
}