@component('components.html')
    @section('html.attributes')
        data-bs-theme="dark"
    @endsection

    @push('styles')
        @vite('resources/js/app-auth.js')
    @endpush

    @php(
        $position = config('global.login_form_position')
    )

    <div id="app-evo-auth"
         class="d-flex h-100 overflow-hidden {{ $position == 'left' ? 'justify-content-start' : ($position == 'right' ? 'justify-content-end' : 'justify-content-center align-items-center') }}">
        <div class="bg-black bg-opacity-75 mw-100 {{ $position == 'center' ? 'p-4 rounded-4' : 'p-3' }}"
             style="width: {{ $position == 'center' ? '30' : '25' }}rem">
            @yield('content')
        </div>
    </div>
@endcomponent
