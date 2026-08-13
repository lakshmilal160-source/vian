@extends('frontend.layouts.app')
@section('contents')
    <!-- Sticky Hero Stage where scrolling moves the hands inside to hide content and meet -->
    <section class="hero-stage-container" id="hero">
        <div class="hero-sticky-viewport">

            <!-- Sleek IT Company Architecture Ring Ecosystem behind text (Simple & Clean) -->
            <div class="it-tech-ecosystem" id="itTechEcosystem">
                <!-- Soft clean central glow -->
                <div class="tech-glow-core"></div>

                <!-- Clean, Sophisticated Enterprise Orbit Rings -->
                <div class="clean-orbit-ring outer-orbit">
                    <span class="network-node node-cyan"></span>
                    <span class="network-node node-purple"></span>
                </div>
                <div class="clean-orbit-ring inner-orbit">
                    <span class="network-node node-blue"></span>
                </div>


            </div>

            <!-- Center Title Group (`Custom Software Solutions at an Affordable Cost`) -->
            <!-- As hands move inside when scrolling down, this content smoothly hides/blurs out (`to hide contant`) -->
            {{-- @forelse ($faqs as $faq) --}}
            <div class="hero-title-group" id="titleGroup">
                <h1 class="main-heading-new">
                    <span class="line-top">Custom Software</span>
                    <span class="line-middle purple-gradient-text">Solutions</span>
                    <span class="line-bottom">at an Affordable Cost</span>
                </h1>
                <p class="hero-sub-caption" id="subCaption">
                    Human domain expertise and white-gloss robotic intelligence uniting to architect clean, scalable IT
                    software.
                </p>
            </div>

            <!-- Darkening Overlay Mask right over Hero Text while Hands glide over top (`add overlay on it`) -->
            <div class="hero-text-overlay" id="heroTextOverlay"></div>

            <!-- Hands Stage Container -->
            <div class="hands-stage" id="handsStage">
                <!-- Left Hand: Human Hand reaching from the left (`assets/human_hand_left.png`) -->
                <div class="hand-wrapper left-hand" id="leftHandWrapper">
                    <div class="hand-visual">
                        <!-- AI Generated PNG Hand -->
                        <img src="assets/frontend/img/human_hand_left.png" alt="Human Hand reaching from left"
                            class="hand-img img-human-left" id="leftHandImg" onerror="this.style.display='none'">

                        <!-- Procedural Vector SVG Fallback/Alternative Human Hand -->
                        <div class="svg-hand-container" id="leftHandSvg" style="display: none;">
                            <svg viewBox="0 0 600 250" class="vector-arm vector-human-left">
                                <defs>
                                    <linearGradient id="skinGradLeft" x1="0%" y1="0%" x2="100%"
                                        y2="0%">
                                        <stop offset="0%" stop-color="#cca080" />
                                        <stop offset="30%" stop-color="#e0b190" />
                                        <stop offset="65%" stop-color="#eac0a3" />
                                        <stop offset="100%" stop-color="#f5d0b5" />
                                    </linearGradient>
                                    <linearGradient id="skinShadeLeft" x1="0%" y1="0%" x2="0%"
                                        y2="100%">
                                        <stop offset="0%" stop-color="#ffffff" stop-opacity="0.25" />
                                        <stop offset="100%" stop-color="#000000" stop-opacity="0.18" />
                                    </linearGradient>
                                </defs>
                                <!-- Forearm entering from left -->
                                <path d="M0 65 C90 70 170 85 240 100 L260 165 C180 180 100 175 0 165 Z"
                                    fill="url(#skinGradLeft)" />
                                <path d="M0 65 C90 70 170 85 240 100 L260 165 C180 180 100 175 0 165 Z"
                                    fill="url(#skinShadeLeft)" />
                                <!-- Wrist & Palm -->
                                <path d="M240 100 C290 102 340 105 380 112 L400 165 C350 185 290 180 260 165 Z"
                                    fill="url(#skinGradLeft)" />
                                <!-- Folded lower fingers -->
                                <path d="M380 135 C405 150 430 165 415 185 C400 200 375 180 365 165" fill="none"
                                    stroke="url(#skinGradLeft)" stroke-width="22" stroke-linecap="round" />
                                <path d="M365 145 C385 160 405 180 390 195 C380 205 355 185 350 170" fill="none"
                                    stroke="url(#skinGradLeft)" stroke-width="18" stroke-linecap="round" />
                                <!-- Extended Index Finger reaching right towards center -->
                                <g class="human-index-group">
                                    <path d="M380 112 C420 114 470 117 520 120 L522 136 C470 134 420 133 380 132 Z"
                                        fill="url(#skinGradLeft)" />
                                    <path d="M380 112 C420 114 470 117 520 120 L522 136 C470 134 420 133 380 132 Z"
                                        fill="url(#skinShadeLeft)" />
                                    <path d="M520 120 C555 122 580 124 595 124 C580 128 555 133 522 136 Z"
                                        fill="url(#skinGradLeft)" />
                                    <!-- Fingertip glow spot -->
                                    <circle cx="592" cy="124" r="6" fill="#fffaf0" opacity="0.8" />
                                </g>
                            </svg>
                        </div>
                    </div>

                </div>

                <!-- Center IT Company Fingertip Meeting Animation (Clean, Standard Quantum Energy Ripples) -->
                <div class="synapse-spark-zone" id="sparkZone">
                    <canvas id="synapseCanvas" class="synapse-canvas"></canvas>

                    <!-- Clean Corporate IT Singularity Core -->
                    <div class="spark-light-core" id="sparkCore"></div>

                    <!-- Ultra-Clean Concentric Quantum Energy Ripples -->
                    <div class="quantum-ring ripple-1"></div>
                    <div class="quantum-ring ripple-2"></div>
                    <div class="quantum-ring ripple-3"></div>

                    <!-- Scroll Down Box right under the fingertip meeting animation (`under annimation`) -->
                    <div class="touch-scroll-prompt" id="touchScrollDownPrompt"
                        onclick="window.scrollBy({top: 600, behavior: 'smooth'})" title="Scroll Down To Explore">
                        <div class="mouse-icon">
                            <span class="mouse-wheel"></span>
                        </div>
                        <span class="prompt-text">Scroll Down To Explore</span>
                        <div class="animated-arrow-down">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Right Hand: White Glossy Robotic Hand reaching from right (`assets/robotic_hand_right.png`) -->
                <div class="hand-wrapper right-hand" id="rightHandWrapper">
                    <div class="hand-visual">
                        <!-- AI Generated PNG Hand -->
                        <img src="assets/frontend/img/robotic_hand_right.png"
                            alt="Sleek White Ceramic Robotic Hand pointing left" class="hand-img img-robotic-right"
                            id="rightHandImg" onerror="this.style.display='none'">

                        <!-- Procedural Vector SVG Fallback/Alternative White Glossy Robotic Arm -->
                        <div class="svg-hand-container" id="rightHandSvg" style="display: none;">
                            <svg viewBox="0 0 600 250" class="vector-arm vector-robotic-right">
                                <defs>
                                    <linearGradient id="whiteCeramicGrad" x1="100%" y1="0%" x2="0%"
                                        y2="0%">
                                        <stop offset="0%" stop-color="#475569" />
                                        <stop offset="30%" stop-color="#e2e8f0" />
                                        <stop offset="65%" stop-color="#ffffff" />
                                        <stop offset="100%" stop-color="#f8fafc" />
                                    </linearGradient>
                                    <linearGradient id="purpleChrome" x1="0%" y1="0%" x2="100%"
                                        y2="100%">
                                        <stop offset="0%" stop-color="#581c87" />
                                        <stop offset="100%" stop-color="#9333ea" />
                                    </linearGradient>
                                    <filter id="purpleGlow">
                                        <feGaussianBlur stdDeviation="3" result="coloredBlur" />
                                        <feMerge>
                                            <feMergeNode in="coloredBlur" />
                                            <feMergeNode in="SourceGraphic" />
                                        </feMerge>
                                    </filter>
                                </defs>
                                <!-- Forearm ceramic shell -->
                                <path d="M600 60 L420 70 L360 105 L340 145 L420 170 L600 160 Z"
                                    fill="url(#whiteCeramicGrad)" stroke="#cbd5e1" stroke-width="2" />
                                <path d="M580 75 C520 75 460 85 410 105 L440 155 C490 145 540 145 590 145 Z" fill="#ffffff"
                                    opacity="0.95" />
                                <!-- Wrist Carbon & Purple LED Joint -->
                                <circle cx="330" cy="125" r="32" fill="#1e293b" stroke="#9333ea"
                                    stroke-width="2.5" filter="url(#purpleGlow)" />
                                <circle cx="330" cy="125" r="18" fill="#a855f7" opacity="0.9"
                                    filter="url(#purpleGlow)" />
                                <!-- Palm & Lower fingers -->
                                <path d="M300 100 L230 105 L190 135 L210 175 L270 185 L305 155 Z"
                                    fill="url(#whiteCeramicGrad)" stroke="#94a3b8" stroke-width="2" />
                                <!-- Folded fingers (Middle, Ring, Pinky) -->
                                <path d="M230 140 C205 150 180 165 195 185 C210 200 235 180 245 165" fill="none"
                                    stroke="url(#whiteCeramicGrad)" stroke-width="22" stroke-linecap="round" />
                                <circle cx="220" cy="165" r="4" fill="#a855f7" />
                                <path d="M240 155 C220 168 200 185 215 205 C230 220 255 195 260 180" fill="none"
                                    stroke="url(#whiteCeramicGrad)" stroke-width="18" stroke-linecap="round" />
                                <!-- Extended Index Finger reaching left towards center -->
                                <g class="robotic-index-group">
                                    <path d="M230 110 L150 112 L145 132 L230 132 Z" fill="url(#whiteCeramicGrad)"
                                        stroke="#64748b" stroke-width="1.5" />
                                    <circle cx="148" cy="122" r="7" fill="#1e293b" stroke="#a855f7"
                                        stroke-width="1.5" filter="url(#purpleGlow)" />
                                    <path d="M145 113 L75 116 L72 131 L145 131 Z" fill="url(#whiteCeramicGrad)"
                                        stroke="#64748b" stroke-width="1.5" />
                                    <circle cx="74" cy="123.5" r="6" fill="#1e293b" stroke="#a855f7"
                                        stroke-width="1.5" filter="url(#purpleGlow)" />
                                    <path d="M72 116 C45 117 20 120 5 124 C20 128 45 130 72 130 Z"
                                        fill="url(#whiteCeramicGrad)" stroke="#a855f7" stroke-width="1.5" />
                                    <!-- Glowing tip LED -->
                                    <circle cx="6" cy="124" r="5" fill="#c084fc"
                                        filter="url(#purpleGlow)" />
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Hero Footer & Scroll Status Bar -->
            <div class="hero-footer-bar">


                <div class="scroll-down-indicator" id="scrollPrompt"
                    onclick="window.scrollBy({top: 450, behavior: 'smooth'})" title="Scroll down">
                    <div class="chevron-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- SECTION 5: VIAN / Medisync Fanned Ecosystem Design (Exact Match of Bottom Screenshot) -->
    <section class="fanned-ecosystem-section" id="fanned-ecosystem-section">
        <canvas id="fannedWaveCanvas" class="fanned-wave-bg"></canvas>
        <div class="ecosystem-container">

            <!-- Part 1: About Tag & Highlighted Philosophy Paragraph -->
            <div class="ecosystem-about-header">
                <span class="ecosystem-tag">✦ ABOUT VIAN CONSULTANCY</span>
                <p class="ecosystem-main-statement">
                    VIAN Consultancy Services combines technology and domain expertise for intelligent digital
                    transformation you trust. We built <span class="cyan-highlight">a custom software & KPO platform that
                        protects your data</span> while delivering enterprise-grade AI automation. Every solution is backed
                    by engineering excellence and <span class="cyan-highlight">every architecture is designed for your
                        unique business operations.</span>
                </p>
            </div>

            <!-- Part 2: Horizontal Divider with Center Cyan Circle Icon (`--- (✦) ---`) -->
            <div class="ecosystem-divider">
                <div class="divider-line left-line"></div>

                <div class="divider-line right-line"></div>
            </div>

            <!-- Part 3: What's Inside & Main Title -->
            <div class="ecosystem-inside-header">
                <span class="ecosystem-tag">✦ WHAT'S INSIDE VIAN CONSULTANCY</span>
                <h2 class="ecosystem-title">Built to scale and optimize<br>your digital business</h2>
            </div>

            <!-- Part 4: Fanned-Out 4 Glassmorphic Cards Deck (`Habit tracker`, `Risk prediction`, etc. style) -->
            <div class="fanned-cards-deck">
                @forelse ($services as $index => $service)
                    @php
                        $classes = [
                            'card-tilt-left-far',
                            'card-tilt-left-inner',
                            'card-tilt-right-inner',
                            'card-tilt-right-far',
                        ];

                        $cardClass = $classes[$index % 4];
                    @endphp
                    <!-- Card 1: Far Left (-14deg tilt) -->
                    <div class="fanned-card {{ $cardClass }}">
                        <a href="{{ route('services') }}" class="vian-nav-item">
                            <div class="fanned-card-img">
                                <img src="{{ asset('storage/' . $service->image) }}" alt="Custom Software Development">
                            </div>
                            <div class="fanned-card-bottom-pill">
                                <span class="pill-label">{{ $service->title }}</span>
                            </div>
                        </a>
                    </div>
                @empty
                    <<div class="fanned-card card-tilt-left-far">No Services
            </div>
            @endforelse
        </div>

        <!-- Part 5: Bottom Action Button (Exact Twin of Header Button) -->
        <div class="ecosystem-action-row">
            <a href="{{ route('services') }}" class="custom-solutions-pill-btn bottom-hero-btn">
                <span class="arrow-circle-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </span>
                <span class="pill-btn-text">Start Your Transformation</span>
            </a>
        </div>

        </div>

    </section>
    <!-- SECTION 7: Dreamy Lavender Cloud AI Agent Banner Section (Exact Match of Screenshot) -->
    <section class="dreamy-cloud-section" id="dreamy-cloud-section">

        <!-- Layered Animated Cloud Atmosphere & Floating Background Mist/Sparkles -->
        <div class="cloud-atmosphere" aria-hidden="true">
            <!-- Drifting Foreground Mist & Puff 1 -->
            <div class="drifting-cloud drift-1"></div>
            <!-- Drifting Foreground Mist & Puff 2 -->
            <div class="drifting-cloud drift-2"></div>
            <!-- Drifting Foreground Mist & Puff 3 -->
            <div class="drifting-cloud drift-3"></div>
            <!-- Drifting Foreground Mist & Puff 4 -->
            <div class="drifting-cloud drift-4"></div>
            <!-- Floating Ethereal Sparkles across the cloud sky -->
            <span class="cloud-sparkle sparkle-1">✦</span>
            <span class="cloud-sparkle sparkle-2">✦</span>
            <span class="cloud-sparkle sparkle-3">✦</span>
        </div>

        <div class="cloud-content-container">



            <!-- Editorial Serif Main Title (`Create browser agents for repetitive tasks`) -->
            <h2 class="cloud-main-heading">
                Create browser agents<br>for repetitive tasks
            </h2>

            <!-- Subtitle Paragraph -->
            <p class="cloud-subtext">
                Automate your repetitive browser tasks and SOPs with fast, reliable browser agents.<br>
                Describe your workflow, and Cognition builds an AI agent to automate it seamlessly.
            </p>

        </div>
    </section>

    <section class="our-works-showcase-section" id="our-works">
        <div class="works-showcase-container">

            <div class="works-carousel-wrapper">
                <!-- Carousel Track (3 Cards Side-by-Side on Desktop) -->
                <div class="works-carousel-track" id="worksCarouselTrack">
                    <!-- Slide 1 -->
                    @forelse ($portfolios as $portfolio)
                        <div class="works-slide-card">
                            <div class="slide-badge">✦ {{ $portfolio->title }}</div>
                            <h4 class="slide-title">{{ $portfolio->title }}</h4>
                            <p class="slide-desc">
                                {{ \Illuminate\Support\Str::limit(strip_tags($portfolio->description), 120) }}</p>
                            <div class="slide-meta">
                                <a href="{{ route('portfolio') }}"
                                    class="custom-solutions-pill-btn slide-card-read-more-btn">
                                    <span class="arrow-circle-btn">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </span>
                                    <span class="pill-btn-text">Read more</span>
                                </a>
                            </div>


                        </div>
                    @empty
                    @endforelse
                </div>




                <!-- Indicator Dots & Navigation Arrows -->
                <div class="carousel-stage-controls">
                    <button class="carousel-circle-btn prev-btn" id="worksPrevBtn" aria-label="Previous Slide">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>
                    <div class="carousel-dots-row" id="worksCarouselDots">
                        <span class="carousel-dot active" data-index="0"></span>
                        <span class="carousel-dot" data-index="1"></span>
                        <span class="carousel-dot" data-index="2"></span>
                        <span class="carousel-dot" data-index="3"></span>
                    </div>
                    <button class="carousel-circle-btn next-btn" id="worksNextBtn" aria-label="Next Slide">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </section>

    <!-- SECTION 6: Creative Infographic Slide (Exact Match of Screenshot) -->
    <section class="creative-infographic-section" id="creative-infographic">
        <!-- Decorative vertical line on the far left edge (`same design`) -->
        <div class="infographic-side-track">
            <span class="track-dot top-dot"></span>
            <span class="track-line"></span>
            <span class="track-dot bottom-dot"></span>
        </div>

        <div class="infographic-container">

            <!-- Column 1: Left Text Block -->
            <div class="infographic-left-col">
                <h2 class="infographic-main-title">We are a team of designers & developers — not genies</h2>
                <span class="infographic-subtitle"> But we
                    make wishes come true!</span>
                <p class="infographic-desc">
                    The Difference We Deliver Most software companies start with technology. We start with your business.
                </p>
            </div>

            <!-- Column 2: Center Orbiting Circle Infographic Hub -->
            <div class="infographic-center-col">
                <div class="infographic-orbit-system">
                    <!-- Outer Orbiting Ring with dots and squares -->
                    <div class="orbit-ring-outer">
                        <span class="orbit-dot dot-top"></span>
                        <span class="orbit-dot dot-right"></span>
                        <span class="orbit-square square-bottom-left"></span>
                        <span class="orbit-dot dot-gray-left"></span>
                    </div>
                    <!-- Inner Orbiting Arc with small dots -->
                    <div class="orbit-ring-inner">
                        <span class="orbit-dot dot-inner-top"></span>
                        <span class="orbit-dot dot-inner-bottom"></span>
                    </div>
                    <!-- Solid Central Black/Dark Hub Circle (`64% / Your text here`) -->
                    <div class="infographic-core-circle">
                        {{-- <span class="core-number" id="infographicCounter"> --}}
                        <img src="{{ asset('assets/frontend/img/home.webp') }}" alt="Loading" class="loading-gif"
                            width="300" height="300">
                        {{-- </span> --}}

                    </div>
                </div>
            </div>

            <!-- Column 3: Right Stacked Circular Icon Items (Exact Match of Screenshot) -->
            <div class="infographic-right-col">

                <!-- Item 1: Database / Stack Icon (`Creative Title Text`) -->
                <div class="infographic-row-item">
                    <div class="row-icon-circle">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 2C6.48 2 2 3.79 2 6v12c0 2.21 4.48 4 10 4s10-1.79 10-4V6c0-2.21-4.48-4-10-4zm0 2c4.41 0 8 1.34 8 2s-3.59 2-8 2-8-1.34-8-2 3.59-2 8-2zm0 6c4.41 0 8 1.34 8 2s-3.59 2-8 2-8-1.34-8-2 3.59-2 8-2zm0 6c4.41 0 8 1.34 8 2s-3.59 2-8 2-8-1.34-8-2 3.59-2 8-2z" />
                        </svg>
                    </div>
                    <div class="row-text-content">
                        <h4 class="row-item-title">Business-First Thinking</h4>
                        <p class="row-item-desc">Some transactions may be subject to tax that may be added to the list
                            price handling</p>
                    </div>
                </div>

                <!-- Item 2: Sun / Brightness Icon (`Creative Title Text`) -->
                <div class="yu infographic-row-item">
                    <div class="row-icon-circle">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="4" />
                            <path d="M12 2v2" />
                            <path d="M12 20v2" />
                            <path d="m4.93 4.93 1.41 1.41" />
                            <path d="m17.66 17.66 1.41 1.41" />
                            <path d="M2 12h2" />
                            <path d="M20 12h2" />
                            <path d="m6.34 17.66-1.41 1.41" />
                            <path d="m19.07 4.93-1.41 1.41" />
                        </svg>
                    </div>
                    <div class="row-text-content">
                        <h4 class="row-item-title">Built for Real Users</h4>
                        <p class="row-item-desc">Some transactions may be subject to tax that may be added to the list
                            price handling</p>
                    </div>
                </div>

                <!-- Item 3: Plane / Rocket Icon (`Creative Title Text`) -->
                <div class="infographic-row-item">
                    <div class="row-icon-circle">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" />
                        </svg>
                    </div>
                    <div class="row-text-content">
                        <h4 class="row-item-title">Affordable Cost</h4>
                        <p class="row-item-desc">Some transactions may be subject to tax that may be added to the list
                            price handling</p>
                    </div>
                </div>

            </div>
    </section>
    <!-- SECTION 8: FAQ Section (Exact Design) -->
    <section class="faq-section" id="faq-section">
        {{-- 
        <div class="faq-container">
            <h2 class="faq-main-title">FAQ's</h2>

            <div class="faq-accordion">
                <!-- FAQ Item 1 -->
                @forelse ($faqs as $faq)
                    <div class="faq-item">
                        <div class="faq-header">
                            <span class="faq-toggle-icon">+</span>
                            <h3 class="faq-question-text">{{ $faq->question }}</h3>
                        </div>
                        <div class="faq-body">
                            <p class="faq-answer">{{ $faq->answer }}</p>
                        </div>
                    @empty
                @endforelse

            </div>
            </div> --}}
        <div class="faq-container">
            <h2 class="faq-main-title">FAQ's</h2>

            <div class="faq-accordion">
                <!-- FAQ Item 1 -->
                @forelse ($faqs as $index=>$faq)
                    <div class="faq-item {{ $index == 1 ? 'active' : '' }}">
                        <div class="faq-header ">
                            <span class="faq-toggle-icon">+</span>
                            <h3 class="faq-question-text">{{ $faq->question }}</h3>
                        </div>
                        <div class="faq-body">
                            <p class="faq-answer">{{ $faq->answer }}</p>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section>

    <!-- SECTION 9: Bottom Statement Heading Section (`add this headiig bottom`) -->
    <section class="bottom-cta-heading-section" id="bottom-statement">
        <div class="statement-header-area">
            <!-- Layered Animated Cloud Atmosphere & Floating Background Mist/Sparkles -->
            <div class="cloud-atmosphere" aria-hidden="true">
                <!-- Drifting Foreground Mist & Puff 1 -->
                <div class="drifting-cloud drift-1"></div>
                <!-- Drifting Foreground Mist & Puff 2 -->
                <div class="drifting-cloud drift-2"></div>
                <!-- Drifting Foreground Mist & Puff 3 -->
                <div class="drifting-cloud drift-3"></div>
                <!-- Drifting Foreground Mist & Puff 4 -->
                <div class="drifting-cloud drift-4"></div>
                <!-- Floating Ethereal Sparkles across the cloud sky -->
                <span class="cloud-sparkle sparkle-1">✦</span>
                <span class="cloud-sparkle sparkle-2">✦</span>
                <span class="cloud-sparkle sparkle-3">✦</span>
            </div>

            <div class="cta-heading-container">
                <div class="statement-grid-container">
                    <!-- Row 1: Let's (Left only) -->
                    <div class="statement-grid-cell blue-text">Let’s</div>
                    <div class="statement-grid-cell"></div>

                    <!-- Row 2: create -> experiences -->
                    <div class="statement-grid-cell blue-text">create <span class="arrow-symbol">→</span></div>
                    <div class="statement-grid-cell dark-text">Experiences</div>

                    <!-- Row 3: that ace it with (Right only) -->
                    <div class="statement-grid-cell"></div>
                    <div class="statement-grid-cell dark-text">that ace it with</div>

                    <!-- Row 4: your fans. (Right only) -->
                    <div class="statement-grid-cell"></div>
                    <div class="statement-grid-cell dark-text">your fans.</div>
                </div>
            </div>
        </div>

        <div class="cta-heading-container">
            <!-- Contact Form Card Under Heading (`remove vetical lines bg from contact-form-card`) -->
            <div class="contact-form-wrapper-cta">
                <!-- Background animation removed -->
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

                    <div class="contact-form-col">

                        <div class="contact-form-grid">
                            <div class="contact-form-group">
                                <input type="text" name="name" id="fullName" class="contact-input"
                                    placeholder=" " required value="{{ old('name') }}" />
                                <label for="fullName" class="contact-label">Full Name</label>
                            </div>
                            <div class="contact-form-group">
                                <input type="email" name="email" id="emailAddress" class="contact-input"
                                    placeholder=" " required value="{{ old('email') }}" />
                                <label for="emailAddress" class="contact-label">Email Address</label>
                            </div>
                        </div>

                        <div class="contact-form-group">
                            <input type="text" name="phone" id="messageSubject" class="contact-input"
                                placeholder=" " required value={{ old('phone') }}>
                            <label for="messageSubject" class="contact-label">Phone</label>
                        </div>

                        <div class="contact-form-group textarea-group">
                            <textarea name="message" id="messageText" class="contact-input contact-textarea" rows="2" placeholder=" "
                                required>{{ old('message') }}</textarea>
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
        </div>
    </section>

    <!-- SECTION 9.5: Bottom Client & Partners Carousel (`add client carouse in bottom`) -->
    <section class="client-showcase-section" id="client-showcase">
        <div class="client-showcase-container">


            <!-- Infinite Marquee Ticker of Top Industry Brand Image Logos -->
            <div class="client-marquee-wrapper">
                <div class="client-marquee-track">
                    <!-- Group 1 -->
                    @forelse ($clients as $client)
                        <div class="client-logo-card">
                            <img src="{{ asset('storage/' . $client->logo) }}" class="client-logo-img">
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>


        </div>
    </section>
@endsection
@push('script')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
