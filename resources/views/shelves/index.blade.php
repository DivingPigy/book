@extends('layouts.tri')

@section('body')
    @include('shelves.parts.list', ['shelves' => $shelves, 'view' => $view])
@stop

@section('right')

    <div class="actions mb-xl">
        <div class="icon-list text-primary">
            @if(userCan('bookshelf-create-all'))
                <a href="{{ url("/create-shelf") }}" class="icon-list-item">
                    <span>@icon('add')</span>
                    <span>{{ trans('entities.shelves_new_action') }}</span>
                </a>
            @endif

            <a href="{{ url('/tags') }}" class="icon-list-item">
                <span>@icon('tag')</span>
                <span>{{ trans('entities.tags_view_tags') }}</span>
            </a>
        </div>
    </div>

@stop