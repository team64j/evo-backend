<?php

declare(strict_types=1);

namespace EvoManager\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ConfigurationController
{
    /**
     * @return View
     */
    public function read(): View
    {
        return view('pages.configuration');
    }

    /**
     * @param Request $request
     *
     * @return View
     */
    public function update(Request $request): View
    {
        return view('pages.configuration');
    }
}
