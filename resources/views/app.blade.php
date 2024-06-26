<!doctype html>
<html lang="{{ config('global.manager_language') }}">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('global.site_name') }} — Evo Manager</title>
    <script>
      window['__DATA__'] = @json($data)
    </script>
    @vite('resources/js/app.js')
</head>
<body></body>
</html>
