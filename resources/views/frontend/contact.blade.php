@extends('frontend.layouts.app')
@push('style')
    {{-- <link rel="stylesheet"  href="'contact-css.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/contact.css') }}">
@endpush
@section('contents')
    <section class="esper-banner-section" id="esperBannerHero">

        <!-- Banner two-column layout -->
        <div class="esper-banner-inner">

            <!-- LEFT: Typography column -->
            <div class="esper-text-side">


                <h1 class="esper-headline">
                    <span class="esper-h-line1">Get In Touch</span>
                    <span class="esper-h-line2">With Us</span>
                </h1>


            </div>

        </div>
    </section>


    <!-- ==========================================================================
                         SECTION 2: CONTACT FORM + INFO COLUMNS + GOOGLE MAP

                         Exact match of reference: Left = Send a Message form, Right = Call/Visit/Chat info,
                         Below = Full-width Google Maps embed
                         ========================================================================== -->
    <section class="contact-body-section" id="contactFormSection">
        <div class="contact-body-container">

            <!-- LEFT COLUMN: Send a Message Form -->
            <div class="contact-form-col">
                @if ($errors->any())
                    <div class="error-text">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="contact-form-card" id="contactForm" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="contact-form-grid">
                        <div class="contact-form-group">
                            <input type="text" name="name" id="fullName" class="contact-input" placeholder=" "
                                required value="{{ old('name') }}"/>
                            <label for="fullName" class="contact-label">Full Name</label>
                        </div>
                        <div class="contact-form-group">
                            <input type="email" name="email" id="emailAddress" class="contact-input" placeholder=" "
                                required value="{{ old('email') }}"/>
                            <label for="emailAddress" class="contact-label">Email Address</label>
                        </div>
                    </div>

                    <div class="contact-form-group">
                        <input type="text" name="phone" id="messageSubject" class="contact-input" placeholder=" "
                            required value={{ old('phone') }}>
                        <label for="messageSubject" class="contact-label">Phone</label>
                    </div>

                    <div class="contact-form-group textarea-group">
                        <textarea name="message" id="messageText" class="contact-input contact-textarea" rows="4" placeholder=" "
                            required >{{ old('message') }}</textarea>
                        <label for="messageText" class="contact-label">Message</label>
                    </div>

                    <div class="form-row">
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}">
                        </div>
                    </div>
                    <!-- Submit button exactly styled like header button (`change submit button same as header button`) -->
                    <div class="contact-form-actions">
                        <button type="submit" class="custom-solutions-pill-btn contact-submit-pill-btn">
                            <span class="arrow-circle-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </span>
                            <span class="pill-btn-text">Send Message</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Divider Line -->
            <div class="contact-col-divider" aria-hidden="true"></div>

            <!-- RIGHT COLUMN: Contact Info Cards -->
            <div class="contact-info-col">

                <!-- Call Us -->
                <div class="cinfo-block">
                    <h3 class="cinfo-title">Call Us</h3>
                    <a href="tel:+12351251281" class="cinfo-action-link cinfo-link-orange">
                        <span class="cinfo-icon-circle cinfo-icon-orange">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.89 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.8 1.2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 5.55 5.55l1.28-1.34a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                        </span>
                        <span>(235) 325-1281</span>
                    </a>
                </div>

                <div class="cinfo-separator"></div>

                <!-- Visit Us -->
                <div class="cinfo-block">
                    <h3 class="cinfo-title">Visit Us</h3>
                    <a href="https://maps.google.com/?q=1234+Divi+St.+San+Francisco+CA" target="_blank" rel="noopener"
                        class="cinfo-action-link cinfo-link-orange">
                        <span class="cinfo-icon-circle cinfo-icon-orange">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </span>
                        <span>1234 Divi St. #111, San Francisco, CA</span>
                    </a>
                </div>

                <div class="cinfo-separator"></div>

                <!-- Live Chat -->
                <div class="cinfo-block">
                    <h3 class="cinfo-title">Live Chat</h3>
                    <button type="button" class="cinfo-action-link cinfo-link-orange cinfo-chat-btn" id="startChatBtn">
                        <span class="cinfo-icon-circle cinfo-icon-orange">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                        </span>
                        <span>Start Chat</span>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- ==========================================================================
                         SECTION 3: FULL-WIDTH GOOGLE MAPS EMBED
                         Exact match of reference screenshot map section below the form.
                         ========================================================================== -->
    <section class="contact-map-section" id="mapSection">
        <div class="contact-map-wrapper">
            <iframe class="contact-map-iframe"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.3570200527893!2d-122.41941558468175!3d37.77492997975906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c6c8f4233%3A0xb10ed6d9b5050fa5!2sSan%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1623000000000!5m2!1sen!2sus"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                title="VIAN Consultancy Services Location - San Francisco, CA">
            </iframe>
        </div>
    </section>
@endsection
@push('script')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
