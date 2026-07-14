@extends('dashboard.layout.default')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="mb-0">Message Details</h5>

                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-secondary">
                    Back
                </a>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <strong>Name:</strong>
                    {{ $contact->name }}
                </div>

                <div class="mb-3">
                    <strong>Email:</strong>
                    {{ $contact->email }}
                </div>

                <div class="mb-3">
                    <strong>Phone:</strong>
                    {{ $contact->phone }}
                </div>

                <div class="mb-3">
                    <strong>Message:</strong>
                </div>

                <div class="border rounded p-4 bg-light">
                    {{ $contact->message }}
                </div>

                <div class="mt-4">
                    <strong>Received:</strong>
                    {{ $contact->created_at->format('d M Y h:i A') }}
                </div>

            </div>
        </div>
    </div>
@endsection
