@extends('frontend.layouts.app')

@section('title', 'Custom Software Solutions')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>
                Custom Software<br>
                <span class="italic-cyan">Solutions</span> at an<br>
                Affordable Cost
                <svg class="arrow-svg" viewBox="0 0 100 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 35C20 10 40 40 60 15M60 15L55 18M60 15L65 20" stroke="#00f2ff" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </h1>
            <p class="hero-desc">
                {{ $contents['description'] ? Str::of($contents['description']->description)->stripTags() : '' }}</p>

            <a href="{{ route('contact') }}" class="btn-get-started">
                ENQUIRY NOW <div class="circle-arrow"><i class="fa-solid fa-arrow-right"></i></div>
            </a>

            <div class="hero-visual">
                <div class="arc-glow"></div>
                <p class="partner-text">Trusted by businesses worldwide to innovate, scale, and succeed.</p>
                <div class="partners-grid">
                    <div class="partner-row">
                        @foreach ($clients->take(4) as $client)
                            <div class="partner-item">
                                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" width="150"
                                    height="150" loading="lazy">
                            </div>
                        @endforeach
                    </div>

                    <div class="partner-row" style="">
                        @foreach ($clients->skip(4) as $client)
                            <div class="partner-item">
                                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" width="150"
                                    height="150" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services">
        <div class="container">
            <h2>Our services</h2>
            <div class="service-accordion">
                @foreach ($services as $key => $service)
                    <!-- Web Design (Expanded) -->
                    <div class="accordion-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="accordion-header">
                            <h3>{{ $service->title }}</h3>
                            <span class="plus">{{ $key == 0 ? '-' : '>' }}</span>
                        </div>
                        <div class="accordion-content">
                            <div class="service-details">
                                <div class="service-icon">
                                    <img src={{ asset('storage/' . $service->icon) }} width="60" height="60" loading="lazy">
                                </div>
                                <div class="service-info">
                                    <p>{{ $service->description }}</p>

                                </div>
                                <div class="service-action">
                                    <a href="{{ route('services') }}" class="btn-choose">CHOOSE SERVICE <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Web Development -->

            </div>
        </div>
    </section>

    <!-- Team/Genies Section -->
    <section class="genies">
        <div class="container">
            <h2>
                We are a team of designers and<br>
                developers — <span class="italic-cyan serif">not genies</span>, but we<br>
                <span class="cyan-text">make wishes come true!</span>
            </h2>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="container">
            <div class="hiw-header">
                <div class="hiw-header-left">
                    <span class="hiw-label">// Why Us</span>
                    <h2>The Difference We Deliver Most software companies start with
                        technology. <span class="cyan-text">We start with your business.</span></h2>

                </div>
                <div class="hiw-header-right">
                    <a href="{{ route('about') }}" class="btn-cyan-pill">Read More<i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="process-container">
                <!-- Step 01 -->
                <div class="process-card">
                    <div class="step-num">01</div>
                    <div class="step-inner">
                        <div class="step-icon"><i class="fa-solid fa-comment-dots"></i></div>
                        <h3>
                            Business-First Thinking</h3>
                        <p>We understand business, operations, and people—not just code. Many of us have built
                            products and companies ourselves, so we think like founders and operators, not just
                            developers.</p>
                    </div>
                </div>

                <!-- Step 02 -->
                <div class="process-card featured">
                    <div class="step-num">02</div>
                    <div class="step-inner">
                        <div class="step-icon"><i class="fa-solid fa-code"></i></div>
                        <h3>Built for Real Users</h3>
                        <p>We design every system with the end user in mind. We spend time understanding how people
                            actually use systems, what slows them down, and what frustrates them. Simple flows,
                            clean screens, and practical features ensure fast adoption and high productivity.</p>
                        <a href="{{ route('portfolio') }}" class="step-link">Start Your Project <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Step 03 -->
                <div class="process-card">
                    <div class="step-num">03</div>
                    <div class="step-inner">
                        <div class="step-icon"><i class="fa-solid fa-rocket"></i></div>
                        <h3>
                            Affordable Cost</h3>
                        <p>Great systems don’t have to come with extreme price tags. Our pricing is driven by value,
                            not by complexity. By combining smart design, and efficient development practices, we
                            keep costs practical without compromising quality.</p>
                    </div>
                </div>

                <!-- Visual Connection (Dots & Waves) -->
                <div class="process-dots">
                    <span class="p-dot dot-1"></span>
                    <span class="p-dot dot-2"></span>
                    <span class="p-dot dot-3"></span>
                    <span class="p-dot dot-4"></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Platform Section -->
    <section class="trusted-platform">
        <div class="container">
            <div class="tp-grid">
                <div class="tp-left">
                    <div class="tp-image-container">
                        <img src="{{ asset('storage/' . $contents['about']->image) }}" alt="Trusted Platform Diagram"
                            class="tp-image" loading="lazy">
                    </div>
                </div>
                <div class="hiw-header">
                    <div class="hiw-header-left">
                        <span class="hiw-label">// About Us</span>
                        <h2>{!! $contents['about']->title !!}<span class="cyan-text"></span></h2>
                        <p>{!! $contents['about']->description !!}</p>

                        <div class="tp-actions">
                            <a href="{{ route('about') }}" class="btn-cyan-pill">Read More <i
                                    class="fa-solid fa-arrow-right"></i></a>

                        </div>
                    </div>

                </div>

            </div>


        </div>
    </section>

    <!-- Team, Stats & Portfolio Section -->
    <section class="team-portfolio">
        <div class="container">

            <!-- Team Photo Banner -->
            {{-- <div class="team-banner">
                <img src="{{ asset('storage/' . $contents['our_team']->image) }}" alt="Our Team"
                    class="team-banner-img">
                <div class="team-banner-overlay"></div>
            </div> --}}



            <!-- Portfolio Heading -->
            <section class="genies">
                <div class="container">
                    <h2>
                        Our Works
                    </h2>
                </div>
            </section>


            <!-- Portfolio Carousel -->
            <div class="portfolio-carousel-wrap">
                <div class="portfolio-carousel" id="portfolioCarousel">
                    <div class="portfolio-slide">
                        @foreach ($portfolios as $key => $portfolio)
                            <div class="portfolio-card {{ $key == 2 ? 'active' : 'side' }}">
                                                        <a href="{{route('portfolio')}}">

                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}"
                                    class="portfolio-card-img" loading="lazy">
                                <div class="portfolio-card-overlay"></div>
                                <span class="portfolio-card-label">{{ $portfolio->title }}</span>
                                                        </a>

                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Carousel Nav -->
                <div class="portfolio-nav">
                    <button class="portfolio-btn" id="portfolioPrev"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="portfolio-info">
                        <p class="portfolio-info-title cyan-text" id="portfolioTitle">Agency ERP</p>
                        <p class="portfolio-info-desc" id="portfolioDesc">Comprehensive management software for
                            modern creative and digital agencies.</p>
                    </div>
                    <button class="portfolio-btn" id="portfolioNext"><i class="fa-solid fa-chevron-right"></i></button>
                </div>

                <!-- View More -->
                <div class="portfolio-more">
                    <a href="{{ route('portfolio') }}" class="btn-cyan-pill">View more</a>
                </div>
            </div>

            <!-- Featured Project Showcase -->
            <div class="portfolio-showcase">
                {{-- <div class="showcase-content">
                    <div class="showcase-text">
                        <h2 style="font-size: 40px;">Find a better card deal <br><span class="cyan-text">in few easy
                                steps.</span></h2>
                        <p>Arcu tortor, purus in mattis at sed integer faucibus. Aliquet quis aliquet eget mauris
                            tortor. Aliquet ultrices ac, ametau.</p>
                        <a href="{{ route('contact') }}" class="btn-get-started">Get Started</a>
                    </div>
                    <div class="showcase-visual">
                        <div class="visual-rings">
                            <div class="ring ring-1"></div>
                            <div class="ring ring-2"></div>
                            <div class="ring ring-3"></div>
                        </div>

                        <!-- Floating Card 1: Scan -->
                        <div class="floating-card card-scan">
                            <div class="card-icon"><i class="fa-solid fa-qrcode"></i></div>
                            <h4>Scan Credit Cards</h4>
                            <p>Scan your credit card in 4 minutes.</p>
                        </div>

                        <!-- Floating Card 2: Analysis -->
                        <div class="floating-card card-analysis">
                            <div class="card-header">
                                <h4>Online Analysis</h4>
                                <span class="time-range">1 Month <i class="fa-solid fa-chevron-down"></i></span>
                            </div>
                            <div class="analysis-stats">
                                <div class="stat">
                                    <span class="stat-value">$ 2,334.67</span>
                                    <span class="stat-label">Income</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-value">$ 5.31M</span>
                                    <span class="stat-label">Expenses</span>
                                </div>
                            </div>
                            <div class="analysis-graph">
                                <svg viewBox="0 0 200 60">
                                    <path d="M0,40 Q25,20 50,45 T100,30 T150,50 T200,35" fill="none" stroke="#00f2ff"
                                        stroke-width="2" />
                                </svg>
                            </div>
                            <div class="graph-labels">
                                <span>Jan</span><span>Feb</span><span
                                    class="active">Mar</span><span>Apr</span><span>May</span><span>Jun</span><span>Jul</span>
                            </div>
                        </div>

                        <!-- Floating Card 3: Pay Method -->
                        <div class="floating-card card-pay">
                            <div class="card-header">
                                <h4>Pay Method</h4>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            <div class="pay-icons">
                                <div class="pay-icon"><i class="fa-brands fa-paypal"></i></div>
                                <div class="pay-icon"><i class="fa-brands fa-apple"></i></div>
                                <div class="pay-icon"><i class="fa-brands fa-cc-visa"></i></div>
                                <div class="pay-icon"><i class="fa-brands fa-shopify"></i></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="testimonials-header">
                <h2>Client <span class="cyan-text">Feedback</span></h2>
                <p>Everything you need to accept card payments and grow your business anywhere on the planet.</p>
            </div>
            <div class="testimonials-carousel-wrap">
                <div class="testimonials-container">
                    <div class="testimonials-slider" id="testimonialSlider">
                        <!-- Testimonial 1 -->
                        @foreach ($testimonials as $testimonial)
                            <div class="testimonial-card">
                                <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                                <p class="quote-text">{{ $testimonial->message }}</p>
                                <div class="testimonial-author">
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Herman Jensen" loading="lazy">
                                    <div class="author-info">
                                        <h4>{{ $testimonial->name }}</h4>
                                        <p>
                                            @if ($testimonial->designation)
                                                {{ $testimonial->designation }},
                                            @endif
                                            {{ $testimonial->company }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- Carousel Controls -->
                <div class="carousel-controls">
                    <button class="carousel-btn prev" id="testimonialPrev"><i
                            class="fa-solid fa-arrow-left"></i></button>
                    <div class="carousel-dots" id="testimonialDots"></div>
                    <button class="carousel-btn next" id="testimonialNext"><i
                            class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="faq-header">
                <span class="hiw-label">// KPO</span>
                <h2>Knowledge Process Outsourcing</h2>
                <p>Our KPO services are built for businesses that rely on data, analysis, research, and domain
                    expertise to make critical decisions. We don’t just provide people—we design processes, systems,
                    and performance models that make knowledge work reliable and scalable.</p>
                <p>Our goal is to become a trusted extension of your team—handling knowledge work so you can focus
                    on strategy, growth, and innovation!</p>
            </div>
            <div class="faq-accordion-grid">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>
                            Understanding Your Knowledge Needs</h3>
                        <i class="fa-solid fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="faq-answer-box">
                            <p>We study what kind of knowledge work you need—research, analysis, documentation,
                                reporting, or decision support—and how it fits into your business.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Designing Smart Workflows</h3>
                        <i class="fa-solid fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="faq-answer-box">
                            <p>We structure workflows that make knowledge work clear, repeatable, and measurable,
                                without killing flexibility.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Building Skilled Teams</h3>
                        <i class="fa-solid fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="faq-answer-box">
                            <p>We recruit and train teams with the right mix of domain knowledge, analytical skills,
                                and process discipline.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Standardizing for Quality</h3>
                        <i class="fa-solid fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="faq-answer-box">
                            <p>We define standards, checks, and controls to ensure consistent, high-quality output.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>Technology Enablement</h3>
                        <i class="fa-solid fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="faq-answer-box">
                            <p>We use tools and platforms for collaboration, tracking, quality control, and
                                reporting.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h3>
                            Continuous Improvement</h3>
                        <i class="fa-solid fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="faq-answer-box">
                            <p>We regularly review performance, improve processes, and scale operations as your
                                needs grow</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-left">
                    <h2>Always
                        <br><span class="cyan-text">Here to</span>
                        <br>Help
                    </h2>
                    <p>Our team is ready to assist
                        whenever you need us</p>

                </div>
                <div class="contact-right">
                    <form class="contact-form" id="contactForm">

                        @csrf

                        <div class="form-row">

                            <input type="text" name="name" placeholder="Name" required>

                            <input type="email" name="email" placeholder="Email" required>

                        </div>

                        <div class="form-row">

                            <input type="text" name="phone" placeholder="Phone Number" class="full-width">

                        </div>

                        <div class="form-row">

                            <textarea name="message" placeholder="Message" required class="full-width"></textarea>

                        </div>
                        <div class="form-row">
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}">
                        </div>
                        </div>
                        <div class="form-submit">

                            <button type="submit" class="btn-send">

                                Send Message

                            </button>

                        </div>

                        {{-- RESPONSE --}}
                        <div id="contactResponse" class="mt-3"></div>

                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        const projects = @json($portfolioData);
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        $(document).ready(function() {

            $('#contactForm').submit(function(e) {
                e.preventDefault();

                let form = $(this);

                let submitBtn = form.find('button[type="submit"]');

                submitBtn.prop('disabled', true).text('Sending...');

                $.ajax({

                    url: "{{ route('contact.store') }}",
                    type: "POST",
                    data: form.serialize(),

                    success: function(response) {

                        $('#contactResponse').html(`
                    <div class="alert alert-success">
                        ${response.message}
                    </div>
                `);

                        form.trigger('reset');
                        grecaptcha.reset();

                    },

                    error: function(xhr) {

                        let errors = xhr.responseJSON.errors;

                        let errorHtml = '<div class="alert alert-danger"><ul>';

                        $.each(errors, function(key, value) {

                            errorHtml += `<li>${value[0]}</li>`;

                        });

                        errorHtml += '</ul></div>';

                        $('#contactResponse').html(errorHtml);

                    },

                    complete: function() {

                        submitBtn.prop('disabled', false).text('Send Message');

                    }

                });

            });

        });
    </script>
@endpush
