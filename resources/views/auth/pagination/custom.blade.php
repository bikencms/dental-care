@if ($paginator->hasPages())
    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
        {{-- 1. Cụm nút Phân trang --}}
        <nav aria-label="Page navigation example">
            <ul class="pagination mb-0">
                {{-- Nút Previous --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
                    </li>
                @endif

                {{-- Danh sách các trang --}}
                @foreach ($elements as $element)
                    {{-- Dấu phân cách "..." --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Mảng các trang có link --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Nút Next --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Next</span>
                    </li>
                @endif
            </ul>
        </nav>

        {{-- 2. Thống kê số lượng dòng đang hiển thị --}}
        <div class="fw-normal small mt-4 mt-lg-0">
            Showing <b>{{ $paginator->firstItem() }}</b> to <b>{{ $paginator->lastItem() }}</b> of <b>{{ $paginator->total() }}</b> entries
        </div>
    </div>
@else
    {{-- Trường hợp chỉ có 1 trang (hoặc không có dữ liệu) vẫn hiển thị dòng thông kê nếu cần --}}
    @if ($paginator->total() > 0)
        <div class="d-flex justify-content-end">
            <div class="fw-normal small mt-4 mt-lg-0">
                Showing <b>{{ $paginator->firstItem() }}</b> to <b>{{ $paginator->lastItem() }}</b> of <b>{{ $paginator->total() }}</b> entries
            </div>
        </div>
    @endif
@endif