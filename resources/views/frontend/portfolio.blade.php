@extends('frontend.layouts.app')

@section('title', 'Portfolio')

@section('content')
    @include('frontend.partials.banner', ['title'=>$contents['welcome_note']->title ?? '','description' => $contents['welcome_note']->description ?? '','image'=>$contents['welcome_note']->image ?? ''])
    <section class="portfolio-grid-section">
        <div class="container">
            <div class="portfolio-grid">
                @foreach ($portfolios as $portfolio)
                    <!-- Portfolio Item 1 -->
                    <div class="portfolio-item">
                        <div class="portfolio-img-wrapper">
                            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Elegant Pack">
                        </div>
                        <div class="portfolio-info">
                            {{-- <span class="portfolio-category">{{ $portfolio->title }}</span> --}}
                            <h2>{{ $portfolio->title }}</h2>
                            <p>{{ $portfolio->description }}</p>
                        </div>
                    </div>
                @endforeach
                

            </div>

            <!-- Pagination -->
            <div class="pagination-wrap">
                <button class="pagination-btn prev-page"><i class="fa-solid fa-chevron-left"></i></button>
                <div class="pagination-numbers">
                    <!-- Populated dynamically via JS -->
                </div>
                <button class="pagination-btn next-page"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>
    </section>
@endsection
