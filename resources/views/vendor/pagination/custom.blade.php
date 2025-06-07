@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center shadow-sm p-3 rounded-pill bg-white dark:bg-gray-800">
            {{-- Tombol Sebelumnya --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link rounded-pill text-muted bg-light dark:bg-gray-700 dark:text-gray-400 px-4">&laquo; Sebelumnya</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded-pill bg-primary text-white dark:bg-blue-600 px-4 hover:shadow-md transition-all"
                       href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        &laquo; Sebelumnya
                    </a>
                </li>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link rounded-pill text-muted bg-light dark:bg-gray-700 dark:text-gray-400 px-3">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link rounded-pill bg-success text-white px-4 fw-bold dark:bg-green-600">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link rounded-pill bg-light text-dark px-4 hover:shadow-sm dark:bg-gray-700 dark:text-white transition-all"
                                   href="{{ $url }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Berikutnya --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded-pill bg-primary text-white dark:bg-blue-600 px-4 hover:shadow-md transition-all"
                       href="{{ $paginator->nextPageUrl() }}" rel="next">
                        Berikutnya &raquo;
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link rounded-pill text-muted bg-light dark:bg-gray-700 dark:text-gray-400 px-4">Berikutnya &raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
