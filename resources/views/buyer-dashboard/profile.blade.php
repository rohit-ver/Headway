@extends('buyer-dashboard.layouts.buyer')

@section('title', 'My Profile | HeadwayStrata')

@section('content')

@php
    // Phone: country code + number
    $countryCode = $customer->country_code
        ? '+' . ltrim($customer->country_code, '+')
        : '';
    $fullPhone = trim($countryCode . ' ' . ($customer->phone ?? ''));

    // Customer type
    $isInternational = ($customer->customer_type ?? '') === 'international';
    $customerTypeLabel = $isInternational ? 'International Buyer' : 'Domestic Buyer';

    // Country: table me column ho to wahi, warna customer type se
    $country = $customer->country
        ?? ($customer->customer_type ? ($isInternational ? 'International' : 'India') : null);

    $businessTypes = ['Wholesaler', 'Distributor', 'Retailer', 'Importer', 'Exporter'];
    $dash = '—';
@endphp

<!-- =========================================================
     PROFILE PAGE
========================================================= -->

<div class="buyer-page-header">

    <div>
        <span class="buyer-page-tag">
            ACCOUNT
        </span>

        <h1>
            My <span>Profile</span>
        </h1>

        <p>
            Manage your personal and business information.
        </p>
    </div>

    <div class="buyer-page-icon">
        <i class="bi bi-person-circle"></i>
    </div>

</div>


{{-- Success message --}}
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

{{-- Validation errors --}}
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- =========================================================
     PROFILE OVERVIEW
========================================================= -->

<div class="profile-overview-card">

    <div class="profile-avatar-large">
        <i class="bi bi-person"></i>
    </div>

    <div class="profile-overview-content">

        <span class="profile-status">
            <i class="bi bi-circle-fill"></i>
            Active Account
        </span>

        <h2>
            {{ $customer->name }}
        </h2>

        <p>
            Business Buyer
        </p>

        <small>
            <i class="bi bi-envelope"></i>
            {{ $customer->email ?? $dash }}
        </small>

    </div>

    <button type="button"
            class="profile-edit-btn"
            onclick="toggleProfileEdit()">

        <i class="bi bi-pencil"></i>
        Edit Profile

    </button>

</div>


<!-- =========================================================
     PERSONAL INFORMATION
========================================================= -->

<div class="profile-section-card">

    <div class="profile-section-heading">

        <div>
            <span>
                PERSONAL INFORMATION
            </span>

            <h3>
                Contact Details
            </h3>
        </div>

        <div class="profile-section-icon">
            <i class="bi bi-person-vcard"></i>
        </div>

    </div>


    <div class="profile-info-grid">

        <div class="profile-info-item">

            <label>
                Full Name
            </label>

            <div class="profile-info-value">
                {{ $customer->name ?: $dash }}
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                Business Email
            </label>

            <div class="profile-info-value">
                {{ $customer->email ?: $dash }}
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                Phone Number
            </label>

            <div class="profile-info-value">
                {{ $fullPhone ?: $dash }}
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                Customer Type
            </label>

            <div class="profile-info-value">

                @if ($customer->customer_type)
                    <span class="customer-type-badge">
                        <i class="bi bi-building"></i>
                        {{ $customerTypeLabel }}
                    </span>
                @else
                    {{ $dash }}
                @endif

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     BUSINESS INFORMATION
========================================================= -->

<div class="profile-section-card">

    <div class="profile-section-heading">

        <div>
            <span>
                BUSINESS INFORMATION
            </span>

            <h3>
                Company Details
            </h3>
        </div>

        <div class="profile-section-icon">
            <i class="bi bi-buildings"></i>
        </div>

    </div>


    <div class="profile-info-grid">

        <div class="profile-info-item">

            <label>
                Company Name
            </label>

            <div class="profile-info-value">
                {{ $customer->company_name ?: $dash }}
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                Business Type
            </label>

            <div class="profile-info-value">
                {{ $customer->business_type ?: $dash }}
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                City
            </label>

            <div class="profile-info-value">
                {{ $customer->city ?: $dash }}
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                Country
            </label>

            <div class="profile-info-value">
                {{ $country ?: $dash }}
            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     ACCOUNT SECURITY
