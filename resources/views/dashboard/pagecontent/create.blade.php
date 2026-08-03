@extends('dashboard.layout.default')
@section('headers')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jodit@latest/build/jodit.min.css">
@endsection
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Page Content /</span>
            Create
        </h4>

        <div class="row">

            <div class="col-md-12">

                <div class="card mb-4">

                    <h5 class="card-header">
                        Add Page Content
                    </h5>

                    <div class="card-body">

                        {{-- SUCCESS MESSAGE --}}
                        @if (session('success'))
                            <div class="alert alert-success">

                                {{ session('success') }}

                            </div>
                        @endif

                        {{-- VALIDATION ERRORS --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">

                                <ul class="mb-0">

                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach

                                </ul>

                            </div>
                        @endif

                        <form action="{{ route('admin.pagecontent.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            {{-- PAGE --}}
                            <div class="mb-3">

                                <label class="form-label">

                                    Select Page

                                </label>

                                <select class="form-select" name="page_id">

                                    <option value="">

                                        Select Page

                                    </option>

                                    @foreach ($pages as $page)
                                        <option value="{{ $page->id }}"
                                            {{ old('page_id') == $page->id ? 'selected' : '' }}>

                                            {{ $page->name }}

                                        </option>
                                    @endforeach

                                </select>

                            </div>

                            {{-- SECTION --}}
                            <div class="mb-3">

                                <label class="form-label">

                                    Select Section

                                </label>

                                <select class="form-select" name="section">

                                    <option value="">

                                        Select Section

                                    </option>

                                    @foreach ($sections as $section)
                                        <option value="{{ $section }}">

                                            {{ ucwords(str_replace('_', ' ', $section)) }}

                                        </option>
                                    @endforeach

                                </select>

                            </div>

                            {{-- TITLE --}}
                            <div class="mb-3">

                                <label class="form-label">

                                    Title

                                </label>

                                <input type="text" class="form-control" name="title" placeholder="Enter title"
                                    value="{{ old('title') }}">

                            </div>

                            {{-- DESCRIPTION --}}
                            <div class="mb-3">

                                <label class="form-label">

                                    Description

                                </label>

                                <textarea class="form-control" id="description" name="description" rows="10">{{ old('description') }}</textarea>

                            </div>

                            {{-- IMAGE --}}
                            <div class="mb-3">

                                <label class="form-label">

                                    Upload Image

                                </label>

                                <input type="file" class="form-control" name="image">

                            </div>

                            {{-- SUBMIT --}}
                            <div class="mt-4">

                                <button type="submit" class="btn btn-primary">

                                    Save Content

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection
@section('jscript')
{{-- CKEDITOR --}}
<script src="https://cdn.jsdelivr.net/npm/jodit@latest/build/jodit.min.js"></script>
    CKEDITOR.replace('description');
</script>
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
