@extends('buyer-dashboard.layouts.buyer')

@section('title', 'My Profile | HeadwayStrata')

@section('content')

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
            User Name
        </h2>

        <p>
            Business Buyer
        </p>

        <small>
            <i class="bi bi-envelope"></i>
            business@example.com
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
                User Name
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                Business Email
            </label>

            <div class="profile-info-value">
                business@example.com
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                Phone Number
            </label>

            <div class="profile-info-value">
                +91 98765 43210
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                Customer Type
            </label>

            <div class="profile-info-value">

                <span class="customer-type-badge">
                    <i class="bi bi-building"></i>
                    Domestic Buyer
                </span>

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
                ABC Foods Pvt. Ltd.
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                Business Type
            </label>

            <div class="profile-info-value">
                Wholesaler
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                City
            </label>

            <div class="profile-info-value">
                Jaipur
            </div>

        </div>


        <div class="profile-info-item">

            <label>
                Country
            </label>

            <div class="profile-info-value">
                India
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


    <form action="#" method="POST">

        @csrf

        <div class="row g-4">

            <div class="col-md-6">

                <label class="profile-form-label">
                    Full Name
                </label>

                <input type="text"
                       class="profile-form-input"
                       value="User Name">

            </div>


            <div class="col-md-6">

                <label class="profile-form-label">
                    Business Email
                </label>

                <input type="email"
                       class="profile-form-input"
                       value="business@example.com">

            </div>


            <div class="col-md-6">

                <label class="profile-form-label">
                    Phone Number
                </label>

                <input type="tel"
                       class="profile-form-input"
                       value="+91 98765 43210">

            </div>


            <div class="col-md-6">

                <label class="profile-form-label">
                    Company Name
                </label>

                <input type="text"
                       class="profile-form-input"
                       value="ABC Foods Pvt. Ltd.">

            </div>


            <div class="col-md-6">

                <label class="profile-form-label">
                    Business Type
                </label>

                <select class="profile-form-input">

                    <option>
                        Wholesaler
                    </option>

                    <option>
                        Distributor
                    </option>

                    <option>
                        Retailer
                    </option>

                    <option>
                        Importer
                    </option>

                    <option>
                        Exporter
                    </option>

                </select>

            </div>


            <div class="col-md-6">

                <label class="profile-form-label">
                    City
                </label>

                <input type="text"
                       class="profile-form-input"
                       value="Jaipur">

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