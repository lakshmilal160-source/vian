@extends('dashboard.layout.default')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="fw-bold">
                <span class="text-muted fw-light">
                    Faq /
                </span>

                List
            </h4>

            <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">

                <i class="bx bx-plus"></i>

                Add Faq

            </a>

        </div>

        {{-- SEARCH --}}
        <div class="card mb-4">

            <div class="card-body">

                {{-- table --}}
                <div class="table-responsive text-nowrap">

                    <table class="table table-bordered align-middle">

                        <thead class="table-light">

                            <tr>

                                <th>#</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Order</th>
                                <th width="140">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($faqs as $faq)
                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>



                                    <td>

                                        {{ $faq->question }}

                                    </td>

                                    <td>
                                        {{ \Illuminate\Support\Str::limit($faq->answer, 50, '...') }}
                                    </td>
                                    <td>{{ $faq->sort_order }}</td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bx bx-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Delete this Faq?')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </td>


                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center">

                                        No Faqs found

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>


            </div>
            <div class="card-footer">

                {{ $faqs->links('dashboard.partials.pagination') }}

            </div>
        </div>


    </div>
@endsection


@section('jscript')
    <script>
        $(document).ready(function() {
            /**
             * DELETE CONFIRM
             */
            $('.delete-form').submit(function(e) {

                e.preventDefault();

                if (confirm('Delete this Faq?')) {

                    this.submit();

                }

            });

        });
    </script>
@endsection
