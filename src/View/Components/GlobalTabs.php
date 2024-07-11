<?php

namespace EvoManager\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class GlobalTabs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public array $tabs = [], public string $active = 'dashboard')
    {
        $this->tabs = Session::get('tabs', [
            [
                'path' => '/dashboard',
                'active' => true,
                'meta' => [
                    'icon' => 'fa fa-home'
                ],
            ]
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.global-tabs');
    }
}
