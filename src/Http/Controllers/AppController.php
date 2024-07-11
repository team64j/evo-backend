<?php

declare(strict_types=1);

namespace EvoManager\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
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
                        'icon' => 'fa fa-bars',
                    ],
                    [
                        'icon' => 'fa fa-home',
                        'to' => 'dashboard',
                    ],
                    [
                        'title' => __('global.elements'),
                        'icon' => 'fa fa-th',
                        'children' => [
                            [
                                'title' => __('global.templates'),
                                'icon' => 'fa fa-newspaper',
                                'to' => 'elements/templates',
                                'url' => 'api/templates',
                            ],
                            [
                                'title' => __('global.tmplvars'),
                                'icon' => 'fa fa-list-alt',
                                'to' => 'elements/tmplvars',
                                'url' => 'api/tmplvars',
                            ],
                            [
                                'title' => __('global.htmlsnippets'),
                                'icon' => 'fa fa-th-large',
                                'to' => 'elements/htmlsnippets',
                                'url' => 'api/htmlsnippets',
                            ],
                            [
                                'title' => __('global.snippets'),
                                'icon' => 'fa fa-code',
                                'to' => 'elements/snippets',
                                'url' => 'api/snippets',
                            ],
                            [
                                'title' => __('global.plugins'),
                                'icon' => 'fa fa-plug',
                                'to' => 'elements/plugins',
                                'url' => 'api/plugins',
                            ],
                            [
                                'title' => __('global.modules'),
                                'icon' => 'fa fa-cube',
                                'to' => 'elements/modules',
                                'url' => 'api/modules',
                            ],
                            [
                                'title' => __('global.categories'),
                                'icon' => 'fa fa-object-group',
                                'to' => 'elements/categories',
                                'url' => 'api/categories',
                            ],
                            [
                                'title' => __('global.files'),
                                'icon' => 'fa fa-folder-open',
                                'to' => 'files',
                            ],
                        ],
                    ],
                    [
                        'title' => __('global.modules'),
                        'icon' => 'fa fa-cubes',
                        'url' => 'api/modules',
                    ],
                    [
                        'title' => __('global.users'),
                        'icon' => 'fa fa-users',
                        'children' => [
                            [
                                'title' => __('global.users'),
                                'icon' => 'fa fa-user',
                                'to' => 'users',
                                'url' => 'api/users',
                            ],
                            [
                                'title' => __('global.role_management_title'),
                                'icon' => 'fa fa-legal',
                                'to' => 'roles',
                                'url' => 'api/roles',
                            ],
                            [
                                'title' => __('global.web_permissions'),
                                'icon' => 'fa fa-male',
                                'to' => 'permissions',
                            ],
                        ],
                    ],
                    [
                        'title' => __('global.tools'),
                        'icon' => 'fa fa-wrench',
                        'children' => [
                            [
                                'title' => __('global.refresh_site'),
                                'icon' => 'fa fa-recycle',
                                'to' => 'cache',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'children' => [
                    [
                        'icon' => 'fa fa-search',
                    ],
                    [
                        'icon' => 'fa fa-desktop',
                        'to' => [
                            'href' => config('global.site_url', '/'),
                            'target' => '_blank',
                        ],
                    ],
                    [
                        'icon' => 'fa fa-user-circle',
                        'title' => Auth::user()->username,
                        'children' => [
                            [
                                'title' => __('global.change_password'),
                                'icon' => 'fa fa-lock',
                                'to' => 'password',
                            ],
                            [
                                'title' => __('global.logout'),
                                'icon' => 'fa fa-sign-out',
                                'to' => 'logout',
                            ],
                        ],
                    ],
                    [
                        'icon' => 'fa fa-cogs',
                        'children' => [
                            [
                                'title' => __('global.settings_config'),
                                'icon' => 'fa fa-sliders',
                                'to' => 'configuration',
                            ],
                            [
                                'title' => __('global.site_schedule'),
                                'icon' => 'fa fa-calendar',
                                'to' => 'schedule',
                            ],
                            [
                                'title' => __('global.eventlog_viewer'),
                                'icon' => 'fa fa-exclamation-triangle',
                                'to' => 'event-log',
                            ],
                            [
                                'title' => __('global.view_logging'),
                                'icon' => 'fa fa-user-secret',
                                'to' => 'system-log',
                            ],
                            [
                                'title' => __('global.view_sysinfo'),
                                'icon' => 'fa fa-info-circle',
                                'to' => 'system',
                            ],
                            [
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
