<footer class="main-footer">

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-5">

                <a href="{{ url('/') }}" class="brand-logo">
                    <img src="{{ asset('images/Headway-logo.png') }}"
                        alt="HeadwayStrata Logo"
                        class="brand-logo-img">
                </a>

                <p class="footer-description">
                    Premium quality Makhana sourced from trusted farms
                    and delivered with care.
                </p>

            </div>


            <div class="col-6 col-lg-2">

                <h5>Quick Links</h5>

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

                <h5>Business</h5>

                <ul>

                    <li>
                        <a href="{{ url('/categories') }}">
                            Categories
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/products') }}">
                            Wholesale
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/contact') }}">
                            Inquiry
                        </a>
                    </li>

                </ul>

            </div>


            <div class="col-lg-3">

                <h5>Contact</h5>

                <p>
                    <i class="bi bi-envelope"></i>
                    info@example.com
                </p>

                <p>
                    <i class="bi bi-telephone"></i>
                    +91 00000 00000
                </p>

            </div>

        </div>


        <hr>


        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} Makhana. All Rights Reserved.
            </p>

            <div>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
            </div>

        </div>

    </div>

</footer>