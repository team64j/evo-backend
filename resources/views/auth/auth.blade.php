<!doctype html>
<html lang="{{ config('global.manager_language') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('global.site_name') }} — Evo Manager</title>
    @vite('resources/js/app-auth.js')
</head>
<body id="app-evo-auth" data-bs-theme="dark">
<div class="h-100">
    <div class="row m-0 h-100">
        <div class="col-auto bg-dark bg-opacity-75 text-light py-5 px-4" style="width: 25rem">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
