<?php

declare(strict_types=1);

namespace EvoManager\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index()
    {
        return view('app', [
            'data' => [
                'menu' => $this->getMenu(),
            ]
        ]);
    }

    /**
     * @return array
     */
    protected function getMenu(): array
    {
        return [
            [
                'children' => [
                    [
                        'id' => 'bars',
                        'icon' => 'fa fa-bars',
                    ],
                    [
                        'id' => 'home',
                        'icon' => 'fa fa-home',
                        'to' => route('home'),
                    ],
                    [
                        'id' => 'elements',
                        'title' => __('global.elements'),
                        'icon' => 'fa fa-th',
                        'children' => [
                            [
                                'id' => 'templates',
                                'title' => __('global.templates'),
                                'icon' => 'fa fa-newspaper',
                                'to' => '/elements/templates',
                                'url' => '/api/templates',
                            ],
                            [
                                'id' => 'tvs',
                                'title' => __('global.tmplvars'),
                                'icon' => 'fa fa-list-alt',
                                'to' => '/elements/tvs',
                                'url' => '/api/tvs',
                            ],
                            [
                                'id' => 'chunks',
                                'title' => __('global.htmlsnippets'),
                                'icon' => 'fa fa-th-large',
                                'to' => '/elements/chunks',
                                'url' => '/api/chunks',
                            ],
                            [
                                'id' => 'snippets',
                                'title' => __('global.snippets'),
                                'icon' => 'fa fa-code',
                                'to' => '/elements/snippets',
                                'url' => '/api/snippets',
                            ],
                            [
                                'id' => 'plugins',
                                'title' => __('global.plugins'),
                                'icon' => 'fa fa-plug',
                                'to' => '/elements/plugins',
                                'url' => '/api/plugins',
                            ],
                            [
                                'id' => 'modules',
                                'title' => __('global.modules'),
                                'icon' => 'fa fa-cube',
                                'to' => '/elements/modules',
                                'url' => '/api/modules',
                            ],
                            [
                                'id' => 'categories',
                                'title' => __('global.categories'),
                                'icon' => 'fa fa-object-group',
                                'to' => '/elements/categories',
                                'url' => '/api/categories',
                            ],
                            [
                                'id' => 'files',
                                'title' => __('global.files'),
                                'icon' => 'fa fa-folder-open',
                                'to' => '/files',
                            ],
                        ],
                    ],
                    [
                        'id' => 'modules',
                        'title' => __('global.modules'),
                        'icon' => 'fa fa-cubes',
                        'url' => '/api/modules',
                    ],
                    [
                        'id' => 'users',
                        'title' => __('global.users'),
                        'icon' => 'fa fa-users',
                        'children' => [
                            [
                                'id' => 'users',
                                'title' => __('global.users'),
                                'icon' => 'fa fa-user',
                                'to' => '/users',
                                'url' => '/api/users',
                            ],
                            [
                                'id' => 'roles',
                                'title' => __('global.role_management_title'),
                                'icon' => 'fa fa-legal',
                                'to' => '/roles',
                                'url' => '/api/roles',
                            ],
                            [
                                'id' => 'permissions',
                                'title' => __('global.web_permissions'),
                                'icon' => 'fa fa-male',
                                'to' => '/permissions',
                            ],
                        ],
                    ],
                    [
                        'id' => 'tools',
                        'title' => __('global.tools'),
                        'icon' => 'fa fa-wrench',
                        'children' => [
                            [
                                'id' => 'cache',
                                'title' => __('global.refresh_site'),
                                'icon' => 'fa fa-recycle',
                                'to' => '/cache',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'children' => [
                    [
                        'id' => 'search',
                        'icon' => 'fa fa-search',
                    ],
                    [
                        'id' => 'preview',
                        'icon' => 'fa fa-desktop',
                        'to' => '/',
                    ],
                    [
                        'id' => 'manager',
                        'icon' => 'fa fa-user-circle',
                        'title' => Auth::user()->username,
                        'children' => [
                            [
                                'id' => 'password',
                                'title' => __('global.change_password'),
                                'icon' => 'fa fa-lock',
                                'to' => '/password',
                            ],
                            [
                                'id' => 'logout',
                                'title' => __('global.logout'),
                                'icon' => 'fa fa-sign-out',
                                'to' => '/logout',
                            ],
                        ],
                    ],
                    [
                        'id' => 'configuration',
                        'icon' => 'fa fa-cogs',
                        'children' => [
                            [
                                'id' => 'configuration',
                                'title' => __('global.settings_config'),
                                'icon' => 'fa fa-sliders',
                                'to' => '/configuration',
                            ],
                            [
                                'id' => 'schedules',
                                'title' => __('global.site_schedule'),
                                'icon' => 'fa fa-calendar',
                                'to' => '/schedule',
                            ],
                            [
                                'id' => 'event-log',
                                'title' => __('global.eventlog_viewer'),
                                'icon' => 'fa fa-exclamation-triangle',
                                'to' => '/event-log',
                            ],
                            [
                                'id' => 'system-log',
                                'title' => __('global.view_logging'),
                                'icon' => 'fa fa-user-secret',
                                'to' => '/system-log',
                            ],
                            [
                                'id' => 'system',
                                'title' => __('global.view_sysinfo'),
                                'icon' => 'fa fa-info-circle',
                                'to' => '/system',
                            ],
                            [
                                'id' => 'version',
                                'title' => '<small class="d-block text-center">Evolution CE ' .
                                    config('global.settings_version') . '</small>',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
