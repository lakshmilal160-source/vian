@extends('dashboard.layout.default')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between py-3 mb-4">
            <h4 class="fw-bo(ld "><span class="text-muted fw-light">Contact /</span> List </h4>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($contacts as $contact)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>

                                {{-- Toggle Status --}}
                                <td>
                                    <form method="POST" action="{{ route('admin.contacts.toggleStatus', $contact) }}">
                                        @csrf
                                        @method('PATCH')

                                        <div
                                            class="form-check form-switch {{ !$contact->is_read ? 'table-warning' : '' }}"">
                                            <input class="form-check-input" type="checkbox" onchange="this.form.submit()"
                                                {{ $contact->is_read ? 'checked' : '' }}>
                                        </div>

                                        <small>
                                            {{ $contact->is_read ? 'Read' : 'Unread' }}
                                        </small>
                                    </form>
                                </td>

                                <td>
                                    {{ $contact->created_at->format('d M Y') }}
                                </td>

                                <td class="d-flex gap-2 py-4">
                                    {{-- View --}}
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-primary">
                                        View
                                    </a>

                                    {{-- Delete --}}
                                    <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}"
                                        onsubmit="return confirm('Delete this message?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    No contact messages found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="px-4 pb-4">
                @include('dashboard.partials.pagination', [
                    'paginator' => $contacts,
                ])
            </div>
        </div>
    </div>
@endsection
