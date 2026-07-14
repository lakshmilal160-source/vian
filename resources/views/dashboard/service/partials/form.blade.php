<div class="card">
    <div class="card-body">

        {{-- Global Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($method == 'PUT')
                @method('PUT')
            @endif

            {{-- TITLE --}}
            <div class="mb-3">
                <label class="form-label">Service Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $service->title ?? '') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- SHORT DESCRIPTION --}}
            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="short_description" rows="3" class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', $service->short_description ?? '') }}</textarea>

                @error('short_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- DESCRIPTION --}}
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea id="description" name="description" rows="10"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $service->description ?? '') }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- PRICE --}}
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" name="price"
                    class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price', $service->price ?? '') }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- ICON IMAGE --}}
            <div class="mb-3">
                <label class="form-label">Service Icon</label>

                <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror">

                @error('icon')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                @if (isset($service) && $service->icon)
                    <div class="mt-3 position-relative d-inline-block" id="icon-preview">
                        <img src="{{ asset('storage/' . $service->icon) }}" width="70" class="rounded border">

                        <button type="button"
                            class="btn btn-danger btn-sm rounded-circle position-absolute top-0 start-100 translate-middle remove-btn"
                            data-target="icon-preview" data-input="remove_icon"
                            style="width: 26px; height: 26px; padding: 0;">
                            ×
                        </button>
                    </div>

                    <input type="hidden" id="remove_icon" name="remove_icon" value="0">
                @endif
            </div>

            {{-- MAIN IMAGE --}}
            <div class="mb-3">
                <label class="form-label">Service Image</label>

                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">

                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                @if (isset($service) && $service->image)
                    <div class="mt-3 position-relative d-inline-block" id="image-preview">
                        <img src="{{ asset('storage/' . $service->image) }}" width="100" class="rounded border">

                        <button type="button"
                            class="btn btn-danger btn-sm rounded-circle position-absolute top-0 start-100 translate-middle remove-btn"
                            data-target="image-preview" data-input="remove_image"
                            style="width: 26px; height: 26px; padding: 0;">
                            ×
                        </button>
                    </div>

                    <input type="hidden" id="remove_image" name="remove_image" value="0">
                @endif
            </div>

            {{-- SORT ORDER --}}
            <div class="mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror"
                    value="{{ old('sort_order', $service->sort_order ?? 0) }}">
                @error('sort_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- STATUS --}}
            <div class="mb-3">
                <label class="form-label">Status</label>

                <select name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="1" {{ old('status', $service->status ?? 1) == 1 ? 'selected' : '' }}>
                        Active
                    </option>
                    <option value="0" {{ old('status', $service->status ?? 1) == 0 ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>

                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- <hr>
            <h5 class="mb-3">SEO Settings</h5> --}}

            {{-- META TITLE --}}
            {{-- <div class="mb-3">
                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title" class="form-control"
                    value="{{ old('meta_title', $service->meta_title ?? '') }}">
            </div> --}}

            {{-- META DESCRIPTION --}}
            {{-- <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description', $service->meta_description ?? '') }}</textarea>
            </div> --}}

            {{-- CANONICAL URL --}}
            {{-- <div class="mb-3">
                <label class="form-label">Canonical URL</label>
                <input type="text" name="canonical_url" class="form-control"
                    value="{{ old('canonical_url', $service->canonical_url ?? '') }}">
            </div> --}}

            {{-- OG TITLE --}}
            {{-- <div class="mb-3">
                <label class="form-label">OG Title</label>
                <input type="text" name="og_title" class="form-control"
                    value="{{ old('og_title', $service->og_title ?? '') }}">
            </div> --}}

            {{-- OG DESCRIPTION --}}
            {{-- <div class="mb-4">
                <label class="form-label">OG Description</label>
                <textarea name="og_description" rows="3" class="form-control">{{ old('og_description', $service->og_description ?? '') }}</textarea>
            </div> --}}

            {{-- BUTTONS --}}
            <div class="d-flex gap-2">
                <button class="btn btn-primary">
                    {{ $method == 'PUT' ? 'Update Service' : 'Save Service' }}
                </button>

                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>

@push('scripts')
    <script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.remove-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const previewId = this.dataset.target;
            const inputId = this.dataset.input;

            const preview = document.getElementById(previewId);
            const hiddenInput = document.getElementById(inputId);

            if (preview) {
                preview.remove();
            }

            if (hiddenInput) {
                hiddenInput.value = 1;
            }
        });
    });
});
</script>
@endpush
