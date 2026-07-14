@extends('dashboard.layout.default')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Testimonials /</span>
        Edit
    </h4>

    @include('dashboard.testimonial.partials.form', [
        'action' => route('admin.testimonials.update', $testimonial->id),
        'method' => 'PUT',
        'testimonial' => $testimonial
    ])

</div>
@endsection

@section('jscript')
    @stack('scripts')
@endsection