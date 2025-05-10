<div class="container">
    <!-- Contact Info Section -->
    <div class="contact-info">
        <h2>Let's Connect</h2>
        <p>We would love to hear from you. Whether you have questions about our services, pricing, or anything else, our team is here to help!</p>
        <div class="social-icons">
            <a href="https://www.instagram.com/smart_house_system?igsh=dHB1cW0xdjdhYTkw">
                <i class="fab fa-instagram" style="color:white;"></i>
            </a>
            <a href="https://x.com/smart_house1?s=21">
                <i class="fab fa-twitter" style="color:white;"></i>
            </a>
            <a href="https://www.facebook.com/share/1Be7axpJg3/">
                <i class="fab fa-facebook-f" style="color:white;"></i>
            </a>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="contact-form">
        <h2>Contact Us</h2>
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <div>
                <label for="firstName">First Name</label>
                <input
                  type="text"
                  id="firstName"
                  name="firstName"
                  placeholder="Enter your first name"
                  required
                >
            </div>

            <div>
                <label for="lastName">Last Name</label>
                <input
                  type="text"
                  id="lastName"
                  name="lastName"
                  placeholder="Enter your last name"
                  required
                >
            </div>

            <div>
                <label for="email">Email</label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                  required
                >
            </div>

            <div>
                <label for="phone">Phone Number</label>
                <input
                  type="tel"
                  id="phone"
                  name="phone"
                  placeholder="Enter your phone number"
                  required
                >
            </div>

            <div class="full-width">
                <label for="message">Message</label>
                <textarea
                  id="message"
                  name="message"
                  placeholder="Your message here..."
                  rows="5"
                  required
                ></textarea>
            </div>

            <div class="full-width">
                <button type="submit">Send Message</button>
            </div>
        </form>
    </div>
</div>
