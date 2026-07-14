@if ($paginator->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">

        {{-- Counter --}}
        <div>
            Showing
            {{ $paginator->firstItem() ?? 0 }}
            to
            {{ $paginator->lastItem() ?? 0 }}
            of
            {{ $paginator->total() }}
            entries
        </div>

        {{-- Sneat Pagination --}}
        <div class="demo-inline-spacing">
            <nav aria-label="Page navigation">
                <ul class="pagination mb-0">

                    {{-- First --}}
                    <li class="page-item first {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ $paginator->onFirstPage() ? 'javascript:void(0);' : $paginator->url(1) }}">
                            <i class="tf-icon bx bx-chevrons-left"></i>
                        </a>
                    </li>

                    {{-- Prev --}}
                    <li class="page-item prev {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ $paginator->onFirstPage() ? 'javascript:void(0);' : $paginator->previousPageUrl() }}">
                            <i class="tf-icon bx bx-chevron-left"></i>
                        </a>
                    </li>

                    {{-- Page Numbers --}}
                    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach

                    {{-- Next --}}
                    <li class="page-item next {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ $paginator->hasMorePages() ? $paginator->nextPageUrl() : 'javascript:void(0);' }}">
                            <i class="tf-icon bx bx-chevron-right"></i>
                        </a>
                    </li>

                    {{-- Last --}}
                    <li class="page-item last {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ $paginator->hasMorePages() ? $paginator->url($paginator->lastPage()) : 'javascript:void(0);' }}">
                            <i class="tf-icon bx bx-chevrons-right"></i>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>

    </div>
@endif