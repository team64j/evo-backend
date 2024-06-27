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
use Illuminate\Http\Request;

class ElementsController extends Controller
{
    public function index(Request $request, string $element)
    {
        $help = '';
        $icon = '';
        $elements = [];

        switch ($element) {
            case 'templates':
                $help = __('global.template_management_msg');
                $icon = 'fa fa-newspaper';
                $elements = SiteTemplate::query()
                    ->paginate(20);
                break;

            case 'tmplvars':
                $help = __('global.tmplvars_management_msg');
                $icon = 'fa fa-list-alt';
                $elements = SiteTmplvar::query()
                    ->paginate(20);
                break;

            case 'htmlsnippets':
                $help = __('global.htmlsnippet_management_msg');
                $icon = 'fa fa-th-large';
                $elements = SiteHtmlsnippet::query()
                    ->paginate(4);
                break;

            case 'snippets':
                $help = __('global.snippet_management_msg');
                $icon = 'fa fa-code';
                $elements = SiteSnippet::query()
                    ->paginate(20);
                break;

            case 'plugins':
                $help = __('global.plugin_management_msg');
                $icon = 'fa fa-plug';
                $elements = SitePlugin::query()
                    ->with('categories')
                    ->orderBy('category')
                    ->paginate(2);
                break;

            case 'modules':
                $help = __('global.module_management_msg');
                $icon = 'fa fa-cube';
                $elements = SiteModule::query()
                    ->paginate(20);
                break;

            case 'categories':
                //$help = __('global.category_management_msg');
                $icon = 'fa fa-object-group';
                $elements = Category::query()
                    ->paginate(20);
                break;

            default:
                abort(404);
        }

        return view('page.elements', [
            'help' => $help,
            'icon' => $icon,
            'element' => $element,
            'elements' => $elements,
        ]);
    }
}
