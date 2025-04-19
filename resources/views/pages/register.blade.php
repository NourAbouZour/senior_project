@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
@section('content')
  <div class="form-container">
    <h2>Smart House Signup</h2>
    <form id="signup-form" method="POST" action="{{ route('register') }}">
      @csrf

      <input type="text"
             name="username"
             placeholder="Username"
             required>

      <input type="email"
             name="email"
             placeholder="Email"
             required>

      {{-- Country dropdown --}}
      <select name="country"
              id="country"
              required>
        <option value="" disabled selected>
          — Select your country —
        </option>
        @foreach($countries as $code => $name)
          <option value="{{ $name }}">{{ $name }}</option>
        @endforeach
      </select>

      <input type="password"
             name="password"
             placeholder="Password"
             required>

      <input type="password"
             name="password_confirmation"
             placeholder="Confirm Password"
             required>

      <button type="submit">Signup</button>
    </form>
  </div>

  {{-- Client‑side password match check --}}
  <script>
    document
      .getElementById('signup-form')
      .addEventListener('submit', function(e) {
        const pw  = this.password.value;
        const pw2 = this.password_confirmation.value;
        if (pw !== pw2) {
          e.preventDefault();
          alert('❌ Passwords do not match.');
        }
      });
  </script>
@endsection
