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

            @if ($method == 'PUT')
                @method('PUT')
            @endif

            {{-- Question --}}
            <div class="mb-3">

                <label class="form-label">

                    Question

                </label>

                <input type="text" name="question" class="form-control"
                    value="{{ old('question', $faq->question ?? '') }}">

            </div>

            {{-- Answer --}}
            <div class="mb-3">

                <label class="form-label">

                    Answer

                </label>

                <textarea name="answer" class="form-control" rows="6">{{ old('answer', $faq->answer ?? '') }}</textarea>

            </div>
            {{-- SORT ORDER --}}
            <div class="mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror"
                    value="{{ old('sort_order', $faq->sort_order ?? 0) }}">
                @error('sort_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- STATUS --}}
            <div class="mb-3">

                <label class="form-label">

                    Status

                </label>

                <select name="status" class="form-select">

                    <option value="1" {{ old('status', $portfolio->status ?? 1) == 1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0" {{ old('status', $portfolio->status ?? 1) == 0 ? 'selected' : '' }}>
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

