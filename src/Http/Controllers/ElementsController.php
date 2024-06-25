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
        $elements = [];

        switch ($element) {
            case 'templates':
                $elements = SiteTemplate::query()
                    ->paginate(20);
                break;

            case 'tvs':
                $elements = SiteTmplvar::query()
                    ->paginate(20);
                break;

            case 'chunks':
                $elements = SiteHtmlsnippet::query()
                    ->paginate(20);
                break;

            case 'snippets':
                $elements = SiteSnippet::query()
                    ->paginate(20);
                break;

            case 'plugins':
                $elements = SitePlugin::query()
                    ->paginate(20);
                break;

            case 'modules':
                $elements = SiteModule::query()
                    ->paginate(20);
                break;

            case 'categories':
                $elements = Category::query()
                    ->paginate(20);
                break;
        }

        return view('pages.elements', [
            'element' => $element,
            'elements' => $elements,
        ]);
    }
}
