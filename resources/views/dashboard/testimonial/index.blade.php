@extends('dashboard.layout.default')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- Heading --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">
                <span class="text-muted fw-light">Testimonials /</span>
                List
            </h4>

            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Add Testimonial
            </a>
        </div>

        {{-- Success --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                {{-- Search + Sort --}}
                <form method="GET" action="{{ route('admin.testimonials.index') }}" class="row g-3 mb-4">

                    <div class="col-md-5">
                        <input type="text" name="search" class="form-control" placeholder="Search name / company..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-3">
                        <select name="sort" class="form-select">
                            <option value="">Latest</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>
                                Oldest
                            </option>
                            <option value="sort_order" {{ request('sort') == 'sort_order' ? 'selected' : '' }}>
                                Sort Order
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">
                            Search
                        </button>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary w-100">
                            Reset
                        </a>
                    </div>
                </form>

                {{-- Table --}}
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Company</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Sort</th>
                                <th width="150">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($testimonials as $testimonial)
                                <tr>
                                    {{-- Counter --}}
                                    <td>
                                        {{ $testimonials->firstItem() + $loop->index }}
                                    </td>

                                    {{-- Image --}}
                                    <td>
                                        @if ($testimonial->image)
                                            <img src="{{ asset('storage/' . $testimonial->image) }}" width="60"
                                                class="rounded border">
                                        @else
                                            -
                                        @endif
                                    </td>

                                    {{-- Name --}}
                                    <td class="fw-semibold">
                                        {{ $testimonial->name }}
                                    </td>

                                    {{-- Designation --}}
                                    <td>
                                        {{ $testimonial->designation ?? '-' }}
                                    </td>

                                    {{-- Company --}}
                                    <td>
                                        {{ $testimonial->company ?? '-' }}
                                    </td>

                                    {{-- Rating --}}
                                    <td>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $testimonial->rating)
                                                ⭐
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </td>

                                    {{-- AJAX Toggle --}}
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input toggle-status" type="checkbox"
                                                data-id="{{ $testimonial->id }}"
                                                {{ $testimonial->status ? 'checked' : '' }}>
                                        </div>
                                    </td>

                                    {{-- Sort --}}
                                    <td>
                                        {{ $testimonial->sort_order }}
                                    </td>

                                    {{-- Actions --}}
                                    <td>
                                        <div class="d-flex gap-2">

                                            {{-- Edit --}}
                                            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bx bx-edit"></i>
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                                method="POST" class="delete-form d-inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">
                                        No testimonials found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @include('dashboard.partials.pagination', [
                    'paginator' => $testimonials,
                ])

            </div>
        </div>
    </div>
@endsection

@section('jscript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /**
             * AJAX Status Toggle
             */
            document.querySelectorAll('.toggle-status').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    let id = this.dataset.id;

                    fetch(`/admin/testimonials/${id}/toggle-status`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            console.log('Status updated');
                        })
                        .catch(error => {
                            console.error(error);
                            location.reload();
                        });
                });
            });

            /**
             * Delete Confirm
             */
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    if (confirm('Are you sure you want to delete this testimonial?')) {
                        form.submit();
                    }
                });
            });

        });
    </script>
@endsection
