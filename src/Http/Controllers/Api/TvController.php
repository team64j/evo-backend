<?php

declare(strict_types=1);

namespace EvoManager\Http\Controllers\Api;

use EvolutionCMS\Models\SiteTmplvar;
use EvoManager\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TvController extends Controller
{
    /**
     * @param Request $request
     *
     * @return View
     */
    public function menu(Request $request): View
    {
        return view('components.main-menu', [
            'children' => SiteTmplvar::query()
                ->paginate()
                ->map(fn($item) => [
                    'id' => $item->id,
                    'title' => $item->name,
                    'to' => 'tmplvars/' . $item->id,
                ]),
        ]);
    }
}
