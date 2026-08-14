@extends('dashboard.layout.default')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            {{-- Page Contents --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('admin.pagecontent.index') }}">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-medium d-block mb-1">Page Contents</span>
                            <h3>{{ $pageContents }}</h3>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Services --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('admin.services.index') }}">

                    <div class="card">
                        <div class="card-body">
                            <span class="fw-medium d-block mb-1">Services</span>
                            <h3>{{ $services }}</h3>
                        </div>
                    </div>
                </a>
            </div>

           

            {{-- Contacts --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('admin.contacts.index') }}">

                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <span class="fw-medium d-block mb-1">Contacts</span>
                                <h3>{{ $contacts }}</h3>
                            </div>
                            <div>
                                @if ($unreadContacts > 0)
                                    <small class="text-warning">
                                        {{ $unreadContacts }} unread
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
