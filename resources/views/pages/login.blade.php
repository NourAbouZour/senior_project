<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Smart House Login / Signup</title>
  <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
</head>
<body>
  <div class="container">
    @include('widgets.auth-widget')
  </div>
  <script src="{{ asset('js/loginscript.js') }}"></script>
</body>
</html>
