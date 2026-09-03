<x-mail::message>
{{-- Company Header --}}
<div style="text-align:center; background:#f5f5f5; padding:20px;">
    <img src="{{ asset('images/company-logo.png') }}" alt="Company Logo" width="150">
    <h2 style="margin-top:10px; font-family:Arial, sans-serif; color:#333;">
        {{ config('app.name') }}
    </h2>
</div>

{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
# Hello!
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}
@endforeach

{{-- Action Button --}}
@isset($actionText)
<x-mail::button :url="$actionUrl" color="success">
    {{ $actionText }}
</x-mail::button>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}
@endforeach

{{-- Signature --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Thanks & Regards,<br>
<strong>{{ config('app.name') }} Team</strong>
@endif

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
If you’re having trouble clicking the "{{ $actionText }}" button,  
copy and paste the URL below into your browser:  
<span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset

{{-- Custom Footer --}}
<div style="margin-top:30px; text-align:center; font-size:12px; color:#888;">
    <hr>
    <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    <p>123 Business Street, Jaipur, India | support@company.com</p>
</div>
</x-mail::message>
