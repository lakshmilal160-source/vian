<div class="card">
    <div class="card-body">

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ $action }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @if ($method !== 'POST')
                @method($method)
            @endif

            <div class="row g-4">

                {{-- Name --}}
                <div class="col-md-6">
                    <label class="form-label">Name *</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $testimonial->name ?? '') }}"
                        required>
                </div>

                {{-- Designation --}}
                <div class="col-md-6">
                    <label class="form-label">Designation</label>
                    <input
                        type="text"
                        name="designation"
                        class="form-control"
                        value="{{ old('designation', $testimonial->designation ?? '') }}">
                </div>

                {{-- Company --}}
                <div class="col-md-6">
                    <label class="form-label">Company</label>
                    <input
                        type="text"
                        name="company"
                        class="form-control"
                        value="{{ old('company', $testimonial->company ?? '') }}">
                </div>

                {{-- Rating --}}
                <div class="col-md-3">
                    <label class="form-label">Rating</label>
                    <select name="rating" class="form-select">
                        @for ($i = 1; $i <= 5; $i++)
                            <option
                                value="{{ $i }}"
                                {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>
                                {{ $i }} Star
                            </option>
                        @endfor
                    </select>
                </div>

                {{-- Status --}}
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select
                        name="status"
                        class="form-select">
                        <option value="1"
                            {{ old('status', $testimonial->status ?? 1) == 1 ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="0"
                            {{ old('status', $testimonial->status ?? 1) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                {{-- Sort Order --}}
                <div class="col-md-3">
                    <label class="form-label">Sort Order</label>
                    <input
                        type="number"
                        name="sort_order"
                        class="form-control"
                        value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
                </div>

                {{-- Image --}}
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/*">

                    {{-- Existing Image --}}
                    @if (isset($testimonial) && $testimonial->image)
                        <div
                            class="mt-3 position-relative d-inline-block"
                            id="image-preview">

                            <img
                                src="{{ asset('storage/' . $testimonial->image) }}"
                                width="100"
                                class="rounded border">

                            <button
                                type="button"
                                class="btn btn-danger btn-sm rounded-circle position-absolute top-0 start-100 translate-middle remove-btn"
                                data-target="image-preview"
                                data-input="remove_image"
                                style="width:26px;height:26px;padding:0;">
                                ×
                            </button>
                        </div>

                        <input
                            type="hidden"
                            id="remove_image"
                            name="remove_image"
                            value="0">
                    @endif
                </div>

                {{-- Message --}}
                <div class="col-12">
                    <label class="form-label">Message</label>
                    <textarea
                        name="message"
                        rows="5"
                        class="form-control">{{ old('message', $testimonial->message ?? '') }}</textarea>
                </div>

                {{-- Buttons --}}
                <div class="col-12">
                    <button
                        type="submit"
                        class="btn btn-primary">
                        {{ $method === 'POST' ? 'Save' : 'Update' }}
                    </button>

                    <a
                        href="{{ route('admin.testimonials.index') }}"
                        class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.remove-btn').forEach(button => {
        button.addEventListener('click', function () {

            const previewId = this.dataset.target;
            const inputId = this.dataset.input;

            // Hide preview
            const preview = document.getElementById(previewId);
            if (preview) {
                preview.style.display = 'none';
            }

            // Set hidden input
            const hiddenInput = document.getElementById(inputId);
            if (hiddenInput) {
                hiddenInput.value = 1;
            }
        });
    });

});
</script>
@endpush