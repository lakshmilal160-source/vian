@extends('frontend.layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/services.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/contact.css') }}">
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
        @forelse ($services as $service)
            @if ($loop->odd)
                <div class="service-showcase-block service-block-light">
                    <div class="service-block-container">
                        <!-- Left: Number + Content -->
                        <div class="service-text-side animate-on-scroll anim-fade-left">
                            <div class="service-content-wrapper">
                                <h2 class="service-heading">{{ $service->title }}</h2>
                                <hr class="service-heading-divider">
                                {{-- <p class="service-subheading">✦ {{ $service->short_description }}</p> --}}
                                <div class="service-paragraph-content">
                                    <p class="service-desc-paragraph">{!! $service->description !!}</p>

                                </div>
                            </div>
                        </div>

                        <!-- Right: Image with Offset Outline Frame overlapping down -->
                        <div class="service-image-side animate-on-scroll anim-fade-right delay-200 overlap-down">
                            <div class="service-img-wrap">
                                <img src="{{ asset('storage/' . $service->image) }}"
                                    alt="Custom Software Development Architecture & Interface">
                            </div>
                            <div class="service-img-outline outline-top-right"></div>
                        </div>
                    </div>
                </div>
            @else
                <div class="service-showcase-block service-block-dark service-block-reverse">
                    <div class="service-block-container">
                        <!-- Left: Image with Offset Outline Frame overlapping up -->
                        <div class="service-image-side animate-on-scroll anim-fade-left delay-200 overlap-up">
                            <div class="service-img-wrap">
                                <img src="{{ asset('storage/' . $service->image) }}"
                                    alt="Knowledge Process Outsourcing Global Operations & GCCs">
                            </div>
                            <div class="service-img-outline outline-bottom-left"></div>
                        </div>

                        <!-- Right: Number + Content -->
                        <div class="service-text-side animate-on-scroll anim-fade-right">
                            <div class="service-content-wrapper">
                                <h2 class="service-heading">{{ $service->title }}</h2>
                                <hr class="service-heading-divider">
                                {{-- <p class="service-subheading">✦ {{ $service->short_description }}</p> --}}
                                <div class="service-paragraph-content">
                                    <p class="service-desc-paragraph">{!! $service->description !!}</p>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        @empty
        @endforelse


    </section>
@endsection
@push('script')
    <script src="{{ asset('assets/frontend/js/services-script.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/contact-script.js') }}"></script>
@endpush
