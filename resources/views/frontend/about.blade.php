@extends('frontend.layouts.app')
@push('style')
    {{-- <link rel="stylesheet" href="contact.css"> --}}
    {{-- <link rel="stylesheet" href="about.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/about.css') }}">
@endpush
@section('contents')
 <section class="esper-banner-section" id="esperBannerHero">
            <div class="esper-banner-inner" style="justify-content: center; text-align: center;">
                <div class="esper-text-side" style="width: 100%; max-width: 900px; margin: 0 auto; text-align: center;">
                    <h1 class="esper-headline" style="text-align: center;">
                        <span class="esper-h-line1" style="display: block;">Building Smarter </span>
                        <span class="esper-h-line2" style="display: block;"> Futures</span>
                    </h1>
                </div>
            </div>
        </section>

        <!-- ==========================================================================
             SECTION 2: EDITORIAL SPLIT CARD WITH OVERLAPPING IMAGE (`input_file_0.png` Top)
             ========================================================================== -->
        <section class="about-editorial-hero">
            <div class="editorial-beige-card">
                <!-- Rotating Circular Text Stamp (`TYPE HERE • TYPE HERE •`) -->
                <div class="editorial-circle-stamp">
                    <svg viewBox="0 0 100 100">
                        <path id="circlePath" d="M 50, 50 m -36, 0 a 36,36 0 1,1 72,0 a 36,36 0 1,1 -72,0" fill="none"/>
                        <text>
                            <textPath xlink:href="#circlePath">VIAN CONSULTANCY • VIAN • EXPERTISE • </textPath>
                        </text>
                    </svg>
                    <div class="stamp-center-dot"></div>
                </div>

              
                <h2 class="editorial-main-title">
                   Our Palette of Expertise
                </h2>

                <div class="editorial-paragraph-wrapper">
                    <p class="editorial-paragraph">
                       We are a group of friends who came together with one shared belief — that building great businesses starts with building great systems. From concept stage to sustainable operations, we have hands-on experience in creating products and companies that work in the real world. Our experience goes far beyond software development. We focus on understanding how businesses truly operate, then redesigning workflows, standardizing systems, and shaping business models that are simple, scalable, and practical.Headquartered in Singapore, with offices in India, Rotterdam and Dubai, we work with clients across regions and industries. 
                  </p> 
                </div>
            </div>

            <!-- Right Overlapping Editorial Photo -->
            <div class="editorial-photo-side">
                <img src="assets/frontend/img/99.jpeg" alt="Engineering Leadership & Global Teams" class="editorial-main-img">
                <div class="photo-side-badge">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>
        </section>

        <!-- ==========================================================================
             SECTION 3: THREE-COLUMN FEATURES WITH VERTICAL DIVIDERS (`- 01 -`, `- 02 -`, `- 03 -`)
             ========================================================================== -->
        <section class="about-columns-section">
            <div class="section-subtitle-center">BUT IMAGINE IF YOU COULD...</div>

            <div class="columns-3-grid">
                <div class="col-item has-divider">
                    <div class="col-num">Our Mission</div>
                    <div class="col-desc">
                        To empower ambitious enterprises by engineering scalable, high-performance custom software, cloud architectures, and unified digital workflows that eliminate operational bottlenecks and drive sustained revenue growth.
                    </div>
                </div>

                <div class="col-item has-divider">
                    <div class="col-num">Our Vision</div>
                    <div class="col-desc">
                        To be the premier global partner in next-generation IT transformation—bridging deep domain expertise with cutting-edge AI ecosystems and zero-tech-debt engineering to shape the future of digital enterprise.
                    </div>
                </div>

                <div class="col-item">
                    <div class="col-num">Core Values</div>
                    <div class="col-desc">
                        Precision in software engineering, absolute transparency in agile delivery, uncompromising data security, and a relentless commitment to sustainable long-term innovation and client velocity.
                    </div>
                </div>
            </div>
        </section>

        <!-- ==========================================================================
             SECTION 4: INTRODUCING + GIANT WATERMARK TITLE + DEVICE MOCKUP CLUSTER
             ========================================================================== -->
        <section class="about-showcase-section">
            <div class="section-subtitle-center" style="margin-bottom: 1rem;">INTRODUCING</div>

            <div class="showcase-wrapper">
                <div class="watermark-title">VIAN CONSULTANCY</div>

                <div class="showcase-white-backdrop">
                    <div class="mockup-cluster">
                        <!-- Left Tablet Mockup -->
                        <div class="mockup-item-tablet">
                            <div class="tablet-frame">
                                <img src="assets/frontend/img/05cd9a0bb4c72e5ba98ece031987955d.gif" alt="Order to Cash Workflow Animated View">
                            </div>
                        </div>

                        <!-- Center Monitor Mockup -->
                        <div class="mockup-item-monitor">
                            <div class="monitor-frame">
                                <img src="assets/frontend/img/05cd9a0bb4c72e5ba98ece031987955d.gif" alt="Enterprise Platform Dashboard Animated View">
                            </div>
                            <div class="monitor-stand-base"></div>
                        </div>

                        <!-- Right Laptop Mockup -->
                        <div class="mockup-item-laptop">
                            <div class="laptop-frame">
                                <img src="assets/frontend/img/05cd9a0bb4c72e5ba98ece031987955d.gif" alt="Agency ERP System Animated View">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection