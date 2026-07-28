@extends('frontend.layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/services.css') }}">
@endpush
@section('contents')
 <!-- ==========================================================================
             SERVICES HERO BANNER
             Exact match of banner layout: bold navy text left, laptop on pedestal right
             ========================================================================== -->
        <section class="esper-banner-section" id="esperBannerHero">

            <!-- Banner two-column layout -->
            <div class="esper-banner-inner">

                <!-- LEFT: Typography column -->
                <div class="esper-text-side">
                    <h1 class="esper-headline">
                        <span class="esper-h-line1">Our Specialized</span>
                        <span class="esper-h-line2">Services</span>
                    </h1>
                </div>

            </div>
        </section>

        <!-- ==========================================================================
             SERVICES PAGE BODY — EXACT MATCH OF REFERENCE IMAGE LAYOUT (1/2/3/4)
             Alternating Light/Dark background blocks matching Home Page color theme
             with exact home page fonts (Outfit, Inter, JetBrains Mono) and gradients
             ========================================================================== -->
        <section class="services-showcase-section" id="servicesShowcaseBody">

            <!-- 01. Custom Software Development (Light block on White, Text Left / Image Right) -->
            <div class="service-showcase-block service-block-light">
                <div class="service-block-container">
                    <!-- Left: Number + Content -->
                    <div class="service-text-side animate-on-scroll anim-fade-left">
                        <div class="service-content-wrapper">
                            <h2 class="service-heading">Custom Software Development</h2>
                            <hr class="service-heading-divider">
                            <p class="service-subheading">✦ Enterprise Systems & Digital Platforms</p>
                            <div class="service-paragraph-content">
                                <p class="service-desc-paragraph">Don't settle for off-the-shelf solutions that force your business to adapt to software. VIAN Consultancy Services builds custom software that adapts to your business.</p>
                                <p class="service-desc-paragraph">From enterprise systems to operational platforms and digital products, our focus is on performance, reliability, and usability.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Image with Offset Outline Frame overlapping down -->
                    <div class="service-image-side animate-on-scroll anim-fade-right delay-200 overlap-down">
                        <div class="service-img-wrap">
                            <img src="assets/frontend/img/service_custom_dev.png" alt="Custom Software Development Architecture & Interface">
                        </div>
                        <div class="service-img-outline outline-top-right"></div>
                    </div>
                </div>
            </div>

            <!-- 02. Knowledge Process Outsourcing (KPO) (Dark block, Image Left / Text Right) -->
            <div class="service-showcase-block service-block-dark service-block-reverse">
                <div class="service-block-container">
                    <!-- Left: Image with Offset Outline Frame overlapping up -->
                    <div class="service-image-side animate-on-scroll anim-fade-left delay-200 overlap-up">
                        <div class="service-img-wrap">
                            <img src="assets/frontend/img/service_kpo.png" alt="Knowledge Process Outsourcing Global Operations & GCCs">
                        </div>
                        <div class="service-img-outline outline-bottom-left"></div>
                    </div>

                    <!-- Right: Number + Content -->
                    <div class="service-text-side animate-on-scroll anim-fade-right">
                        <div class="service-content-wrapper">
                            <h2 class="service-heading">Knowledge Process Outsourcing (KPO)</h2>
                            <hr class="service-heading-divider">
                            <p class="service-subheading">✦ Dedicated GCCs & High-Value Operations</p>
                            <div class="service-paragraph-content">
                                <p class="service-desc-paragraph">We provide skilled teams, structured processes, and smart tools to handle complex, high-value work with accuracy and consistency.</p>
                                <p class="service-desc-paragraph">We support companies in setting up and running Global Capability Centres, providing technology, process design, and operational support to build strong and hybrid teams.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 03. Workflow Optimization (Light block on White, Text Left / Image Right) -->
            <div class="service-showcase-block service-block-light">
                <div class="service-block-container">
                    <!-- Left: Number + Content -->
                    <div class="service-text-side animate-on-scroll anim-fade-left">
                        <div class="service-content-wrapper">
                            <h2 class="service-heading">Workflow Optimization</h2>
                            <hr class="service-heading-divider">
                            <p class="service-subheading">✦ Process Mapping & Technology Enablement</p>
                            <div class="service-paragraph-content">
                                <p class="service-desc-paragraph">We study how work actually happens on the ground—not how it is supposed to happen on paper.</p>
                                <p class="service-desc-paragraph">Our approach combines process mapping, technology enablement, and change management.</p>
                                <p class="service-desc-paragraph">We don't just suggest improvements—we digitise and implement systems that standardise and simplify processes.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Image with Offset Outline Frame overlapping down -->
                    <div class="service-image-side animate-on-scroll anim-fade-right delay-200 overlap-down">
                        <div class="service-img-wrap">
                            <img src="assets/frontend/img/service_workflow.png" alt="Workflow Optimization Process Mapping & Digital Automation">
                        </div>
                        <div class="service-img-outline outline-top-right"></div>
                    </div>
                </div>
            </div>

            <!-- 04. UI / UX Design Services (Dark block, Image Left / Text Right) -->
            <div class="service-showcase-block service-block-dark service-block-reverse">
                <div class="service-block-container">
                    <!-- Left: Image with Offset Outline Frame overlapping up -->
                    <div class="service-image-side animate-on-scroll anim-fade-left delay-200 overlap-up">
                        <div class="service-img-wrap">
                            <img src="assets/frontend/img/service_uiux.png" alt="UI UX Design Services Intuitive User Experience & Wireframes">
                        </div>
                        <div class="service-img-outline outline-bottom-left"></div>
                    </div>

                    <!-- Right: Number + Content -->
                    <div class="service-text-side animate-on-scroll anim-fade-right">
                        <div class="service-content-wrapper">
                            <h2 class="service-heading">UI / UX Design Services</h2>
                            <hr class="service-heading-divider">
                            <p class="service-subheading">✦ Intuitive Experiences for Real Users</p>
                            <div class="service-paragraph-content">
                                <p class="service-desc-paragraph">Great design is not about how it looks—it's about how it works.</p>
                                <p class="service-desc-paragraph">Our UI/UX design focuses on creating simple, intuitive, and enjoyable experiences for real users.</p>
                                <p class="service-desc-paragraph">We study user behavior, business goals, and workflows to design interfaces that are easy to understand, efficient to use, and visually clean.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
@endsection