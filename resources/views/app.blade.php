@component('components.html')
    @push('styles')
        @vite('resources/js/app.js')
    @endpush

    <div id="app-evo" class="d-flex flex-column h-100 overflow-hidden"></div>

    @push('scripts')
        <script id="__DATA__" type="application/json">@json($data)</script>
    @endpush
@endcomponent
