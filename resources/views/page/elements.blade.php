@extends('page')

@section('title')
    @include('partials.title', ['icon' => $icon, 'title' => __('global.' . $element), 'help' => $help])
@endsection

@section('content')
    <ul class="nav nav-pills mb-3 flex-grow-0 d-flex flex-nowrap px-3 overflow-auto">
        <li class="nav-item">
            <a href="elements/templates"
               class="nav-link py-1 text-nowrap {{ $element == 'templates' ? 'active' : '' }}">
                @lang('global.templates')
            </a>
        </li>
        <li class="nav-item">
            <a href="elements/tmplvars"
               class="nav-link py-1 text-nowrap {{ $element == 'tmplvars' ? 'active' : '' }}">
                @lang('global.tmplvars')
            </a>
        </li>
        <li class="nav-item">
            <a href="elements/htmlsnippets"
               class="nav-link py-1 text-nowrap {{ $element == 'htmlsnippets' ? 'active' : '' }}">
                @lang('global.htmlsnippets')
            </a>
        </li>
        <li class="nav-item">
            <a href="elements/snippets"
               class="nav-link py-1 text-nowrap {{ $element == 'snippets' ? 'active' : '' }}">
                @lang('global.snippets')
            </a>
        </li>
        <li class="nav-item">
            <a href="elements/plugins"
               class="nav-link py-1 text-nowrap {{ $element == 'plugins' ? 'active' : '' }}">
                @lang('global.plugins')
            </a>
        </li>
        <li class="nav-item">
            <a href="elements/modules"
               class="nav-link py-1 text-nowrap {{ $element == 'modules' ? 'active' : '' }}">
                @lang('global.modules')
            </a>
        </li>
        <li class="nav-item">
            <a href="elements/categories"
               class="nav-link py-1 text-nowrap {{ $element == 'categories' ? 'active' : '' }}">
                @lang('global.categories')
            </a>
        </li>
    </ul>

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
                <td>
                    <i class="{{ $icon }}"></i>
                    {{ $item->name }}
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
