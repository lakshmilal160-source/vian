@extends('dashboard.layout.default')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="fw-bold">
                <span class="text-muted fw-light">
                    Portfolio /
                </span>

                List
            </h4>

            <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">

                <i class="bx bx-plus"></i>

                Add Portfolio

            </a>

        </div>

        {{-- SEARCH --}}
        <div class="card mb-4">

            <div class="card-body">
                {{-- search --}}
                <form method="GET" class="row gap-3 mb-4">

                    <div class="row">

                        <div class="col-md-4">

                            <input type="text" name="search" class="form-control" placeholder="Search portfolio..."
                                value="{{ request('search') }}">

                        </div>

                        <div class="col-md-2">

                            <button class="btn btn-primary w-100">

                                Search

                            </button>

                        </div>

                    </div>

                </form>
                {{-- table --}}
                <div class="table-responsive text-nowrap">

                    <table class="table table-bordered align-middle">

                        <thead class="table-light">

                            <tr>

                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th width="140">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($portfolios as $portfolio)
                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>

                                        @if ($portfolio->image)
                                            <img src="{{ asset('storage/' . $portfolio->image) }}" width="70"
                                                class="rounded">
                                        @endif

                                    </td>

                                    <td>

                                        {{ $portfolio->title }}

                                    </td>

                                    <td>

                                        <div class="form-check form-switch">

                                            <input class="form-check-input toggle-status" type="checkbox"
                                                data-id="{{ $portfolio->id }}" {{ $portfolio->status ? 'checked' : '' }}>

                                        </div>

                                    </td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="bx bx-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}"
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

                                    <td colspan="5" class="text-center">

                                        No portfolio found

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>


            </div>
            <div class="card-footer">

                {{ $portfolios->links('dashboard.partials.pagination') }}

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

                    url: `/admin/portfolios/${id}/toggle-status`,
                    type: 'POST',

                    data: {
                        _token: '{{ csrf_token() }}'
                    },

                    success: function() {

                        console.log('Status updated');

                    }

                });

            });

            /**
             * DELETE CONFIRM
             */
            $('.delete-form').submit(function(e) {

                e.preventDefault();

                if (confirm('Delete this portfolio?')) {

                    this.submit();

                }

            });

        });
    </script>
@endsection
