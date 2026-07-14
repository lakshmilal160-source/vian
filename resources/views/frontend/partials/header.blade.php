<header>

    <div class="container nav-container">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="logo">

            <img src="{{ asset('storage/' . $globalSetting->logo) }}" alt="header-logo">

        </a>

        {{-- MOBILE TOGGLE --}}
        <button class="nav-toggle" id="navToggle">

            <span class="hamburger"></span>

        </button>

        {{-- NAVIGATION --}}
        <nav id="navMenu">

            <ul>

                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        About Us
                    </a>
                </li>

                <li>
                    <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">
                        Services
                    </a>
                </li>

                <li>
                    <a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">
                        Portfolio
                    </a>
                </li>

                <li>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        Contact Us
                    </a>
                </li>

            </ul>

        </nav>

        <a href="tel:+{{ $globalSetting->countryCode1->phonecode }}{{ $globalSetting->phone_1 }}"
            class="btn-contact-header">

            Enquiry Now

            <div class="circle-arrow">
                <i class="fa-solid fa-phone"></i>
            </div>

        </a>

    </div>

</header>
