@component('components.html')
    @push('styles')
        @vite('resources/js/app-page.js')
    @endpush

    <div id="app-evo-page" class="h-100 d-flex flex-column">
        @hasSection('actions')
            <div class="position-fixed end-0 top-0 p-1 d-flex justify-content-end">
                @yield('actions')
            </div>
        @endif

        @hasSection('title')
            <div class="flex-grow-0 d-flex flex-column">
                @yield('title')
            </div>
        @endif

        @hasSection('navigations')
            <div class="flex-grow-0 d-flex flex-column">
                @yield('navigations')
            </div>
        @endif

        @hasSection('content')
            <div class="flex-grow-1 d-flex flex-column">
                @yield('content')
            </div>
        @endif

        @hasSection('crumbs')
            <div class="flex-grow-0 d-flex flex-column">
                @yield('crumbs')
            </div>
        @endif
    </div>
@endcomponent
