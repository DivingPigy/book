<header id="header" component="header-mobile-toggle" class="primary-background">
    <div class="grid mx-l">

        <div>
            <a href="{{ url('/') }}" class="logo">
                @if(setting('app-logo', '') !== 'none')
                    <img class="logo-image" src="{{ setting('app-logo', '') === '' ? url('/logo.png') : url(setting('app-logo', '')) }}" alt="Logo">
                @endif
                @if (setting('app-name-header'))
                    <span class="logo-text">{{ setting('app-name') }}</span>
                @endif
            </a>
            <button type="button"
                    refs="header-mobile-toggle@toggle"
                    title="{{ trans('common.header_menu_expand') }}"
                    aria-expanded="false"
                    class="mobile-menu-toggle hide-over-l">@icon('more')</button>
        </div>

        <div class="flex-container-row justify-center hide-under-l">
            <form action="{{ url('/search') }}" method="GET" class="search-box" role="search">
                <button id="header-search-box-button" type="submit" aria-label="{{ trans('common.search') }}" tabindex="-1">@icon('search') </button>
                <input id="header-search-box-input" type="text" name="term"
                       aria-label="{{ trans('common.search') }}" placeholder="{{ trans('common.search') }}"
                       value="{{ isset($searchTerm) ? $searchTerm : '' }}">
            </form>
        </div>

        <div class="text-right">
            <nav refs="header-mobile-toggle@menu" class="header-links">
                <div class="links text-center">
                    <a class="hide-over-l" href="{{ url('/search') }}">@icon('search'){{ trans('common.search') }}</a>
                    <a href="{{ url('/shelves') }}">@icon('bookshelf'){{ trans('entities.shelves') }}</a>
                    <a href="{{ url('/books') }}">@icon('books'){{ trans('entities.books') }}</a>
                </div>                    
            </nav>
        </div>

    </div>
</header>
