<!doctype html>
<html lang="{{ app()->getLocale() }}" @yield('html.attributes')>
<head>
    <base href="{{ url('/') }}/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('global.site_name') }} — Evo Manager</title>
    <script>var Evo = {}</script>
    @stack('styles')
</head>
<body>
{{ $slot }}
</body>
@stack('scripts')
</html>
