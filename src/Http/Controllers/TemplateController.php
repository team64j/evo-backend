<?php

declare(strict_types=1);

namespace EvoManager\Http\Controllers;

use EvolutionCMS\Models\SiteTemplate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class TemplateController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('page.elements', [
            'help' => __('global.template_management_msg'),
            'icon' => 'fa fa-newspaper',
            'element' => 'templates',
            'elements' => SiteTemplate::query()->paginate(Config::get('global.number_of_results')),
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return View
     */
    public function show(Request $request, $id): View
    {
        $model = SiteTemplate::query()->findOrNew($id);

        return view('page.template', [
            'model' => $model,
            'element' => 'templates',
        ]);
    }
}
