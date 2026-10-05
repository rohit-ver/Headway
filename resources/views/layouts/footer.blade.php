<footer class="main-footer">

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-5 text-center">

                <a href="{{ url('/') }}" class="brand-logo d-inline-block">
                    <img src="{{ asset('images/Headway-logo.png') }}"
                        alt="HeadwayStrata Logo"
                        class="brand-logo-img">
                </a>

                <div class="heading-ornament">
                    <h2 class="section-title title-green">From india  to the world</h2>
                    <img src="{{ asset('images/divider.png') }}" alt="" class="heading-divider">
                </div>

            </div>


            <div class="col-6 col-lg-2">

                <h5>Quick Links </h5>


                <ul>

                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>

                    <li>
                        <a href="{{ url('/about') }}">About Us</a>
                    </li>

                    <li>
                        <a href="{{ url('/products') }}">Products</a>
                    </li>

                    <li>
                        <a href="{{ url('/contact') }}">Contact</a>
                    </li>

                </ul>

            </div>


            <div class="col-6 col-lg-2">

                <h5>Business </h5>

                <ul>

                    <li>
                        <a href="{{ url('/products') }}">
                            Categories
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/products') }}">
                            Wholesale
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/contact_inquiries') }}">
                            Inquiry
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Contact --}}
            <div class="col-lg-3">

                <h5>Contact</h5>

                {{-- Email --}}
                @if($websiteSettings?->email)
                    <p>
                        <i class="bi bi-envelope"></i>

                        <a href="mailto:{{ $websiteSettings->email }}">
                            {{ $websiteSettings->email }}
                        </a>
                    </p>
                @endif


                {{-- Phone --}}
                @if($websiteSettings?->phone)
                    <p>
                        <i class="bi bi-telephone"></i>

                        <a href="tel:{{ $websiteSettings->phone }}">
                            {{ $websiteSettings->phone }}
                        </a>
                    </p>
                @endif


                {{-- Address --}}
                @if($websiteSettings?->address)
                    <p>
                        <i class="bi bi-geo-alt"></i>

                        {{ $websiteSettings->address }}
                    </p>
                @endif


                {{-- Social Media --}}
                <div class="footer-social">

                    {{-- Facebook --}}
                    @if($websiteSettings?->facebook)
                        <a href="{{ $websiteSettings->facebook }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                    @endif


                    {{-- Instagram --}}
                    @if($websiteSettings?->instagram)
                        <a href="{{ $websiteSettings->instagram }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                    @endif


                    {{-- LinkedIn --}}
                    @if($websiteSettings?->linkedin)
                        <a href="{{ $websiteSettings->linkedin }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    @endif


                    {{-- YouTube --}}
                    @if($websiteSettings?->youtube)
                        <a href="{{ $websiteSettings->youtube }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           aria-label="YouTube">
                            <i class="bi bi-youtube"></i>
                        </a>
                    @endif

                </div>

            </div>

        </div>


        <hr>


        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} {{ $websiteSettings?->company_name ?? 'HeadwayStrata' }}.
                All Rights Reserved.
            </p>

            <div>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
            </div>

        </div>

    </div>

</footer>

