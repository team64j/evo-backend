<?php

declare(strict_types=1);

namespace EvoManager\Http\Controllers;

class ConfigurationController
{
    public function index()
    {
        return view('pages.configuration');
    }
}
