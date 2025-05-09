<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Smart House')</title>
  
  <!-- main CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
  <!-- pushed styles from widgets -->
  @stack('styles')
</head>
<body>
  <!-- optional nav/header -->
  
  <main>
    @yield('content')
  </main>
  
  <!-- main JS -->
  <script src="{{ asset('js/app.js') }}"></script>
  
  <!-- pushed scripts from widgets -->
  @stack('scripts')
</body>
</html>
