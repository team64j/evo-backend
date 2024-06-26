@extends('page')

@section('title')
    @include('partials.title', ['icon' => 'fa-sliders', 'title' => __('global.settings_title')])
@endsection

@section('content')
    <ul class="nav nav-pills mb-3 flex-grow-0 d-flex flex-nowrap px-3 overflow-auto">
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap active" data-bs-toggle="pill" data-bs-target="#settings_site"
                    type="button">
                @lang('global.settings_site')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap" data-bs-toggle="pill" data-bs-target="#settings_furls"
                    type="button">
                @lang('global.settings_furls')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap" data-bs-toggle="pill" data-bs-target="#settings_ui"
                    type="button">
                @lang('global.settings_ui')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap" data-bs-toggle="pill" data-bs-target="#settings_security"
                    type="button">
                @lang('global.settings_security')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap" data-bs-toggle="pill" data-bs-target="#settings_misc"
                    type="button">
                @lang('global.settings_misc')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap" data-bs-toggle="pill" data-bs-target="#settings_KC"
                    type="button">
                @lang('global.settings_KC')
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link py-1 text-nowrap" data-bs-toggle="pill" data-bs-target="#settings_email_templates"
                    type="button">
                @lang('global.settings_email_templates')
            </button>
        </li>
    </ul>
    <div class="tab-content flex-grow-1 px-3 overflow-auto">
        <div class="tab-pane fade show active" id="settings_site">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>@lang('global.description')</th>
                    <th>@lang('global.name')</th>
                    <th>@lang('global.value')</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>@lang('global.sitename_title')</td>
                    <td>site_name</td>
                    <td>
                        <input type="text" name="site_name" class="form-control"
                               value="{{ config('global.site_name') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.sitestatus_title')
                        <i class="fa far fa-question-circle" title="@lang('global.sitename_message')"></i>
                    </td>
                    <td>site_status</td>
                    <td>
                        <select name="site_status" class="form-select">
                            <option value="0" @selected(config('global.site_status') == 0)>
                                @lang('global.no')
                            </option>
                            <option value="1" @selected(config('global.site_status') == 1)>
                                @lang('global.yes')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.server_protocol_title')
                        <i class="fa far fa-question-circle" title="@lang('global.server_protocol_message')"></i>
                    </td>
                    <td>server_protocol</td>
                    <td>
                        <select name="server_protocol" class="form-select">
                            <option value="http" @selected(config('global.server_protocol') == 'http')>
                                @lang('global.server_protocol_http')
                            </option>
                            <option value="https" @selected(config('global.server_protocol') == 'https')>
                                @lang('global.server_protocol_https')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.sitestart_title')
                        <i class="fa far fa-question-circle" title="@lang('global.sitestart_message')"></i>
                    </td>
                    <td>site_start</td>
                    <td>
                        <input type="text" name="site_start" class="form-control"
                               value="{{ config('global.site_start') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.errorpage_title')
                        <i class="fa far fa-question-circle" title="@lang('global.errorpage_message')"></i>
                    </td>
                    <td>error_page</td>
                    <td>
                        <input type="text" name="error_page" class="form-control"
                               value="{{ config('global.error_page') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.unauthorizedpage_title')
                        <i class="fa far fa-question-circle" title="@lang('global.unauthorizedpage_message')"></i>
                    </td>
                    <td>unauthorized_page</td>
                    <td>
                        <input type="text" name="unauthorized_page" class="form-control"
                               value="{{ config('global.unauthorized_page') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.siteunavailable_page_title')
                        <i class="fa far fa-question-circle" title="@lang('global.siteunavailable_page_message')"></i>
                    </td>
                    <td>site_unavailable_page</td>
                    <td>
                        <input type="text" name="site_unavailable_page" class="form-control"
                               value="{{ config('global.site_unavailable_page') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.controller_namespace')
                        <i class="fa far fa-question-circle" title="@lang('global.controller_namespace_message')"></i>
                    </td>
                    <td>ControllerNamespace</td>
                    <td>
                        <input type="text" name="ControllerNamespace" class="form-control"
                               value="{{ config('global.ControllerNamespace') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.update_repository')
                        <i class="fa far fa-question-circle" title="@lang('global.update_repository_message')"></i>
                    </td>
                    <td>UpgradeRepository</td>
                    <td>
                        <input type="text" name="UpgradeRepository" class="form-control"
                               value="{{ config('global.UpgradeRepository') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.siteunavailable_title')
                    </td>
                    <td>site_unavailable_message</td>
                    <td>
                        <textarea name="site_unavailable_message" class="form-control"
                                  placeholder="@lang('global.siteunavailable_message_default')"
                        >{{ config('global.site_unavailable_message') }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.defaulttemplate_title')
                        <i class="fa far fa-question-circle" title="@lang('global.defaulttemplate_message')"></i>
                    </td>
                    <td>default_template</td>
                    <td>
                        <select name="default_template" class="form-select">
                            @foreach(\EvolutionCMS\Models\Category::with('templates')
->whereHas('templates')
->get()
->merge([(new \EvolutionCMS\Models\Category())
->setAttribute(
    'templates',
    \EvolutionCMS\Models\SiteTemplate::query()
    ->where('category', 0)
    ->get()
)])
->sortBy('id')
->values() as $category)
                                <optgroup label="{{ $category->name ?? __('global.no_category') }}">
                                    @foreach($category->templates as $template)
                                        <option value="{{ $template->getKey() }}" @selected(config('global.default_template') == $template->getKey())>{{ $template->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.defaulttemplate_logic_title')
                    </td>
                    <td>auto_template_logic</td>
                    <td>
                        <select name="auto_template_logic" class="form-select">
                            <option value="system" @selected(config('global.auto_template_logic') == 'system')>
                                @lang('global.defaulttemplate_logic_system_message')
                            </option>
                            <option value="parent" @selected(config('global.auto_template_logic') == 'parent')>
                                @lang('global.defaulttemplate_logic_parent_message')
                            </option>
                            <option value="sibling" @selected(config('global.auto_template_logic') == 'sibling')>
                                @lang('global.defaulttemplate_logic_sibling_message')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.chunk_processor')
                    </td>
                    <td>chunk_processor</td>
                    <td>
                        <select name="chunk_processor" class="form-select">
                            <option value="" @selected(config('global.chunk_processor') == '')>
                                DocumentParser
                            </option>
                            <option value="DLTemplate" @selected(config('global.chunk_processor') == 'DLTemplate')>
                                DLTemplate
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.enable_filter_title')
                    </td>
                    <td>enable_filter</td>
                    <td>
                        <select name="enable_filter" class="form-select">
                            <option value="0" @selected(config('global.enable_filter') == 0)>
                                @lang('global.no')
                            </option>
                            <option value="1" @selected(config('global.enable_filter') == 1)>
                                @lang('global.yes')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.enable_at_syntax_title')
                    </td>
                    <td>enable_at_syntax</td>
                    <td>
                        <select name="enable_at_syntax" class="form-select">
                            <option value="0" @selected(config('global.enable_at_syntax') == 0)>
                                @lang('global.no')
                            </option>
                            <option value="1" @selected(config('global.enable_at_syntax') == 1)>
                                @lang('global.yes')
                            </option>
                        </select>
                        <small class="text-muted">
                            @lang('global.enable_at_syntax_message')
                            <ul>
                                <li>
                                    <a href="https://github.com/modxcms/evolution/wiki/@@IF-@@ELSEIF-@@ELSE-@@ENDIF"
                                       target="_blank">
                                        &commat;IF
                                        &commat;ELSEIF
                                        &commat;ELSE
                                        &commat;ENDIF
                                    </a>
                                </li>
                                <li>&lt;&commat;LITERAL&gt; &lbrace;&lbrace;string&rbrace;&rbrace; [*string*] [[string]]
                                    &lt;&commat;ENDLITERAL&gt;
                                </li>
                                <li>&lt;!--&commat;- Do not output -&commat;--&gt;</li>
                            </ul>
                        </small>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.defaultpublish_title')
                    </td>
                    <td>publish_default</td>
                    <td>
                        <select name="publish_default" class="form-select">
                            <option value="0" @selected(config('global.publish_default') == 0)>
                                @lang('global.no')
                            </option>
                            <option value="1" @selected(config('global.publish_default') == 1)>
                                @lang('global.yes')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.defaultcache_title')
                    </td>
                    <td>cache_default</td>
                    <td>
                        <select name="cache_default" class="form-select">
                            <option value="0" @selected(config('global.cache_default') == 0)>
                                @lang('global.no')
                            </option>
                            <option value="1" @selected(config('global.cache_default') == 1)>
                                @lang('global.yes')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.defaultsearch_title')
                    </td>
                    <td>search_default</td>
                    <td>
                        <select name="search_default" class="form-select">
                            <option value="0" @selected(config('global.search_default') == 0)>
                                @lang('global.no')
                            </option>
                            <option value="1" @selected(config('global.search_default') == 1)>
                                @lang('global.yes')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.defaultmenuindex_title')
                        <i class="fa far fa-question-circle" title="@lang('global.defaultmenuindex_message')"></i>
                    </td>
                    <td>auto_menuindex</td>
                    <td>
                        <select name="auto_menuindex" class="form-select">
                            <option value="0" @selected(config('global.auto_menuindex') == 0)>
                                @lang('global.no')
                            </option>
                            <option value="1" @selected(config('global.auto_menuindex') == 1)>
                                @lang('global.yes')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.track_visitors_title')
                    </td>
                    <td>track_visitors</td>
                    <td>
                        <select name="track_visitors" class="form-select">
                            <option value="0" @selected(config('global.track_visitors') == 0)>
                                @lang('global.no')
                            </option>
                            <option value="1" @selected(config('global.track_visitors') == 1)>
                                @lang('global.yes')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.custom_contenttype_title')
                        <i class="fa far fa-question-circle" title="@lang('global.custom_contenttype_message')"></i>
                    </td>
                    <td>custom_contenttype</td>
                    <td>
                        <select class="form-select">
                            @foreach(explode(',', config('global.custom_contenttype')) as $type)
                                <option value="{{ $type }}">
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.enable_cache_title')
                    </td>
                    <td>enable_cache</td>
                    <td>
                        <select name="enable_cache" class="form-select">
                            <option value="0" @selected(config('global.enable_cache') == 0)>
                                @lang('global.disabled')
                            </option>
                            <option value="1" @selected(config('global.enable_cache') == 1)>
                                @lang('global.enabled')
                            </option>
                            <option value="2" @selected(config('global.enable_cache') == 2)>
                                @lang('global.disabled_at_login')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.disable_chunk_cache_title')
                    </td>
                    <td>disable_chunk_cache</td>
                    <td>
                        <select name="disable_chunk_cache" class="form-select">
                            <option value="0" @selected(config('global.disable_chunk_cache') == 0)>
                                @lang('global.no')
                            </option>
                            <option value="1" @selected(config('global.disable_chunk_cache') == 1)>
                                @lang('global.yes')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.disable_snippet_cache_title')
                    </td>
                    <td>disable_snippet_cache</td>
                    <td>
                        <select name="disable_snippet_cache" class="form-select">
                            <option value="0" @selected(config('global.disable_snippet_cache') == 0)>
                                @lang('global.no')
                            </option>
                            <option value="1" @selected(config('global.disable_snippet_cache') == 1)>
                                @lang('global.yes')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.disable_plugins_cache_title')
                    </td>
                    <td>disable_plugins_cache</td>
                    <td>
                        <select name="disable_plugins_cache" class="form-select">
                            <option value="0" @selected(config('global.disable_plugins_cache') == 0)>
                                @lang('global.no')
                            </option>
                            <option value="1" @selected(config('global.disable_plugins_cache') == 1)>
                                @lang('global.yes')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.cache_type_title')
                    </td>
                    <td>cache_type</td>
                    <td>
                        <select name="cache_type" class="form-select">
                            <option value="1" @selected(config('global.cache_type') == 1)>
                                @lang('global.cache_type_1')
                            </option>
                            <option value="2" @selected(config('global.cache_type') == 2)>
                                @lang('global.cache_type_2')
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.minifyphp_incache_title')
                    </td>
                    <td>minifyphp_incache</td>
                    <td>
                        <select name="minifyphp_incache" class="form-select">
                            <option value="0" @selected(config('global.minifyphp_incache') == 0)>
                                @lang('global.disabled')
                            </option>
                            <option value="1" @selected(config('global.minifyphp_incache') == 1)>
                                @lang('global.enabled')
                            </option>
                        </select>
                        <small class="text-muted">
                            @lang('global.minifyphp_incache_message')
                        </small>
                    </td>
                </tr>
                <tr>
                    <td>@lang('global.rss_url_news_title')</td>
                    <td>rss_url_news</td>
                    <td>
                        <input type="text" name="rss_url_news" class="form-control"
                               value="{{ config('global.rss_url_news') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        @lang('global.serveroffset_title')
                    </td>
                    <td>server_offset_time</td>
                    <td>
                        <select name="server_offset_time" class="form-select">
                            @for($i = -24; $i < 25; $i++)
                                <option value="{{ $i * 60 * 60 }}" @selected(config('global.server_offset_time') == $i)>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                        <small class="text-muted">
                            {{ sprintf(__('global.serveroffset_message'), date('H:i:s'), date('H:i:s', time() + config('global.server_offset_time'))) }}
                        </small>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="settings_furls">

        </div>
        <div class="tab-pane fade" id="settings_ui">

        </div>
        <div class="tab-pane fade" id="settings_security">

        </div>
        <div class="tab-pane fade" id="settings_misc">

        </div>
        <div class="tab-pane fade" id="settings_KC">

        </div>
        <div class="tab-pane fade" id="settings_email_templates">

        </div>
    </div>
@endsection
