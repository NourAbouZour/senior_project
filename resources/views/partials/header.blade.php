<header>
    <div class="headcontents">
        <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="logo" />

        <!-- Hamburger Icon -->
        <div class="hamburger" onclick="toggleMenu()">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <!-- Navigation Links -->
        <nav class="nav-menu">
            <ul class="headercontents">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('products') }}">Products</a></li>
                <li><a href="{{ route('aboutus') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="{{ url('bundles') }}">Functions</a></li>
            </ul>
            <ul class="headercontentslogo">
                <li>
  <a
    href="https://wa.me/96176075491"
    target="_blank"
    rel="noopener noreferrer"
    title="Chat on WhatsApp"
  >
    <i class="fa-brands fa-whatsapp"></i>
  </a>
</li>

                <li><a href="/login"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </nav>
    </div>
</header>
