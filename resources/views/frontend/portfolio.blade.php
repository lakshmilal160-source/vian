@extends('frontend.layouts.app')
@push('style')
    {{-- <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="portfolio.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/contact.css') }}">
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
                            <img src="{{ asset('storage/' . $portfolio->image) }}"
                                alt="Order To Cash O2C Financial & Revenue Dashboard">
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

                    {{-- Previous --}}
                    @if ($portfolios->onFirstPage())
                        <button class="page-nav-btn page-prev disabled" disabled>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                            <span>Prev</span>
                        </button>
                    @else
                        <a href="{{ $portfolios->previousPageUrl() }}" class="page-nav-btn page-prev">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                            <span>Prev</span>
                        </a>
                    @endif


                    {{-- Dynamic Page Numbers --}}
                    <div class="page-numbers-bar">

                        @foreach ($portfolios->getUrlRange(1, $portfolios->lastPage()) as $page => $url)
                            @if ($page == 1 || $page == $portfolios->lastPage() || abs($page - $portfolios->currentPage()) <= 1)
                                @if ($page == $portfolios->currentPage())
                                    <button class="page-num-btn active" disabled>
                                        {{ $page }}
                                    </button>
                                @else
                                    <a href="{{ $url }}" class="page-num-btn">
                                        {{ $page }}
                                    </a>
                                @endif
                            @elseif ($page == $portfolios->currentPage() - 2 || $page == $portfolios->currentPage() + 2)
                                <span class="page-ellipsis">...</span>
                            @endif
                        @endforeach

                    </div>


                    {{-- Next --}}
                    @if ($portfolios->hasMorePages())
                        <a href="{{ $portfolios->nextPageUrl() }}" class="page-nav-btn page-next">
                            <span>Next</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    @else
                        <button class="page-nav-btn page-next disabled" disabled>
                            <span>Next</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                    @endif

                </nav>
            </div>
    </section>
@endsection
