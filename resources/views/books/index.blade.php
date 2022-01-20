@extends('layouts.tri')

@section('body')
    @include('books.parts.list', ['books' => $books, 'view' => $view])
@stop

@section('left')

@stop

@section('right')

    <div class="actions mb-xl">
        <div class="icon-list text-primary">
            @if(user()->can('book-create-all'))
                <a href="{{ url("/create-book") }}" class="icon-list-item">
                    <span>@icon('add')</span>
                    <span>{{ trans('entities.books_create') }}</span>
                </a>
            @endif

            <a href="{{ url('/tags') }}" class="icon-list-item">
                <span>@icon('tag')</span>
                <span>{{ trans('entities.tags_view_tags') }}</span>
            </a>
        </div>
    </div>

@stop