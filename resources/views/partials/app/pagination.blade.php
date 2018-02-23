@if($paginationTools->pagesNumber != 1)
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            @if($paginationTools->previousPage != 0)
                <li class="page-item">
                    <a class="page-link app-main-pagination" href="{{ $url . $paginationTools->previousPage }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @for($i = $paginationTools->currentPage -  $paginationTools->itemsBeforeAndAfter; $i < $paginationTools->currentPage; $i++)
                    @if($i > 0)
                        <li class="page-item">
                            <a class="page-link app-main-pagination" href="{{ $url . $i }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endif
                @endfor
            @endif

            <li class="page-item"><span class="page-link app-main-pagination-active">{{ $paginationTools->currentPage }}</span></li>

            @for($i = $paginationTools->currentPage + 1; $i <= $paginationTools->pagesNumber; $i++)
                <li class="page-item">
                    <a class="page-link app-main-pagination" href="{{ $url . $i }}">
                        {{ $i }}
                    </a>
                </li>
                @if($i >= $paginationTools->currentPage + $paginationTools->itemsBeforeAndAfter)
                    @break
                @endif
            @endfor

            @if($paginationTools->nextPage != 0)
                <li class="page-item">
                    <a class="page-link app-main-pagination" href="{{ $url . $paginationTools->nextPage }}" aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            @endif
        </ul>
        <div class="pagination justify-content-end">
            <small class="app-main-color">Page <strong class="badge badge-dark">{{ $paginationTools->currentPage }}</strong> sur <strong class="badge badge-dark">{{ $paginationTools->pagesNumber }}</strong></small>
        </div>
    </nav>
@endif




