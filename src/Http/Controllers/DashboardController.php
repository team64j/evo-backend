<?php

declare(strict_types=1);

namespace EvoManager\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('page.dashboard');
    }
}
