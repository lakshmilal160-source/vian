<div class="card">

    <div class="card-body">

        {{-- ERRORS --}}
        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

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

            {{-- NAME --}}
            <div class="mb-3">

                <label class="form-label">

                    Client Name

                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $client->name ?? '') }}"
                >

            </div>

            {{-- WEBSITE --}}
            <div class="mb-3">

                <label class="form-label">

                    Website

                </label>

                <input
                    type="url"
                    name="website"
                    class="form-control"
                    value="{{ old('website', $client->website ?? '') }}"
                >

            </div>

            {{-- LOGO --}}
            <div class="mb-4">

                <label class="form-label">

                    Client Logo

                </label>

                <input
                    type="file"
                    name="logo"
                    id="logoInput"
                    class="form-control"
                >

                <div class="mt-3 position-relative d-inline-block">

                    <img
                        id="logoPreview"
                        src="{{ isset($client->logo) ? asset('storage/' . $client->logo) : 'https://placehold.co/200x120?text=Logo' }}"
                        class="img-fluid border rounded p-2"
                        style="max-height:120px;"
                    >

                    @if(isset($client->logo))

                        <button
                            type="button"
                            id="removeLogoBtn"
                            class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle"
                        >

                            ×

                        </button>

                    @endif

                </div>

                <input
                    type="hidden"
                    name="remove_logo"
                    id="removeLogoInput"
                    value="0"
                >

            </div>

            {{-- STATUS --}}
            <div class="mb-4">

                <label class="form-label">

                    Status

                </label>

                <select name="status" class="form-select">

                    <option value="1"
                        {{ old('status', $client->status ?? 1) == 1 ? 'selected' : '' }}
                    >
                        Active
                    </option>

                    <option value="0"
                        {{ old('status', $client->status ?? 1) == 0 ? 'selected' : '' }}
                    >
                        Inactive
                    </option>

                </select>

            </div>

            <button class="btn btn-primary">

                Save Client

            </button>

        </form>

    </div>

</div>

@push('scripts')

<script>

$(document).ready(function () {

    /**
    * LOGO PREVIEW
    */
    $('#logoInput').change(function () {

        let reader = new FileReader();

        reader.onload = function (e) {

            $('#logoPreview').attr('src', e.target.result);

        };

        reader.readAsDataURL(this.files[0]);

    });

    /**
    * REMOVE LOGO
    */
    $('#removeLogoBtn').click(function () {

        $('#logoPreview').attr(
            'src',
            'https://placehold.co/200x120?text=Logo'
        );

        $('#removeLogoInput').val(1);

    });

});

</script>

@endpush