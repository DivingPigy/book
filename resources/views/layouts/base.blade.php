<!DOCTYPE html>
<html lang="{{ config('app.lang') }}"
      dir="{{ config('app.rtl') ? 'rtl' : 'ltr' }}"
      class="@yield('body-class')">
<head>
    <title>学易 | 讲义</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{ versioned_asset('dist/styles.css') }}">
    <link rel="stylesheet" media="print" href="{{ versioned_asset('dist/print-styles.css') }}">

    @yield('mathjax')
    
    @yield('head')

    <!-- Custom Styles & Head Content -->
    @include('common.custom-styles')
    @include('common.custom-head')

    @stack('head')

    <!-- Translations for JS -->
    @stack('translations')
</head>
<body class="@yield('body-class')">
    <a class="px-m py-s skip-to-content-link print-hidden" href="#main-content">{{ trans('common.skip_to_main_content') }}</a>

    <header id="header" component="header-mobile-toggle" class="primary-background">
        <div class="grid mx-l">

            <div>
                <a href="{{ url('/') }}" class="logo">
                    @if(setting('app-logo', '') !== 'none')
                        <img class="logo-image" src="{{ setting('app-logo', '') === '' ? url('/logo.png') : url(setting('app-logo', '')) }}" alt="Logo">
                    @endif
                    @if (setting('app-name-header'))
                        <span class="logo-text">学易</span>
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

    <div id="content" components="@yield('content-components')" class="block">
        @yield('content')
    </div>

    @if(count(setting('app-footer-links', [])) > 0)
        <footer>
            @foreach(setting('app-footer-links', []) as $link)
                <a href="{{ $link['url'] }}" target="_blank" rel="noopener">{{ strpos($link['label'], 'trans::') === 0 ? trans(str_replace('trans::', '', $link['label'])) : $link['label'] }}</a>
            @endforeach
        </footer>
    @endif

    <div back-to-top class="primary-background print-hidden">
        <div class="inner">
            @icon('chevron-up') <span>{{ trans('common.back_to_top') }}</span>
        </div>
    </div>

    @yield('bottom')
    <script src="{{ versioned_asset('dist/app.js') }}" nonce="{{ $cspNonce }}"></script>
    @yield('scripts')

</body>
</html>
