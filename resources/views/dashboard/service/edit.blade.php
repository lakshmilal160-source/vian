@extends('dashboard.layout.default')
@section('headers')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/jodit@latest/build/jodit.min.css">
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">

        <span class="text-muted fw-light">
            Services /
        </span>

        Edit

    </h4>

    @include('dashboard.service.partials.form', [
        'action' => route('admin.services.update', $service->id),
        'method' => 'PUT'
    ])

</div>

@endsection
@section('jscript')


<script src="https://cdn.jsdelivr.net/npm/jodit@latest/build/jodit.min.js"></script>

<script>
    Jodit.make('#description', {
        buttons: [
            'bold',
            'italic',
            'ul',
            'ol',
            'link',
            'paragraph',
            'table'
        ]
    });
</script>

@endsection