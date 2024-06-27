@extends('page')

@section('title')
    @include('partials.title', ['icon' => $icon, 'title' => __('global.' . $element)])
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
            <a href="elements/tvs"
               class="nav-link py-1 text-nowrap {{ $element == 'tmplvars' ? 'active' : '' }}">
                @lang('global.tmplvars')
            </a>
        </li>
        <li class="nav-item">
            <a href="elements/chunks"
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

    <table class="table">
        <tbody>
        @foreach($elements as $item)
            <tr>
                <td>
                    {{ $item->id }}
                </td>
                <td>
                    {{ $item->name }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection