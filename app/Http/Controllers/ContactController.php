<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Store contact enquiry
     */
    public function store(Request $request)
    {
        // Server-side validation
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'min:2',
                'max:150',
                'regex:/^[A-Za-z\s]+$/'
            ],

            'email' => [
                'required',
                'email',
                'max:150'
            ],

            'phone' => [
                'required',
                'string',
                'regex:/^[0-9]{10,15}$/'
            ],

            'whatsapp' => [
                'required',
                'string',
                'regex:/^[0-9]{10,15}$/'
            ],

            'customer_type' => [
                'nullable',
                'in:domestic,international,retailer,wholesaler,distributor'
            ],

            'subject' => [
                'nullable',
                'in:bulk-order,product-enquiry,export,packaging,other'
            ],

            'message' => [
                'required',
                'string',
                'min:10',
                'max:5000'
            ],
        ], [

            'name.required' => 'Please enter your full name.',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name cannot exceed 150 characters.',
            'name.regex' => 'Name can contain only letters and spaces.',

            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',

            'phone.required' => 'Please enter your phone number.',
            'phone.regex' => 'Phone number must contain 10 to 15 digits.',

            'whatsapp.required' => 'Please enter your WhatsApp number.',
            'whatsapp.regex' => 'WhatsApp number must contain 10 to 15 digits.',

            'customer_type.in' => 'Please select a valid customer type.',
            'subject.in' => 'Please select a valid enquiry type.',

            'message.required' => 'Please enter your message.',
            'message.min' => 'Message must be at least 10 characters.',
            'message.max' => 'Message cannot exceed 5000 characters.',
        ]);

        // Store enquiry
        DB::table('contact_inquiries')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'whatsapp' => $validated['whatsapp'],
            'customer_type' => $validated['customer_type'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'status' => 'new',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Thank you! Your enquiry has been submitted successfully. Our team will contact you shortly.');
    }
}