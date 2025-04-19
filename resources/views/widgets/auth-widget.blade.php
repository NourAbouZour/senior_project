<div class="form-container">
  <div class="form-toggle">
    <button id="login-toggle" class="active">Login</button>
    <button id="signup-toggle">Signup</button>
  </div>
  <div class="form-content">
    <!-- Login Widget -->
    <div id="login-widget" class="auth-widget active">
      <form id="login-form" class="form" method="POST" action="{{ route('login') }}">
        @csrf
        <h2>Smart House Login</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <a class="facedetectionoption" href="face_detection">Use Face Detection</a>
        <button type="submit">Login</button>
      </form>
    </div>

    <!-- Signup Widget -->
    <div id="signup-widget" class="auth-widget">
      <form id="signup-form" class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <h2>Smart House Signup</h2>

        <input id="su-username" type="text" name="username" placeholder="Username" required>
        <input id="su-email"    type="email" name="email"    placeholder="Email"    required>

        {{-- Country dropdown --}}
        <select id="su-country" name="country" required>
          <option value="" disabled selected>Select your country</option>
          @foreach($countries as $code => $name)
            <option value="{{ $name }}">{{ $name }}</option>
          @endforeach
        </select>

        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

        <a href="#" id="facesignup-btn" class="facesignupoption">
          Signup Using Face Detection
        </a>
        <button type="submit">Signup</button>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  // Tab toggles
  const loginToggle   = document.getElementById('login-toggle');
  const signupToggle  = document.getElementById('signup-toggle');
  const loginWidget   = document.getElementById('login-widget');
  const signupWidget  = document.getElementById('signup-widget');

  loginToggle.addEventListener('click', () => {
    loginToggle.classList.add('active');
    signupToggle.classList.remove('active');
    loginWidget.classList.add('active');
    signupWidget.classList.remove('active');
  });
  signupToggle.addEventListener('click', () => {
    signupToggle.classList.add('active');
    loginToggle.classList.remove('active');
    signupWidget.classList.add('active');
    loginWidget.classList.remove('active');
  });

  // Grab URL params once
  const params   = new URLSearchParams(window.location.search);
  const uParam   = params.get('username');
  const eParam   = params.get('email');
  const cParam   = params.get('country');
  const doneFlag = params.get('faceDone');

  // Pre‑fill signup fields if present
  if (uParam) document.getElementById('su-username').value = uParam;
  if (eParam) document.getElementById('su-email')   .value = eParam;
  if (cParam) document.getElementById('su-country') .value = cParam;
  if (doneFlag === '1') {
    document.getElementById('facesignup-btn').textContent =
      'Signup Using Face Detection ✔️';
  }

  // Clear query so refresh starts fresh
  if ([...params].length) {
    history.replaceState(null, '', location.pathname);
  }

  // Password match validation
  document.getElementById('signup-form').addEventListener('submit', e => {
    const f = e.target;
    if (f.password.value !== f.password_confirmation.value) {
      e.preventDefault();
      alert('Passwords do not match.');
    }
  });

  // “Signup Using Face Detection” click
  document.getElementById('facesignup-btn').addEventListener('click', e => {
    e.preventDefault();
    const u = document.getElementById('su-username').value.trim();
    const m = document.getElementById('su-email')   .value.trim();
    const c = document.getElementById('su-country') .value;
    if (!u) return alert('Please enter a username first.');
    if (!c) return alert('Please select your country first.');

    // Redirect with all three fields
    const qs = new URLSearchParams({ username: u, email: m, country: c }).toString();
    window.location.href = "{{ route('frames.record') }}?" + qs;
  });
});
</script>
