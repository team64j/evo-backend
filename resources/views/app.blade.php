<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <base href="{{ url('/') }}/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('global.site_name') }} — Evo Manager</title>
    @vite('resources/js/app.js')
</head>
<body id="app-evo"></body>
<script id="__DATA__" type="application/json">@json($data, JSON_UNESCAPED_UNICODE)</script>
</html>
