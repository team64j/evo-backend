<?php

declare(strict_types=1);

namespace EvoManager\Http\Controllers\Api;

use EvolutionCMS\Models\SiteTemplate;
use EvoManager\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * @param Request $request
     *
     * @return View
     */
    public function menu(Request $request): View
    {
        return view('components.main-menu', [
            'children' => SiteTemplate::query()
                ->paginate()
                ->map(fn($item) => [
                    'id' => $item->id,
                    'title' => $item->name,
                    'to' => 'templates/' . $item->id,
                ]),
        ]);
    }
}
