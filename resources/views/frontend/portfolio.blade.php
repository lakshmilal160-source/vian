@extends('frontend.layouts.app')
@push('style')
    {{-- <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="portfolio.css"> --}}
    <link rel="stylesheet" href="{{asset('assets/frontend/css/contact.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/portfolio.css') }}">
@endpush
@section('contents')
 <!-- ==========================================================================
             SECTION 1: ESPER BIONICS HERO BANNER
             Exact match of contact page banner: clean background, centered text
             ========================================================================== -->
        <section class="esper-banner-section" id="esperBannerHero">

            <!-- Banner two-column layout -->
            <div class="esper-banner-inner">

                <!-- LEFT: Typography column -->
                <div class="esper-text-side">
                    <h1 class="esper-headline">
                        <span class="esper-h-line1">Our Portfolio &</span>
                        <span class="esper-h-line2">Featured Work</span>
                    </h1>
                </div>

            </div>
        </section>


        <!-- Portfolio 50/50 Editorial Split Body Section matching user reference design (`input_file_0.png`) -->
        <section class="portfolio-body-section">
            <div class="portfolio-split-wrapper">

                <!-- Row 01: Order To Cash (O2C) — [ Left: Image Side | Right: Text Side ] -->
        @forelse ($portfolios as $portfolio)
                <div class="portfolio-split-row">
                    <div class="split-img-side">
                        <div class="split-img-frame">
                            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Order To Cash O2C Financial & Revenue Dashboard">
                        </div>
                    </div>
                    <div class="split-text-side">
                        <div class="split-content-box">
                            <h2 class="split-title">{{ $portfolio->title }}</h2>
                            <p class="split-desc">{{ $portfolio->description }}</p>
                            
                        </div>
                    </div>
                </div>

                @empty
        @endforelse

            <!-- ==========================================================================
                 PORTFOLIO PAGINATION SECTION
                 Modern, interactive pagination bar matching VIAN Consultancy clean UI design
                 ========================================================================== -->
            <div class="portfolio-pagination-container">
                <nav class="portfolio-pagination" aria-label="Portfolio Pages Navigation">
                    <!-- Prev Page Button -->
                    <button class="page-nav-btn page-prev disabled" id="prevPageBtn" aria-label="Previous Page" disabled>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                        <span>Prev</span>
                    </button>

                    <!-- Page Numbers -->
                    <div class="page-numbers-bar">
                        <button class="page-num-btn active" data-page="1">1</button>
                        <button class="page-num-btn" data-page="2">2</button>
                        <button class="page-num-btn" data-page="3">3</button>
                        <span class="page-ellipsis">...</span>
                        <button class="page-num-btn" data-page="8">8</button>
                    </div>

                    <!-- Next Page Button -->
                    <button class="page-nav-btn page-next" id="nextPageBtn" aria-label="Next Page">
                        <span>Next</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                </nav>
            </div>          
        </section>
        
@endsection