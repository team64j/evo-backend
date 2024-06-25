<?php

declare(strict_types=1);

namespace EvoManager\Http\Controllers;

class TemplateController extends Controller
{
    public function index()
    {
        return view('pages.templates');
    }
}
