@extends('dashboard.layout.default')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Testimonials /</span>
        Create
    </h4>

    @include('dashboard.testimonial.partials.form', [
        'action' => route('admin.testimonials.store'),
        'method' => 'POST'
    ])

</div>
@endsection

@section('scripts')
    @stack('scripts')
@endsection