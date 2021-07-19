@if ($paginator->hasPages())
    <nav class="d-md-flex justify-content-between align-items-center border-top pt-3"
         aria-label="Page navigation example">
        <div class="text-center text-md-left mb-3 mb-md-0"></div>
            <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item page-link current" wire:click="gotoPage({{$page}})">{{$page}}</li>
                            @else
                                <li class="page-item page-link" wire:click="gotoPage({{$page}})">{{$page}}</li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>
    </nav>
@endif
