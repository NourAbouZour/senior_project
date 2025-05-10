<footer>
    <div class="footer-container">
        <div class="footer-content">
            <!-- Newsletter Section -->
            <div class="newsletter">
    <h2>GET UPDATES ON FUN STUFF YOU PROBABLY WANT TO KNOW ABOUT IN YOUR INBOX.</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('newsletter.store') }}" method="POST">
        @csrf
        <input
          type="email"
          name="email"
          placeholder="Email address"
          required
        >
        <button type="submit">Submit</button>
    </form>
</div>



            <!-- Menu Links -->
            <div class="menu">
                <h3>Menu</h3>
                <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('products') }}">Products</a></li>
                <li><a href="{{ route('aboutus') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="{{ url('bundles') }}">Functions</a></li>
                </ul>
            </div>

            <!-- Support Links -->
            <div class="support">
                <h3 style="
    padding-bottom: 25px;
    top: 22px;">Support</h3>
                <ul>
                    <li><a href="#">Certifications</a></li>
                    <li><a href="#">Live Chat</a></li>
                    <li><a href="#">Leave a Review</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="payment-icons">
                <img src="{{ asset('images/omt.png') }}" alt="Apple Pay">
                <img src="{{ asset('images/whish.png') }}" alt="PayPal">
                <img src="{{ asset('images/visa.png') }}" alt="Visa">
            </div>
            <div class="social-icons">
  <a href="https://www.instagram.com/smart_house_system?igsh=dHB1cW0xdjdhYTkw"><i class="fab fa-instagram" style="color:white;"></i></a>
  <a href="https://x.com/smart_house1?s=21"><i class="fab fa-twitter"   style="color:white;"></i></a>
  <a href="https://www.facebook.com/share/1Be7axpJg3/"><i class="fab fa-facebook-f" style="color:white;"></i></a>
</div>

        </div>
    </div>
</footer>
<script> window.chtlConfig = { chatbotId: "6239643688" } </script>
<script async data-id="6239643688" id="chtl-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
