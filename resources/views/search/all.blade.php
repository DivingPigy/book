@extends('layouts.simple')

@section('body')
    <div class="container mt-xl" id="search-system">

        <div class="grid right-focus reverse-collapse gap-xl">
            <div>
                <div>
                    <h5>{{ trans('entities.search_advanced') }}</h5>

                    <form method="get" action="{{ url('/search') }}">
                        <h6>{{ trans('entities.search_terms') }}</h6>
                        <input type="text" name="search" value="{{ implode(' ', $options->searches) }}">

                        <h6>{{ trans('entities.search_content_type') }}</h6>
                        <div class="form-group">

                            <?php
                            $types = explode('|', $options->filters['type'] ?? '');
                            $hasTypes = $types[0] !== '';
                            ?>
                            @include('search.parts.type-filter', ['checked' => !$hasTypes || in_array('page', $types), 'entity' => 'page', 'transKey' => 'page'])
                            @include('search.parts.type-filter', ['checked' => !$hasTypes || in_array('chapter', $types), 'entity' => 'chapter', 'transKey' => 'chapter'])
                            <br>
                                @include('search.parts.type-filter', ['checked' => !$hasTypes || in_array('book', $types), 'entity' => 'book', 'transKey' => 'book'])
                                @include('search.parts.type-filter', ['checked' => !$hasTypes || in_array('bookshelf', $types), 'entity' => 'bookshelf', 'transKey' => 'shelf'])
                        </div>

                        <h6>{{ trans('entities.search_exact_matches') }}</h6>
                        @include('search.parts.term-list', ['type' => 'exact', 'currentList' => $options->exacts])

                        <h6>{{ trans('entities.search_tags') }}</h6>
                        @include('search.parts.term-list', ['type' => 'tags', 'currentList' => $options->tags])

                        <button type="submit" class="button">{{ trans('entities.search_update') }}</button>
                    </form>

                </div>
            </div>
            <div>
                <div class="card content-wrap">
                    <h1 class="list-heading">{{ trans('entities.search_results') }}</h1>

                    <form action="{{ url('/search') }}" method="GET"  class="search-box flexible hide-over-l">
                        <input value="{{$searchTerm}}" type="text" name="term" placeholder="{{ trans('common.search') }}">
                        <button type="submit">@icon('search')</button>
                    </form>

                    <h6 class="text-muted">{{ trans_choice('entities.search_total_results_found', $totalResults, ['count' => $totalResults]) }}</h6>
                    <div class="book-contents">
                        @include('entities.list', ['entities' => $entities, 'showPath' => true, 'showTags' => true])
                    </div>

                    @if($hasNextPage)
                        <div class="text-right mt-m">
                            <a href="{{ $nextPageLink }}" class="button outline">{{ trans('entities.search_more') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@stop
