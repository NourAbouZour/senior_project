<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Smart House Login / Signup</title>
  <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
  <style>
    /* simple checkmark styling */
    .checkmark {
      color: #28a745;
      margin-left: 0.5rem;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">

    {{-- Toggle buttons --}}
    <div class="form-toggle">
      <button id="login-toggle" class="active">Login</button>
      <button id="signup-toggle">Signup</button>
    </div>

    {{-- Login Widget --}}
    <div id="login-widget" class="auth-widget active">
      @if ($errors->any() && session('form') === 'login')
        <div class="error-box">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <h2>Smart House Login</h2>

        <input
          id="li-username"
          type="text"
          name="username"
          placeholder="Username"
          value="{{ old('username', request('username')) }}"
          required
        >

        <input
          id="li-password"
          type="password"
          name="password"
          placeholder="Password"
          required
        >

        <p class="face-text">
          <a href="{{ route('face_detection') }}" class="facedetectionoption">
            Sign in using Face Recognition
          </a>
        </p>

        <button type="submit">Login</button>
      </form>
    </div>

    {{-- Signup Widget --}}
    @php
      // preserve what the user typed or what came back via query string
      $username = old('username', request('username'));
      $email    = old('email',    request('email'));
      $country  = old('country',  request('country'));
      // build query string for the face-detection roundtrip
      $qs = http_build_query([
        'username' => $username,
        'email'    => $email,
        'country'  => $country,
      ]);
    @endphp

    <div id="signup-widget" class="auth-widget">
      @if ($errors->any() && session('form') === 'register')
        <div class="error-box">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="signup-form" method="POST" action="{{ route('register') }}">
        @csrf
        <h2>Smart House Signup</h2>

        <input
          id="su-username"
          type="text"
          name="username"
          placeholder="Username"
          value="{{ $username }}"
          required
        >

        <input
          id="su-email"
          type="email"
          name="email"
          placeholder="Email"
          value="{{ $email }}"
          required
        >

        <select id="su-country" name="country" required>
          <option value="" disabled {{ $country ? '' : 'selected' }}>
            Select your country
          </option>
          @foreach($countries as $code => $name)
            <option value="{{ $name }}" {{ $country === $name ? 'selected' : '' }}>
              {{ $name }}
            </option>
          @endforeach
        </select>

        <input
          id="su-password"
          type="password"
          name="password"
          placeholder="Password"
          required
        >

        <input
          id="su-password_confirmation"
          type="password"
          name="password_confirmation"
          placeholder="Confirm Password"
          required
        >

        <a
          href="{{ route('frames.record') }}?{{ $qs }}"
          class="facesignupoption"
        >
          Signup Using Face Recognition
          @if(request('faceDone') === '1')
            <span class="checkmark">✔︎</span>
          @endif
        </a>

        <button type="submit">Signup</button>
      </form>
    </div>

  </div>

  <script src="{{ asset('js/loginscript.js') }}"></script>
</body>
</html>
