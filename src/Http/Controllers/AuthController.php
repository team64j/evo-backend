<?php

declare(strict_types=1);

namespace EvoManager\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class AuthController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function login(Request $request): Application|View|Factory|RedirectResponse
    {
        if ($request->isMethod('POST')) {
            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ], attributes: [
                'username' => '[' . Lang::get('global.username') . ']',
                'password' => '[' . Lang::get('global.password') . ']',
            ]);

            if (Auth::attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();

                return redirect()->intended();
            }
        }

        return view('auth.login');
    }

    /**
     * @param Request $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(Request $request): Application|Redirector|RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
