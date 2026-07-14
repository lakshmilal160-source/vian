@extends('dashboard.layout.default')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">

        <span class="text-muted fw-light">
            Clients /
        </span>

        Edit

    </h4>

    @include('dashboard.client.partials.form', [

        'action' => route('admin.clients.update', $client->id),
        'method' => 'PUT'

    ])

</div>

@endsection