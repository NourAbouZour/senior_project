<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Smart House')</title>
  <!-- your CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <!-- optional: nav, header, etc. -->
  <main>
    @yield('content')
  </main>
  <!-- your JS -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
