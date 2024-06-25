<!doctype html>
<html lang="{{ config('global.manager_language') }}">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('global.site_name') }} — Evo Manager</title>
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            font-size: 14px;
        }
        html, body {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="h-100 d-flex flex-column">
    <div class="flex-grow-0">
        @yield('title')
    </div>

    <div class="flex-grow-1">
        @yield('content')
    </div>
</div>
</body>
</html>
