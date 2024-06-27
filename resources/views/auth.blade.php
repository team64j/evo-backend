<!doctype html>
<html lang="{{ app()->getLocale() }}" data-bs-theme="dark">
<head>
    <base href="{{ url('/') }}/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('global.site_name') }} — Evo Manager</title>
    @vite('resources/js/app-auth.js')
</head>
<body id="app-evo-auth">
@php(
    $position = config('global.login_form_position')
)
<div class="d-flex h-100 overflow-hidden {{ $position == 'left' ? 'justify-content-start' : ($position == 'right' ? 'justify-content-end' : 'justify-content-center align-items-center') }}">
    <div class="bg-black bg-opacity-75 mw-100 {{ $position == 'center' ? 'p-4 rounded-4' : 'p-3' }}"
         style="width: {{ $position == 'center' ? '30' : '25' }}rem">
        @yield('content')
    </div>
</div>
</body>
</html>
