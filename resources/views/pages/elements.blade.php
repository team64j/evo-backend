@extends('page')

@section('title')
    @include('partials.title', ['icon' => $icon, 'title' => __('global.' . $element)])
@endsection

@section('content')
    <ul class="nav nav-pills mb-3 flex-grow-0 d-flex flex-nowrap px-3 overflow-auto">
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap {{ $element == 'templates' ? 'active' : '' }}"
                    type="button"
                    onclick="app.routeTo('/elements/templates')">
                @lang('global.templates')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap {{ $element == 'tmplvars' ? 'active' : '' }}"
                    type="button"
                    onclick="app.routeTo('/elements/tvs')">
                @lang('global.tmplvars')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap {{ $element == 'htmlsnippets' ? 'active' : '' }}"
                    type="button"
                    onclick="app.routeTo('/elements/chunks')">
                @lang('global.htmlsnippets')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap {{ $element == 'snippets' ? 'active' : '' }}"
                    type="button"
                    onclick="app.routeTo('/elements/snippets')">
                @lang('global.snippets')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap {{ $element == 'plugins' ? 'active' : '' }}"
                    type="button"
                    onclick="app.routeTo('/elements/plugins')">
                @lang('global.plugins')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap {{ $element == 'modules' ? 'active' : '' }}"
                    type="button"
                    onclick="app.routeTo('/elements/modules')">
                @lang('global.modules')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap {{ $element == 'categories' ? 'active' : '' }}"
                    type="button"
                    onclick="app.routeTo('/elements/categories')">
                @lang('global.categories')
            </button>
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
