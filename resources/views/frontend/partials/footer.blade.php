<footer class="site-footer">

    <div class="container">

        <div class="footer-grid">

            {{-- ABOUT --}}
            <div class="footer-column footer-about">

                <a href="{{ route('home') }}" class="footer-logo">

                    <img src="{{ asset('storage/' . $globalSetting->logo) }}" alt="footer-logo">

                </a>

                <p>
                    At InC2 Solutions, we specialize in crafting custom
                    software solutions tailored to your business needs.
                </p>

            </div>

            {{-- QUICK LINKS --}}
            <div class="footer-column">

                <h4>Quick Links</h4>

                <ul class="footer-links">

                    <li><a href="{{ route('home') }}">Home</a></li>

                    <li><a href="{{ route('about') }}">About Us</a></li>

                    <li><a href="{{ route('services') }}">Services</a></li>

                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>

                    <li><a href="{{ route('contact') }}">Contact</a></li>

                </ul>

            </div>

            {{-- SERVICES --}}
            <div class="footer-column">

                <h4>Our Services</h4>

                <ul class="footer-links">
                    @foreach ($globalServices as $service)
                        <li><a href="{{route('services')}}">{{ $service->title }}</a></li>
                    @endforeach
                </ul>

            </div>

            {{-- CONTACT --}}
            <div class="footer-column">

                <h4>Contact Us</h4>

                <div class="footer-contact-item">

                    <i class="fa-solid fa-location-dot"></i>

                    <p>{{$globalSetting->address}},{{$globalSetting->street}},{{$globalSetting->state}}<br>{{$globalSetting->country}} {{$globalSetting->pin_code}}</p>

                </div>

                <div class="footer-contact-item">

                    <i class="fa-solid fa-envelope"></i>

                    <p>{{$globalSetting->email}}</p>

                </div>

                <div class="footer-contact-item">

                    <i class="fa-solid fa-phone"></i>

                    <p>+{{$globalSetting->countryCode1->phonecode}} {{$globalSetting->phone_1}}</p>

                </div>

            </div>

        </div>

        {{-- FOOTER BOTTOM --}}
        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} InC2 Solutions. All rights reserved.
            </p>

            <div class="footer-socials">

                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>

                <a href="#"><i class="fa-brands fa-twitter"></i></a>

                <a href="#"><i class="fa-brands fa-instagram"></i></a>

            </div>

        </div>

    </div>

</footer>
