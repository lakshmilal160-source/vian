   <!-- Header Navigation (`VIAN Consultancy Services` exact layout) -->
    <header class="navbar vian-header">
        <div class="nav-container">
            <!-- Left: VIAN Consultancy Services Logo (`assets/vian-02.png`) -->
            <a href="#hero" class="vian-brand-logo" title="VIAN Consultancy Services">
                <img src="assets/frontend/img/vian-02.png" alt="VIAN Consultancy Services" class="vian-logo-img">
            </a>

            <!-- Center Navigation Pill (`[ Our Expertise | About Us | Blog ]`) -->
            {{-- <div class="header-center-bar">
                <nav class="vian-pill-nav">
                    <a href="index.html" class="vian-nav-item">Home</a>
                    <a href="about.html" class="vian-nav-item">About Us</a>
                    <a href="services.html" class="vian-nav-item">Services</a>
                    <a href="portfolio.html" class="vian-nav-item">Portfolio</a>
                    <a href="contact.html" class="vian-nav-item">Contact Us</a>
                </nav>
            </div> --}}
            <div class="header-center-bar">
                <nav class="vian-pill-nav">
               <a href="{{ route('home') }}" class="vian-nav-item">Home</a>
               <a href="{{ route('about') }}" class="vian-nav-item">About Us</a>
               <a href="{{ route('services') }}" class="vian-nav-item">Services</a>
               <a href="{{ route('portfolio') }}" class="vian-nav-item">Portfolio</a>
               <a href="{{ route('contact') }}" class="vian-nav-item">Contact Us</a>
                </nav>
            </div>

            <!-- Right Action Pill (`[ -> ] Call Now`) + Mobile Menu Button -->
            <div class="nav-actions right-vian-action">
                <a href="tel:{{ $globalSetting->phone_1_country_code_id }} {{ $globalSetting->phone_1 }}" class="custom-solutions-pill-btn">
                    <span class="arrow-circle-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </span>
                    <span class="pill-btn-text">Call Now</span>
                </a>

                <!-- Sleek Button-Type Mobile Menu Toggle Button (`i want button type mobile menu`) -->
                <button class="mobile-menu-toggle-btn" id="mobileMenuBtn" aria-label="Open Mobile Menu" title="Menu">
                    <span class="hamburger-bar bar-1"></span>
                    <span class="hamburger-bar bar-2"></span>
                    <span class="hamburger-bar bar-3"></span>
                </button>
            </div>
        </div>
    </header>

      <!-- Button-Type Mobile Dropdown / Drawer Menu (`i want button type mobile menu`) -->
    {{-- <div class="mobile-nav-menu" id="mobileNavMenu">
        <div class="mobile-nav-content">
            <a href="index.html" class="mobile-nav-btn"><span class="nav-dot">●</span> Home</a>
            <a href="about.html" class="mobile-nav-btn"><span class="nav-dot">●</span> About Us</a>
            <a href="services.html" class="mobile-nav-btn"><span class="nav-dot">●</span> Services</a>
            <a href="portfolio.html" class="mobile-nav-btn"><span class="nav-dot">●</span> Portfolio</a>
            <a href="contact.html" class="mobile-nav-btn"><span class="nav-dot">●</span> Contact Us</a>
        </div> --}}
    </div>
     <div class="mobile-nav-menu" id="mobileNavMenu">
        <div class="mobile-nav-content">
            <a href="{{ route('home') }}" class="mobile-nav-btn"><span class="nav-dot">●</span> Home</a>
            <a href="{{ route('about') }}" class="mobile-nav-btn"><span class="nav-dot">●</span> About Us</a>
            <a href="{{ route('services') }}" class="mobile-nav-btn"><span class="nav-dot">●</span> Services</a>
            <a href="{{ route('portfolio') }}" class="mobile-nav-btn"><span class="nav-dot">●</span> Portfolio</a>
            <a href="{{ route('contact') }}" class="mobile-nav-btn"><span class="nav-dot">●</span> Contact Us</a>
        </div>
    </div>