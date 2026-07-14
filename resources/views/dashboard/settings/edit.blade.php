@extends('dashboard.layout.default')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- PAGE TITLE --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="fw-bold">

                <span class="text-muted fw-light">
                    Settings /
                </span>

                General Settings

            </h4>

        </div>

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

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                {{-- LEFT SIDE --}}
                <div class="col-lg-8">

                    {{-- CONTACT INFORMATION --}}
                    <div class="card mb-4">

                        <div class="card-header">

                            <h5 class="mb-0">
                                Contact Information
                            </h5>

                        </div>

                        <div class="card-body">

                            <div class="row">

                                {{-- PHONE 1 --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Phone Number 1
                                    </label>

                                    <div class="input-group">

                                        <select name="phone_1_country_code_id" class="form-select" style="max-width:200px;">

                                            <option value="">
                                                Select
                                            </option>

                                            @foreach ($countryCodes as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ old('phone_1_country_code_id', $setting->phone_1_country_code_id ?? '') == $country->id ? 'selected' : '' }}>

                                                    {{ $country->nicename }}
                                                    (+{{ $country->phonecode }})
                                                </option>
                                            @endforeach

                                        </select>

                                        <input type="text" name="phone_1" class="form-control" placeholder="9876543210"
                                            value="{{ old('phone_1', $setting->phone_1 ?? '') }}">

                                    </div>

                                </div>

                                {{-- PHONE 2 --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Phone Number 2
                                    </label>

                                    <div class="input-group">


                                        <select name="phone_2_country_code_id" class="form-select" style="max-width:200px;">

                                            <option value="">
                                                Select
                                            </option>

                                            @foreach ($countryCodes as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ old('phone_2_country_code_id', $setting->phone_2_country_code_id ?? '') == $country->id ? 'selected' : '' }}>

                                                    {{ $country->nicename }}
                                                    (+{{ $country->phonecode }})
                                                </option>
                                            @endforeach

                                        </select>

                                        <input type="text" name="phone_2" class="form-control" placeholder="9876543210"
                                            value="{{ old('phone_2', $setting->phone_2 ?? '') }}">

                                    </div>

                                </div>

                                {{-- EMAIL --}}
                                <div class="col-md-12 mb-3">

                                    <label class="form-label">

                                        Email Address

                                    </label>

                                    <input type="email" name="email" class="form-control" placeholder="info@example.com"
                                        value="{{ old('email', $setting->email ?? '') }}">

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- ADDRESS --}}
                    <div class="card mb-4">

                        <div class="card-header">

                            <h5 class="mb-0">
                                Address Information
                            </h5>

                        </div>

                        <div class="card-body">

                            <div class="row">

                                {{-- ADDRESS --}}
                                <div class="col-md-12 mb-3">

                                    <label class="form-label">

                                        Address

                                    </label>

                                    <textarea name="address" class="form-control" rows="3" placeholder="Full address">{{ old('address', $setting->address ?? '') }}</textarea>

                                </div>

                                {{-- STREET --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Street

                                    </label>

                                    <input type="text" name="street" class="form-control"
                                        value="{{ old('street', $setting->street ?? '') }}">

                                </div>

                                {{-- STATE --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        State

                                    </label>

                                    <input type="text" name="state" class="form-control"
                                        value="{{ old('state', $setting->state ?? '') }}">

                                </div>

                                {{-- COUNTRY --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Country

                                    </label>

                                    <input type="text" name="country" class="form-control"
                                        value="{{ old('country', $setting->country ?? '') }}">

                                </div>

                                {{-- PIN CODE --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Pin Code

                                    </label>

                                    <input type="text" name="pin_code" class="form-control"
                                        value="{{ old('pin_code', $setting->pin_code ?? '') }}">

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- SOCIAL MEDIA --}}
                    <div class="card mb-4">

                        <div class="card-header">

                            <h5 class="mb-0">
                                Social Media Links
                            </h5>

                        </div>

                        <div class="card-body">

                            <div class="row">

                                {{-- FACEBOOK --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Facebook URL

                                    </label>

                                    <input type="url" name="facebook" class="form-control"
                                        placeholder="https://facebook.com/"
                                        value="{{ old('facebook', $setting->facebook ?? '') }}">

                                </div>

                                {{-- INSTAGRAM --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Instagram URL

                                    </label>

                                    <input type="url" name="instagram" class="form-control"
                                        placeholder="https://instagram.com/"
                                        value="{{ old('instagram', $setting->instagram ?? '') }}">

                                </div>

                                {{-- YOUTUBE --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        YouTube URL

                                    </label>

                                    <input type="url" name="youtube" class="form-control"
                                        placeholder="https://youtube.com/"
                                        value="{{ old('youtube', $setting->youtube ?? '') }}">

                                </div>

                                {{-- TWITTER --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Twitter/X URL

                                    </label>

                                    <input type="url" name="twitter" class="form-control"
                                        placeholder="https://twitter.com/"
                                        value="{{ old('twitter', $setting->twitter ?? '') }}">

                                </div>

                                {{-- LINKEDIN --}}
                                <div class="col-md-12 mb-3">

                                    <label class="form-label">

                                        LinkedIn URL

                                    </label>

                                    <input type="url" name="linkedin" class="form-control"
                                        placeholder="https://linkedin.com/"
                                        value="{{ old('linkedin', $setting->linkedin ?? '') }}">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- RIGHT SIDE --}}
                <div class="col-lg-4">

                    {{-- BRANDING --}}
                    <div class="card mb-4">

                        <div class="card-header">

                            <h5 class="mb-0">
                                Branding
                            </h5>

                        </div>

                        <div class="card-body">

                            {{-- LOGO --}}
                            <div class="mb-4">

                                <label class="form-label">

                                    Website Logo

                                </label>

                                <input type="file" name="logo" id="logoInput" class="form-control">

                                {{-- PREVIEW --}}
                                <div class="mt-3 position-relative d-inline-block">

                                    <img id="logoPreview"
                                        src="{{ isset($setting->logo) ? asset('storage/' . $setting->logo) : 'https://placehold.co/200x80?text=Logo' }}"
                                        class="img-fluid border rounded p-2" style="max-height:120px;">

                                    @if (isset($setting->logo) && $setting->logo)
                                        <button type="button" id="removeLogoBtn"
                                            class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle">

                                            ×

                                        </button>
                                    @endif

                                </div>

                                <input type="hidden" name="remove_logo" id="removeLogoInput" value="0">

                            </div>

                            {{-- FAVICON --}}
                            <div class="mb-4">

                                <label class="form-label">

                                    Favicon

                                </label>

                                <input type="file" name="favicon" id="faviconInput" class="form-control">

                                {{-- PREVIEW --}}
                                <div class="mt-3 position-relative d-inline-block">

                                    <img id="faviconPreview"
                                        src="{{ isset($setting->favicon) ? asset('storage/' . $setting->favicon) : 'https://placehold.co/80x80?text=Icon' }}"
                                        class="img-fluid border rounded p-2" style="max-height:80px;">

                                    @if (isset($setting->favicon) && $setting->favicon)
                                        <button type="button" id="removeFaviconBtn"
                                            class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle">

                                            ×

                                        </button>
                                    @endif

                                </div>

                                <input type="hidden" name="remove_favicon" id="removeFaviconInput" value="0">

                            </div>

                            {{-- SUBMIT --}}
                            <button type="submit" class="btn btn-primary w-100">

                                Save Settings

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

@endsection


@section('jscript')
    <script>
        $(document).ready(function() {

            /*
            |--------------------------------------------------------------------------
            | Logo Preview
            |--------------------------------------------------------------------------
            */
            $('#logoInput').on('change', function(e) {

                const reader = new FileReader();

                reader.onload = function(e) {
                    $('#logoPreview').attr('src', e.target.result);
                };

                reader.readAsDataURL(this.files[0]);

            });

            /*
            |--------------------------------------------------------------------------
            | Favicon Preview
            |--------------------------------------------------------------------------
            */
            $('#faviconInput').on('change', function(e) {

                const reader = new FileReader();

                reader.onload = function(e) {
                    $('#faviconPreview').attr('src', e.target.result);
                };

                reader.readAsDataURL(this.files[0]);

            });

            /*
            |--------------------------------------------------------------------------
            | Remove Logo
            |--------------------------------------------------------------------------
            */
            $('#removeLogoBtn').on('click', function() {

                $('#logoPreview').attr(
                    'src',
                    'https://placehold.co/200x80?text=Logo'
                );

                $('#removeLogoInput').val(1);

            });

            /*
            |--------------------------------------------------------------------------
            | Remove Favicon
            |--------------------------------------------------------------------------
            */
            $('#removeFaviconBtn').on('click', function() {

                $('#faviconPreview').attr(
                    'src',
                    'https://placehold.co/80x80?text=Icon'
                );

                $('#removeFaviconInput').val(1);

            });

        });
    </script>
@endsection
