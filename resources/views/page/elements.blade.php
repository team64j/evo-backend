@extends('page')

@section('title')
    @component('partials.title', ['icon' => $icon, 'help' => $help])
        @lang('global.' . $element)
    @endcomponent
@endsection

@section('actions')
    @include('partials.actions', [
        'new' => [
            'title' => __('global.new_template'),
            'to' => url('/templates/new'),
        ],
    ])
@endsection

@section('navigations')
    @if(!empty($navigations))
        @include('partials.pills', [
            'active' => $element,
            'data' => $navigations,
        ])
    @endif
@endsection

@section('content')
    @php($category = -1)

    <table class="table">
        <thead>
        <tr>
            <th style="width: 1%">@lang('global.id')</th>
            <th>@lang('global.name')</th>
            <th>@lang('global.description')</th>
        </tr>
        </thead>
        @foreach($elements as $key => $item)
            @if(!$item instanceof \EvolutionCMS\Models\Category)
                @if($category != $item->category)
                    @php($category = $item->category)
                    <thead data-category="{{ $category ?? 0 }}">
                    <tr>
                        <th>
                            <i class="fa far fa-minus-square"></i>
                        </th>
                        <th colspan="2">
                            {{ $category ? $item->categories->category : __('global.no_category') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                @endif
            @elseif($key == 0)
                <tbody>
                @endisset

                <tr>
                    <td>
                        {{ $item->id }}
                    </td>
                    <td nowrap>
                        @if(!empty($icon))
                            <i class="{{ $icon }} me-2"></i>
                        @endif

                        <a href="{{ url($element . '/' . $item->getkey()) }}">{{ $item->name }}</a>
                    </td>
                    <td>
                        <small class="text-muted">{!! $item->description ?? '' !!}</small>
                    </td>
                </tr>
                @endforeach

                </tbody>
                @if($elements->hasPages())
                    <tfoot>
                    <tr>
                        <td colspan="3">
                            {{ $elements->links() }}
                        </td>
                    </tr>
                    </tfoot>
                @endif
    </table>
@endsection
