@extends('frontend.layouts.app')

@section('title', 'About Us')

@section('content')
    @include('frontend.partials.banner', [
        'title' => $contents['welcome_note']->title ?? '',
        'description' => $contents['welcome_note']->description ?? '',
        'image'=>$contents['welcome_note']->image ?? ''
    ])
    <!-- About Intro Section -->
    <section class="about-intro">
        <div class="container">
            <div class="intro-top">
                <div class="intro-heading">
                    <h2 class="serif">{{ $contents['description']->title }}</h2>
                </div>
                <div class="intro-text">
                    <p>{!! $contents['description']->description !!}</p>
                </div>
            </div>
    </section>


    <!-- Goals Infographic Section -->
    <section class="goals-infographic">
        <div class="container goals-container">
            <div class="goals-visual">
                <img src="{{ asset('storage/' . $contents['description']->image) }}" alt="Target Infographic"
                    class="target-img">
                <div class="perspective-line line-top"></div>
                <div class="perspective-line line-bottom"></div>
            </div>
            <div class="goals-content">


                <div class="goals-grid">

                    <div class="goal-item">
                        <h3>{{ $contents['mission']->title }}</h3>
                        <p>{!! $contents['mission']->description !!}</p>
                    </div>
                    <div class="goal-item">
                        <h3>{{ $contents['vission']->title }}</h3>
                        <p>{!! $contents['vission']->description !!}</p>
                    </div>
                    <div class="goal-item">
                        <h3>{{ $contents['values']->title }}</h3>
                        <p>{!! $contents['values']->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">


            <div class="intro-bottom pt-70">
                <div class="quote-mark">&ldquo;</div>
                <div class="quote-slider-wrapper">
                    <div class="quote-slider" id="introQuoteSlider">
                        @foreach ($testimonials as $testimonial)
                            <div class="quote-slide">
                                <div class="quote-content">
                                    <h3>
                                        {{ $testimonial->message }}
                                    </h3>

                                    <div class="quote-author">
                                        <div class="author-details">
                                            <h4>{{ $testimonial->name }}</h4>
                                            <p> @if ($testimonial->designation)
                                                {{ $testimonial->designation }},
                                            @endif
                                            {{ $testimonial->company }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="quote-slider-dots" id="quoteDots">
                        @foreach ($testimonials as $key => $testimonial)
                            <span class="q-dot {{ $key == 0 ? 'active' : '' }}"></span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
