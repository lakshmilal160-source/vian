@extends('frontend.layouts.app')

@section('title', 'Services')

@section('content')

@include('frontend.partials.banner', ['title'=>$contents['welcome_note']->title ?? '',
    'description' => $contents['welcome_note']->description ?? '','image'=>$contents['welcome_note']->image ?? ''
])

<section class="services-steps">
    <div class="container steps-container">

        @foreach ($services as $key => $service)
            <div class="step-row {{ $key % 2 == 0 ? 'step-right-img' : 'step-left-img' }}">

                @if($key % 2 == 0)
                    <div class="step-content">
                        <h2>{{ $service->title }}</h2>
                        <p>{!! $service->description !!}</p>
                    </div>

                    <div class="step-visual">
                        <div class="step-number"
                            style="background-image: url('{{ asset('storage/' . $service->image) }}');">
                            {{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                @else
                    <div class="step-visual">
                        <div class="step-number"
                            style="background-image: url('{{ asset('storage/' . $service->image) }}');">
                            {{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>

                    <div class="step-content">
                        <h2>{{ $service->title }}</h2>
                        <p>{!! $service->description !!}</p>
                    </div>
                @endif

            </div>

            @if (!$loop->last)
                <div class="step-divider"></div>
            @endif
        @endforeach

    </div>
</section>

@endsection