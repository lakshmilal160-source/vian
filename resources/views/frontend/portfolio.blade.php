@extends('frontend.layouts.app')
@push('style')
    {{-- <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="portfolio.css"> --}}
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
                <div class="portfolio-split-row">
                    <div class="split-img-side">
                        <div class="split-img-frame">
                            <img src="assets/001.jpg" alt="Order To Cash O2C Financial & Revenue Dashboard">
                        </div>
                    </div>
                    <div class="split-text-side">
                        <div class="split-content-box">
                            <h2 class="split-title">Order To Cash (O2C)</h2>
                            <p class="split-desc">We have delivered complete Order-to-Cash solutions that seamlessly connect sales, operations, finance, and collections. Our O2C systems cover the full cycle—from quotation and order confirmation to invoicing, receivables, and reporting—giving businesses real-time visibility into revenue, cash flow, and customer performance. The focus is always on speed, accuracy, and control, helping clients reduce billing delays, minimize disputes, and improve working capital.</p>
                            
                        </div>
                    </div>
                </div>

                <!-- Row 02: Procure To Pay (P2P) — [ Left: Image Side | Right: Text Side ] -->
                <div class="portfolio-split-row">
                    <div class="split-img-side">
                        <div class="split-img-frame">
                            <img src="assets/002.jpeg" alt="Procure To Pay P2P Enterprise Procurement System">
                        </div>
                    </div>
                    <div class="split-text-side">
                        <div class="split-content-box">
                            <h2 class="split-title">Procure To Pay (P2P)</h2>
                            <p class="split-desc">Our Procure-to-Pay implementations streamline how organizations source, approve, purchase, and pay. We build workflows that integrate requisitions, approvals, vendor management, purchase orders, goods receipt, invoice processing, and bank batch approvals into a single transparent flow. The result is better cost control, stronger compliance, faster payments, and clear visibility of spending across departments.</p>
                            
                        </div>
                    </div>
                </div>

                <!-- Row 03: Agency ERP — [ Left: Image Side | Right: Text Side ] -->
                <div class="portfolio-split-row">
                    <div class="split-img-side">
                        <div class="split-img-frame">
                            <img src="assets/003.jpg" alt="Agency ERP Maritime Operations Platform">
                        </div>
                    </div>
                    <div class="split-text-side">
                        <div class="split-content-box">
                            <h2 class="split-title">Agency ERP</h2>
                            <p class="split-desc">We have developed ERP platforms specifically for agency-driven businesses where operations move fast and accuracy is critical. Our Agency ERP covers port calls, husbandry services, vendor coordination, client billing, documentation, and financial integration—all in one system. Designed for real operational environments, it reduces manual work, avoids duplication, and gives management a clear view of performance across locations and teams.</p>
                           
                        </div>
                    </div>
                </div>

                <!-- Row 04: Agency Marketplace — [ Left: Image Side | Right: Text Side ] -->
                <div class="portfolio-split-row">
                    <div class="split-img-side">
                        <div class="split-img-frame">
                            <img src="assets/004.jpeg" alt="Digital Agency Marketplace B2B Platform">
                        </div>
                    </div>
                    <div class="split-text-side">
                        <div class="split-content-box">
                            <h2 class="split-title">Agency Marketplace</h2>
                            <p class="split-desc">We have built digital marketplaces that connect principals, agents, and service providers on a single platform. These marketplaces enable discovery of services, transparent pricing, standardized workflows, and seamless communication between parties. The goal is to move agencies from fragmented, email-driven operations to a connected digital ecosystem that improves speed, trust, and efficiency.</p>
                            
                        </div>
                    </div>
                </div>

            </div>

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