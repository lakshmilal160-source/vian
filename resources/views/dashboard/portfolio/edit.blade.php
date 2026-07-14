@extends('dashboard.layout.default')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">

        <span class="text-muted fw-light">
            Portfolio /
        </span>

        Edit

    </h4>

    @include('dashboard.portfolio.partials.form', [
        'action' => route('admin.portfolios.update', $portfolio->id),
        'method' => 'PUT'
    ])

</div>

@endsection