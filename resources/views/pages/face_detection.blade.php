<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Face Login</title>
  <link rel="stylesheet" href="{{ asset('css/facestyle.css') }}" />
  {{-- face-api.js must load before your script --}}
  <script defer src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>
  {{-- correct attribute is src, and include .js extension --}}
  <script defer src="{{ asset('js/facescript.js') }}"></script>
</head>
<body>
  <div class="container">
    <h1>Face Recognition Login</h1>

    <div class="video-wrapper">
      <video id="video" width="720" height="560" autoplay muted></video>
    </div>

    <p id="status">🔄 Loading models...</p>
    <button
  class="skip"
  onclick="window.location.href='{{ route('login') }}';"
>
  Skip
</button>


    <div class="log-section">
      <h2>📝 Login Attempts</h2>
      <div id="log"></div>
    </div>
  </div>
</body>
</html>
