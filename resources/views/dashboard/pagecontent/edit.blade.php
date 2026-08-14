@extends('dashboard.layout.default')
@section('headers')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jodit@latest/build/jodit.min.css">
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Page Content /</span>
        Edit
    </h4>

    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">

                <h5 class="card-header">
                    Edit Page Content
                </h5>

                <div class="card-body">

                    {{-- SUCCESS --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- ERRORS --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.pagecontent.update', $content->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

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
                                        {{ old('page_id', $content->page_id) == $page->id ? 'selected' : '' }}>
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
                                    <option value="{{ $section }}"
                                        {{ old('section', $content->section) == $section ? 'selected' : '' }}>
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

                            <input type="text"
                                   class="form-control"
                                   name="title"
                                   placeholder="Enter title"
                                   value="{{ old('title', $content->title) }}">
                        </div>

                        {{-- DESCRIPTION --}}
                        <div class="mb-3">
                            <label class="form-label">
                                Description
                            </label>

                            <textarea class="form-control"
                                      id="description"
                                      name="description"
                                      rows="10">{{ old('description', $content->description) }}</textarea>
                        </div>

                        {{-- CURRENT IMAGE --}}
                        @if ($content->image)
                            <div class="mb-3">


                                <div class="position-relative d-inline-block mt-2"
                                     id="imageWrapper">

                                    <img src="{{ asset('storage/' . $content->image) }}"
                                         width="140"
                                         class="rounded border"
                                         id="previewImage"
                                         alt="Current Image">

                                    {{-- REMOVE BUTTON --}}
                                    <button type="button"
                                            id="removeImageBtn"
                                            class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle d-flex align-items-center justify-content-center"
                                            style="width:28px;height:28px;padding:0;">
                                        ×
                                    </button>

                                </div>

                                {{-- HIDDEN INPUT --}}
                                <input type="hidden"
                                       name="remove_image"
                                       id="removeImageInput"
                                       value="0">

                            </div>
                        @endif

                        {{-- NEW IMAGE --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Change Image
                            </label>

                            <input type="file"
                                   class="form-control"
                                   name="image">

                        </div>

                        {{-- BUTTONS --}}
                        <div class="mt-4 d-flex gap-2">

                            <button type="submit"
                                    class="btn btn-primary">
                                Update Content
                            </button>

                            <a href="{{ route('admin.pagecontent.index') }}"
                               class="btn btn-outline-secondary">
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

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

<script>
    document.getElementById('removeImageBtn')?.addEventListener('click', function () {

        document.getElementById('previewImage').remove();

        document.getElementById('removeImageBtn').remove();

        document.getElementById('removeImageInput').value = 1;
    });
</script>

@endsection