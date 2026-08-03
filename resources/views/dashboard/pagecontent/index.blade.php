@extends('dashboard.layout.default')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between py-3 mb-4">
            <h4 class="fw-bo(ld "><span class="text-muted fw-light">Page Contents /</span> List </h4>
            <a href="{{ route('admin.pagecontent.create') }}" class="btn btn-primary">
                <span class="tf-icons bx bx-plus-circle"></span>&nbsp; Add New
            </a>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap overflow-visible">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Page</th>
                            <th>Section</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">

                        @forelse ($contents as $key => $content)
                            <tr>
                                <td>{{ $key + 1 }}</td>

                                <td>
                                    {{ $content->page->name ?? '-' }}
                                </td>

                                <td>
                                    {{ ucwords($content->section) }}
                                </td>

                                <td>
                                    {{ $content->title ?? '-' }}
                                </td>

                                <td>
                                    @if ($content->image)
                                        <img src="{{ asset('storage/' . $content->image) }}"
                                            width="60"
                                            height="60"
                                            class="rounded object-fit-cover"
                                            alt="image">
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button"
                                            class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            {{-- Edit --}}
                                            <a class="dropdown-item"
                                                href="{{ route('admin.pagecontent.edit', $content->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                Edit
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('admin.pagecontent.destroy', $content->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this item?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="dropdown-item text-danger border-0 bg-transparent">
                                                    <i class="bx bx-trash me-1"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    No page contents found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
