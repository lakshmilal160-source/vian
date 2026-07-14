@extends('dashboard.layout.default')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="fw-bold">

                <span class="text-muted fw-light">
                    Clients /
                </span>

                List

            </h4>

            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">

                <i class="bx bx-plus"></i>

                Add Client

            </a>

        </div>

        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif

        <div class="card mb-4">

            <div class="card-body">
                {{-- SEARCH --}}

                <form method="GET" class="row gap-3 mb-4">

                    <div class="row">

                        <div class="col-md-4">

                            <input type="text" name="search" class="form-control" placeholder="Search client..."
                                value="{{ request('search') }}">

                        </div>

                        <div class="col-md-2">

                            <button class="btn btn-primary w-100">

                                Search

                            </button>

                        </div>

                    </div>

                </form>
                {{-- TABLE --}}
                <div class="table-responsive text-nowrap">

                    <table class="table table-bordered align-middle">

                        <thead class="table-light">

                            <tr>

                                <th>#</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Website</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($clients as $client)
                                <tr>

                                    <td>

                                        {{ $loop->iteration }}

                                    </td>

                                    <td>

                                        @if ($client->logo)
                                            <img src="{{ asset('storage/' . $client->logo) }}" width="60"
                                                class="rounded">
                                        @endif

                                    </td>

                                    <td>

                                        {{ $client->name }}

                                    </td>

                                    <td>

                                        @if ($client->website)
                                            <a href="{{ $client->website }}" target="_blank">

                                                Visit

                                            </a>
                                        @endif

                                    </td>

                                    <td>

                                        <div class="form-check form-switch">

                                            <input type="checkbox" class="form-check-input toggle-status"
                                                data-id="{{ $client->id }}" {{ $client->status ? 'checked' : '' }}>

                                        </div>

                                    </td>
<td class="d-flex gap-2">
                                        <a href="{{ route('admin.clients.edit', $client->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="bx bx-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.clients.destroy', $client->id) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Delete this service?')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                   

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center">

                                        No clients found

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="card-footer">

                    {{ $clients->links('dashboard.partials.pagination') }}

                </div>
            </div>
        </div>
    </div>
@endsection


@section('jscript')
    <script>
        $(document).ready(function() {

            /**
             * STATUS TOGGLE
             */
            $('.toggle-status').change(function() {

                let id = $(this).data('id');

                $.ajax({

                    url: `/admin/clients/${id}/toggle-status`,
                    type: 'POST',

                    data: {
                        _token: '{{ csrf_token() }}'
                    }

                });

            });

            /**
             * DELETE CONFIRM
             */
            $('.delete-form').submit(function(e) {

                e.preventDefault();

                if (confirm('Delete this client?')) {

                    this.submit();

                }

            });

        });
    </script>
@endsection
