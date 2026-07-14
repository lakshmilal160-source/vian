@extends('dashboard.layout.default')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Services</h4>

            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                Add Service
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                {{-- Search / Filter --}}
                <form method="GET" class="row g-3 mb-4">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search service..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-3">
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="sort" class="form-select">
                            <option value="">Latest</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name A-Z</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name Z-A
                            </option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                            <option value="order" {{ request('sort') == 'order' ? 'selected' : '' }}>Sort Order</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-outline-primary w-100">
                            Filter
                        </button>
                    </div>
                </form>

                {{-- Table --}}
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Sort</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th width="140">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration + ($services->firstItem() - 1) }}</td>

                                    <td>
                                        @if ($service->icon)
                                            <img src="{{ asset('storage/' . $service->icon) }}" width="40"
                                                class="rounded border">
                                        @endif
                                    </td>

                                    <td>
                                        @if ($service->image)
                                            <img src="{{ asset('storage/' . $service->image) }}" width="60"
                                                class="rounded border">
                                        @endif
                                    </td>

                                    <td>{{ $service->title }}</td>
                                    <td>{{ $service->price }}</td>
                                    <td>{{ $service->sort_order }}</td>

                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input toggle-status" type="checkbox"
                                                data-id="{{ $service->id }}" {{ $service->status ? 'checked' : '' }}>
                                        </div>
                                    </td>

                                    <td>{{ $service->created_at->format('d M Y') }}</td>

                                    <td class="d-flex gap-2">
                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                            class="btn btn-sm btn-warning">
                                           <i class="bx bx-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Delete this service?')">
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
                                    <td colspan="9" class="text-center">No services found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @include('dashboard.partials.pagination', [
                    'paginator' => $services,
                ])

            </div>
        </div>
    </div>
@endsection
@section('jscript')
    <script>
        $(function() {

            /**
             * AJAX Status Toggle
             */
            $('.toggle-status').on('change', function() {
                let id = $(this).data('id');

                $.ajax({
                    url: `/admin/services/${id}/toggle-status`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('Service status updated');
                    },
                    error: function() {
                        location.reload();
                    }
                });
            });

            /**
             * Delete Confirm
             */
            $('.delete-form').on('submit', function(e) {
                e.preventDefault();

                if (confirm('Are you sure you want to delete this service?')) {
                    this.submit();
                }
            });

        });
    </script>
@endsection
