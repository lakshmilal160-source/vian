<div class="card">

    <div class="card-body">

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

        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">

            @csrf

            @if($method == 'PUT')
                @method('PUT')
            @endif

            {{-- TITLE --}}
            <div class="mb-3">

                <label class="form-label">

                    Title

                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $portfolio->title ?? '') }}"
                >

            </div>

            {{-- DESCRIPTION --}}
          <textarea id="description"
          name="description"
          rows="10"
          class="form-control">
    {{ old('description', $portfolio->description ?? '') }}
</textarea>

            {{-- IMAGE --}}
            <div class="mb-4">

                <label class="form-label">

                    Portfolio Image

                </label>

                <input
                    type="file"
                    name="image"
                    id="imageInput"
                    class="form-control"
                >

                <div class="mt-3 position-relative d-inline-block">

                    <img
                        id="imagePreview"
                        src="{{ isset($portfolio->image) ? asset('storage/' . $portfolio->image) : 'https://placehold.co/300x200?text=Preview' }}"
                        class="img-fluid border rounded p-2"
                        style="max-height:200px;"
                    >

                    @if(isset($portfolio->image))

                        <button
                            type="button"
                            id="removeImageBtn"
                            class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle"
                        >

                            ×

                        </button>

                    @endif

                </div>

                <input
                    type="hidden"
                    name="remove_image"
                    id="removeImageInput"
                    value="0"
                >

            </div>

            {{-- STATUS --}}
            <div class="mb-3">

                <label class="form-label">

                    Status

                </label>

                <select name="status" class="form-select">

                    <option value="1"
                        {{ old('status', $portfolio->status ?? 1) == 1 ? 'selected' : '' }}
                    >
                        Active
                    </option>

                    <option value="0"
                        {{ old('status', $portfolio->status ?? 1) == 0 ? 'selected' : '' }}
                    >
                        Inactive
                    </option>

                </select>

            </div>

            <button class="btn btn-primary">

                Save Portfolio

            </button>

        </form>

    </div>

</div>

@push('scripts')

<script>

$(document).ready(function () {

    /**
    * IMAGE PREVIEW
    */
    $('#imageInput').change(function () {

        let reader = new FileReader();

        reader.onload = function (e) {

            $('#imagePreview').attr('src', e.target.result);

        };

        reader.readAsDataURL(this.files[0]);

    });

    /**
    * REMOVE IMAGE
    */
    $('#removeImageBtn').click(function () {

        $('#imagePreview').attr(
            'src',
            'https://placehold.co/300x200?text=Preview'
        );

        $('#removeImageInput').val(1);

    });

});

</script>

@endpush