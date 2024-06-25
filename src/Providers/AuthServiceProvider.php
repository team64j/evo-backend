<?php

namespace EvoManager\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::viaRequest('api', function (Request $request) {
            if (
                ($request->input('username') == 'admin' && $request->input('password') == 'admin') ||
                ($request->bearerToken() && $request->bearerToken() == Cache::get('admin.token'))
            ) {
                return [
                    'username' => 'admin',
                ];
            }

            return null;
        });
    }
}
