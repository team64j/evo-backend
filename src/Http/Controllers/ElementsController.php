<?php

declare(strict_types=1);

namespace EvoManager\Http\Controllers;

use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteHtmlsnippet;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Models\SitePlugin;
use EvolutionCMS\Models\SiteSnippet;
use EvolutionCMS\Models\SiteTemplate;
use EvolutionCMS\Models\SiteTmplvar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;

class ElementsController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function index(Request $request, string $element): View
    {
        $help = '';
        $icon = '';
        $actions = [];
        $elements = [];

        switch ($element) {
            case 'templates':
                $help = __('global.template_management_msg');
                $icon = 'fa fa-newspaper';
                $elements = SiteTemplate::query()
                    ->paginate(Config::get('global.number_of_results'))
                    ->appends($request->query());
                break;

            case 'tmplvars':
                $help = __('global.tmplvars_management_msg');
                $icon = 'fa fa-list-alt';
                $elements = SiteTmplvar::query()
                    ->paginate(Config::get('global.number_of_results'))
                    ->appends($request->query());
                break;

            case 'htmlsnippets':
                $help = __('global.htmlsnippet_management_msg');
                $icon = 'fa fa-th-large';
                $elements = SiteHtmlsnippet::query()
                    ->paginate(Config::get('global.number_of_results'))
                    ->appends($request->query());
                break;

            case 'snippets':
                $help = __('global.snippet_management_msg');
                $icon = 'fa fa-code';
                $elements = SiteSnippet::query()
                    ->paginate(Config::get('global.number_of_results'))
                    ->appends($request->query());
                break;

            case 'plugins':
                $help = __('global.plugin_management_msg');
                $icon = 'fa fa-plug';
                $elements = SitePlugin::query()
                    ->paginate(Config::get('global.number_of_results'))
                    ->appends($request->query());
                break;

            case 'modules':
                $help = __('global.module_management_msg');
                $icon = 'fa fa-cube';
                $elements = SiteModule::query()
                    ->paginate(Config::get('global.number_of_results'))
                    ->appends($request->query());
                break;

            case 'categories':
                $help = null;
                $icon = 'fa fa-object-group';
                $elements = Category::query()
                    ->paginate(Config::get('global.number_of_results'))
                    ->appends($request->query());
                break;

            default:
                abort(404);
        }

        return view('page.elements', [
            'help' => $help,
            'icon' => $icon,
            'actions' => $actions,
            'navigations' => [
                [
                    'id' => 'templates',
                    'title' => __('global.templates'),
                    'to' => url('/elements/templates'),
                ],
                [
                    'id' => 'tmplvars',
                    'title' => __('global.tmplvars'),
                    'to' => url('/elements/tmplvars'),
                ],
                [
                    'id' => 'htmlsnippets',
                    'title' => __('global.htmlsnippets'),
                    'to' => url('/elements/htmlsnippets'),
                ],
                [
                    'id' => 'snippets',
                    'title' => __('global.snippets'),
                    'to' => url('/elements/snippets'),
                ],
                [
                    'id' => 'plugins',
                    'title' => __('global.plugins'),
                    'to' => url('/elements/plugins'),
                ],
                [
                    'id' => 'modules',
                    'title' => __('global.modules'),
                    'to' => url('/elements/modules'),
                ],
                [
                    'id' => 'categories',
                    'title' => __('global.categories'),
                    'to' => url('/elements/categories'),
                ],
            ],
            'element' => $element,
            'elements' => $elements,
        ]);
    }
}
