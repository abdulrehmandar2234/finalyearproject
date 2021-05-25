<div class="col align-self-center" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <!-- Search-Form -->
    <form class="js-focus-state" method="GET" action="{{route('search_product')}}">
        <label class="sr-only" for="searchProduct">Search</label>
        <div class="input-group">
            <input
                wire:model.debounce.500ms="search"
                x-ref="search"
                @keydown.window="
            if (event.keyCode === 191) {
            event.preventDefault();
            $refs.search.focus();
            }
            "
                @focus="isOpen = true"
                @keydown="isOpen = true"
                @keydown.escape.window="isOpen = false"
                @keydown.shift.tab="isOpen = false"
                type="text"
                class="form-control py-2 pl-5 font-size-15 border-0 height-40 rounded-left-pill"
                name="query" id="searchProduct" placeholder="Search for Products"
                aria-label="Search for Products" aria-describedby="searchProduct1" required>
            <div class="input-group-append">
                <button class="btn btn-dark height-40 py-2 px-3 rounded-right-pill" type="submit"
                        id="searchProduct1">
                    <span class="ec ec-search font-size-24"></span>
                </button>
            </div>
        </div>
    </form>
    <!-- End Search-Form -->
    @if (strlen($search) >= 2)
        <div class="rounded w-80 mt-4 list-result" x-show.transition.opacity="isOpen">
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults->take(5) as $result)
                        <form class="js-focus-state" method="GET" action="{{route('search_product')}}">
                            <input type="hidden" name="query" value="{{$result->title}}">
                            <li>
                                <button class="block ser-txt-clr"
                                        @if ($loop->last) @keydown.tab="isOpen = false" @endif>
                                    <span>{{ $result->title }}</span>
                                </button>
                            </li>
                        </form>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>