========================================================= -->

<div class="profile-section-card">

    <div class="profile-section-heading">

        <div>
            <span>
                ACCOUNT SECURITY
            </span>

            <h3>
                Login & Security
            </h3>
        </div>

        <div class="profile-section-icon">
            <i class="bi bi-shield-lock"></i>
        </div>

    </div>


    <div class="security-row">

        <div class="security-left">

            <div class="security-icon">
                <i class="bi bi-key"></i>
            </div>

            <div>

                <h4>
                    Password
                </h4>

                <p>
                    Your password is securely protected.
                </p>

            </div>

        </div>


        <button type="button"
                class="security-btn">

            Change Password

            <i class="bi bi-arrow-right"></i>

        </button>

    </div>


    <div class="security-row">

        <div class="security-left">

            <div class="security-icon">
                <i class="bi bi-shield-check"></i>
            </div>

            <div>

                <h4>
                    Account Protection
                </h4>

                <p>
                    Your account security is active.
                </p>

            </div>

        </div>


        <span class="security-active">
            <i class="bi bi-check-circle-fill"></i>
            Protected
        </span>

    </div>

</div>


<!-- =========================================================
     EDIT PROFILE FORM
========================================================= -->

<div class="profile-edit-card"
     id="profileEditCard">

    <div class="profile-section-heading">

        <div>
            <span>
                UPDATE ACCOUNT
            </span>

            <h3>
                Edit Profile
            </h3>
        </div>

    </div>


    <form action="{{ route('buyer.profile.update') }}" method="POST">

        @csrf

        <div class="row g-4">

            <div class="col-md-6">

                <label class="profile-form-label">
                    Full Name
                </label>

                <input type="text"
                       name="name"
                       class="profile-form-input"
                       value="{{ old('name', $customer->name) }}"
                       required>

            </div>


            <div class="col-md-6">

                <label class="profile-form-label">
                    Business Email
                </label>

                <input type="email"
                       name="email"
                       class="profile-form-input"
                       value="{{ old('email', $customer->email) }}"
                       required>

            </div>


            <div class="col-md-6">

                <label class="profile-form-label">
                    Phone Number
                </label>

                {{-- Phone OTP se verify hota hai, isliye yahan se change nahi hoga --}}
                <input type="tel"
                       class="profile-form-input"
                       value="{{ $fullPhone }}"
                       readonly>

            </div>


            <div class="col-md-6">

                <label class="profile-form-label">
                    Company Name
                </label>

                <input type="text"
                       name="company_name"
                       class="profile-form-input"
                       value="{{ old('company_name', $customer->company_name) }}">

            </div>


            <div class="col-md-6">

                <label class="profile-form-label">
                    Business Type
                </label>

                <select name="business_type" class="profile-form-input">

                    <option value="">
                        Select business type
                    </option>

                    @foreach ($businessTypes as $type)
                        <option value="{{ $type }}"
                            {{ old('business_type', $customer->business_type) === $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach

                </select>

            </div>


            <div class="col-md-6">

                <label class="profile-form-label">
                    City
                </label>

                <input type="text"
                       name="city"
                       class="profile-form-input"
                       value="{{ old('city', $customer->city) }}">

            </div>


        </div>


        <div class="profile-form-actions">

            <button type="button"
                    class="profile-cancel-btn"
                    onclick="toggleProfileEdit()">

                Cancel

            </button>


            <button type="submit"
                    class="profile-save-btn">

                Save Changes

                <i class="bi bi-check2"></i>

            </button>

        </div>

    </form>

</div>

@endsection


@section('scripts')

@if ($errors->any())
<script>
    // Validation error aaye to edit form khula rakho
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof toggleProfileEdit === 'function') {
            toggleProfileEdit();
        }
    });
</script>
@endif

@endsection