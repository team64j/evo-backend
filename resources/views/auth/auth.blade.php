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
        html, body, #app {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
<div id="app" data-bs-theme="dark">
    <div class="row m-0 h-100">
        <div class="col-auto bg-dark text-light py-5 px-4" style="width: 25rem">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
