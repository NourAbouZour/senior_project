<div class="form-container">
  <div class="form-toggle">
    <button id="login-toggle" class="active">Login</button>
    <button id="signup-toggle">Signup</button>
  </div>
  <div class="form-content">
    <!-- Login Form Widget -->
    <div id="login-widget" class="auth-widget active">
      <form id="login-form" class="form" method="POST" action="{{ route('login') }}">
        @csrf
        <h2>Smart House Login</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
      </form>
    </div>

    <!-- Signup Form Widget -->
    <div id="signup-widget" class="auth-widget">
      <form id="signup-form" class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <h2>Smart House Signup</h2>

        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>

        {{-- Country dropdown --}}
        <select name="country" id="country" required>
          <option value="" disabled selected>— Select your country —</option>
          @foreach($countries as $code => $name)
            <option value="{{ $name }}">{{ $name }}</option>
          @endforeach
        </select>

        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

        <button type="submit">Signup</button>
      </form>
    </div>
  </div>
</div>

{{-- password match script --}}
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
