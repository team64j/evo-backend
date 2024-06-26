<!doctype html>
<html lang="{{ config('global.manager_language') }}">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('global.site_name') }} — Evo Manager</title>
    <link href="./lib/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            font-size: 12px;
        }
        html, body {
            height: 100%;
            width: 100%;
        }
        h1 {
            display: flex;
            align-items: center;
        }
        h1 > i {
            font-size: 1.25rem;
        }
    </style>
    <script src="./lib/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="h-100 d-flex flex-column">
    <div class="flex-grow-0 d-flex flex-column">
        @yield('title')
    </div>

    <div class="flex-grow-1 d-flex flex-column">
        @yield('content')
    </div>
</div>
<script>
  window.addEventListener('message', function (event) {
    if (event.data?.['dark'] !== undefined) {
      document.documentElement.classList.toggle('dark', event.data['dark'])
    }
  })

  parent?.postMessage({
    title: document.body.querySelector('h1')?.innerText,
    icon: document.body.querySelector('h1 i:first-of-type')?.className
  }, '*')
</script>
</body>
</html>
