@extends('dashboard.layout.default')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">

        <span class="text-muted fw-light">
            Services /
        </span>

        Create

    </h4>

    @include('dashboard.service.partials.form', [
        'action' => route('admin.services.store'),
        'method' => 'POST'
    ])

</div>

@endsection
