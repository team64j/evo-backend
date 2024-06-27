<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <base href="{{ url('/') }}/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('global.site_name') }} — Evo Manager</title>
    @vite('resources/js/app-page.js')
</head>
<body id="app-evo-page">
<div class="h-100 d-flex flex-column">
    <div class="position-fixed left-0 top-0 w-100 p-1 d-flex justify-content-end">
        @yield('actions')
    </div>
    <div class="flex-grow-0 d-flex flex-column">
        @yield('title')
    </div>
    <div class="flex-grow-1 d-flex flex-column">
        @yield('content')
    </div>
</div>
</body>
</html>
