<header>
    <div class="headcontents">
        <img src="{{ asset('images/logo2.webp') }}" alt="Logo" class="logo" />

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
                <li><a href="{{ url('products') }}">Products</a></li>
                <li><a href="{{ url('about-us') }}">About Us</a></li>
                <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                <li><a href="{{ url('functions') }}">Functions</a></li>
            </ul>
            <ul class="headercontentslogo">
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </nav>
    </div>
</header>
