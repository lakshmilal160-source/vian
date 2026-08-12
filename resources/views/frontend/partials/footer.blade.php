<!-- Footer (Upgraded Multi-Column Enterprise & Engineering Footer `and footer`) -->
<footer class="footer">
    <div class="footer-top-accent"></div>
    <div class="footer-container">
        <div class="footer-main-grid">
            <!-- Brand & Mission -->
            <div class="footer-col brand-col">
                <div class="footer-logo">

                    <span>VIAN</span>
                </div>
                <p class="footer-mission">Empowering ambitious enterprises with state-of-the-art custom software, cloud
                    architecture, and scalable AI-driven ecosystems.</p>
                {{-- <div class="footer-social-links">
                        <a href="#hero" class="social-icon" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></a>
                        <a href="#hero" class="social-icon" aria-label="Twitter / X"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg></a>
                        <a href="#hero" class="social-icon" aria-label="GitHub"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg></a>
                        <a href="#hero" class="social-icon" aria-label="Dribbble"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M19.13 5.09C15.22 9.14 10 10.44 2.25 10.94"/><path d="M21.75 12.84c-6.62-1.41-12.14 1-16.38 6.32"/><path d="M8.56 2.75c4.37 6 6 9.42 8 17.72"/></svg></a>
                    </div> --}}
            </div>

            <!-- Column 2: Core Capabilities -->
            <div class="footer-col">
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="footer-nav-list">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>

            <!-- Column 3: Company -->
            <div class="footer-col">

                <h4 class="footer-heading">Our Services</h4>
                <ul class="footer-nav-list">
                    @forelse ($globalService as $service)
                        <li><a href="{{ route('services') }}">{{ $service->title }}</a></li>
                    @empty
                    @endforelse
                </ul>

            </div>

            <!-- Column 4: Contact Us -->
            <div class="footer-column">

    <h4 style="margin-bottom:20px;">Contact Us</h4>

    <div class="footer-contact-details">

        <div class="footer-contact-item">
            <i class="fa-solid fa-location-dot"></i>

            <p>
                {{ $globalSetting->address??"" }}
            </p>
        </div>

        <div class="footer-contact-item">
            <i class="fa-solid fa-envelope"></i>

            <a href="mailto:{{ $globalSetting->email??"" }}" class="link-item">
                {{ $globalSetting->email??"" }}
            </a>
        </div>

        <div class="footer-contact-item">
            <i class="fa-solid fa-phone"></i>

            <a href="tel:{{ $globalSetting->phone_1_country_code_id??"" }} {{ $globalSetting->phone_1??"" }}" class="link-item">
                +{{ $globalSetting->phone_1_country_code_id??"" }} {{ $globalSetting->phone_1??"" }}
            </a>
        </div>

    </div>

</div>

<style>
.footer-contact-details {
    display: flex;
    flex-direction: column;
}

.footer-contact-item {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 18px;
}

.footer-contact-item:last-child {
    margin-bottom: 0;
}

.footer-contact-item i {
    width: 20px;
    min-width: 20px;
    text-align: center;
}

.footer-contact-item p {
    margin: 0;
    line-height: 1.6;
}

/* MOBILE ONLY */
@media (max-width: 768px) {
    .footer-column {
        text-align: center;
    }

    .footer-contact-details {
        align-items: center;
    }

    .footer-contact-item {
        justify-content: center;
        width: 100%;
    }

    .footer-contact-item p,
    .footer-contact-item a {
        text-align: center;
    }
}
</style>
        </div>
<div class="footer-bottom center-align-footer">
    <p class="footer-copy center-copy">
        &copy; 2026 VIAN Consultancy Services. All rights reserved. Crafted with <i _ngcontent-ng-c2257550061="" class="fas fa-heart"></i> by <a href="https://sensationssolutions.com" style="color: inherit; text-decoration: none;">Sensations Solutions</a>
    </p>
</div>
    </div>
</footer>
