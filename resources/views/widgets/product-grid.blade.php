<div id="cart-icon" title="View Cart">
  <i class="fa fa-shopping-cart"></i>
  <span id="cart-count">0</span>
</div>

<div id="cart-overlay">
  <span id="close-cart">&times;</span>
  <h2>Your Cart</h2>
  <table id="cart-items">
    <thead>
      <tr><th>Product</th><th>Price</th><th>Qty</th></tr>
    </thead>
    <tbody></tbody>
    <tfoot>
      <tr>
        <td><strong>Total</strong></td>
        <td id="cart-total">0.00$</td>
        <td></td>
      </tr>
    </tfoot>
  </table>
  <button id="checkout-button">Checkout</button>
</div>
<div class="product-grid">
    <!-- Microcontrollers & Modules -->
    <div class="product-card" data-category="microcontroller">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=1">
                <img src="{{ asset('images/arduino uno.png') }}" alt="Arduino Uno">
            </a>
        </div>
        <div class="product-info">
            <h2>Central System</h2>
            <p class="brand">Arduino Uno</p>
            <p class="description">Arduino Uno-based unit for managing projects.</p>
            <div class="price-button">
                <span class="price">5$</span>
                <a href="{{ route('product.detail') }}?id=1">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <div class="product-card" data-category="microcontroller">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=5">
                <img src="{{ asset('images/esp.png') }}" alt="ESP Central Wireless System">
            </a>
        </div>
        <div class="product-info">
            <h2>Central Wireless System</h2>
            <p class="brand">ESP</p>
            <p class="description">ESP-based system for wireless connectivity.</p>
            <div class="price-button">
                <span class="price">8$</span>
                <a href="{{ route('product.detail') }}?id=5">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <!-- Electrical Components -->
    <div class="product-card" data-category="electrical">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=2">
                <img src="{{ asset('images/wires.png') }}" alt="Wires">
            </a>
        </div>
        <div class="product-info">
            <h2>Wires</h2>
            <p class="description">50 meters of connecting wires for versatile use.</p>
            <div class="price-button">
                <span class="price">6$</span>
                <a href="{{ route('product.detail') }}?id=2">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <div class="product-card" data-category="electrical">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=11">
                <img src="{{ asset('images/resistors.png') }}" alt="Resistors">
            </a>
        </div>
        <div class="product-info">
            <h2>Resistors</h2>
            <p class="description">Essential components for controlling electrical current.</p>
            <div class="price-button">
                <span class="price">2$</span>
                <a href="{{ route('product.detail') }}?id=11">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <!-- Visual Components -->
    <div class="product-card" data-category="visual">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=3">
                <img src="{{ asset('images/ledlights.png') }}" alt="LED Lights">
            </a>
        </div>
        <div class="product-info">
            <h2>LED Lights</h2>
            <p class="description">Energy-efficient LEDs for creative lighting.</p>
            <div class="price-button">
                <span class="price">2$</span>
                <a href="{{ route('product.detail') }}?id=3">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <div class="product-card" data-category="visual">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=9">
                <img src="{{ asset('images/lightbulb.png') }}" alt="Lightbulb">
            </a>
        </div>
        <div class="product-info">
            <h2>Lightbulb</h2>
            <p class="description">Standard bulb for reliable illumination.</p>
            <div class="price-button">
                <span class="price">2$</span>
                <a href="{{ route('product.detail') }}?id=9">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <div class="product-card" data-category="visual">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=14">
                <img src="{{ asset('images/lcd screen.png') }}" alt="LCD Screen">
            </a>
        </div>
        <div class="product-info">
            <h2>LCD Screen</h2>
            <p class="brand">LCD Screen</p>
            <p class="description">Clear display ideal for project interfaces.</p>
            <div class="price-button">
                <span class="price">7$</span>
                <a href="{{ route('product.detail') }}?id=14">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <!-- Power & Energy -->
    <div class="product-card" data-category="power">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=12">
                <img src="{{ asset('images/solarpanel.png') }}" alt="Solar Panel">
            </a>
        </div>
        <div class="product-info">
            <h2>Solar Panel</h2>
            <p class="description">Efficient panel for renewable energy projects.</p>
            <div class="price-button">
                <span class="price">4$</span>
                <a href="{{ route('product.detail') }}?id=12">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <!-- Sensors -->
    <div class="product-card" data-category="sensors">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=7">
                <img src="{{ asset('images/motion sensor.png') }}" alt="Motion Sensor">
            </a>
        </div>
        <div class="product-info">
            <h2>Motion Sensor</h2>
            <p class="brand">Motion Sensor</p>
            <p class="description">Detects movement for improved security.</p>
            <div class="price-button">
                <span class="price">5$</span>
                <a href="{{ route('product.detail') }}?id=7">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <div class="product-card" data-category="sensors">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=10">
                <img src="{{ asset('images/ldrsensor.png') }}" alt="LDR Sensors">
            </a>
        </div>
        <div class="product-info">
            <h2>Light Sensors</h2>
            <p class="brand">LDR Sensors</p>
            <p class="description">LDR sensors for monitoring light levels.</p>
            <div class="price-button">
                <span class="price">2$</span>
                <a href="{{ route('product.detail') }}?id=10">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <div class="product-card" data-category="sensors">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=13">
                <img src="{{ asset('images/soilsensor.png') }}" alt="Soil Sensor">
            </a>
        </div>
        <div class="product-info">
            <h2>Soil Sensor</h2>
            <p class="brand">Soil Sensor</p>
            <p class="description">Monitors moisture levels in soil.</p>
            <div class="price-button">
                <span class="price">7$</span>
                <a href="{{ route('product.detail') }}?id=13">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <!-- Actuators & Motors -->
    <div class="product-card" data-category="motors">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=6">
                <img src="{{ asset('images/motor.png') }}" alt="MG-90 Motor">
            </a>
        </div>
        <div class="product-info">
            <h2>Motor</h2>
            <p class="brand">MG-90 Motor</p>
            <p class="description">Compact MG-90 motor for various applications.</p>
            <div class="price-button">
                <span class="price">10$</span>
                <a href="{{ route('product.detail') }}?id=6">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <div class="product-card" data-category="motors">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=15">
                <img src="{{ asset('images/dcmotor.png') }}" alt="DC Motor">
            </a>
        </div>
        <div class="product-info">
            <h2>Water Motor</h2>
            <p class="brand">DC Motor</p>
            <p class="description">Robust DC motor designed for water applications.</p>
            <div class="price-button">
                <span class="price">7$</span>
                <a href="{{ route('product.detail') }}?id=15">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <!-- Security & Access Control -->
    <div class="product-card" data-category="sac">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=4">
                <img src="{{ asset('images/rfid.png') }}" alt="RFID Door Lock">
            </a>
        </div>
        <div class="product-info">
            <h2>Door Lock</h2>
            <p class="brand">RFID</p>
            <p class="description">RFID door lock that opens with a card.</p>
            <div class="price-button">
                <span class="price">12$</span>
                <a href="{{ route('product.detail') }}?id=4">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>

    <div class="product-card" data-category="sac">
        <div class="product-image">
            <a href="{{ route('product.detail') }}?id=8">
                <img src="{{ asset('images/rfidcard.png') }}" alt="RFID Key Card">
            </a>
        </div>
        <div class="product-info">
            <h2>Key</h2>
            <p class="brand">RFID Card</p>
            <p class="description">RFID key card for secure access control.</p>
            <div class="price-button">
                <span class="price">2$</span>
                <a href="{{ route('product.detail') }}?id=8">
                    <button class="productdesc">More Info</button>
                </a>
                <button class="buy-button"><a>Buy Now</a></button>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const cartIcon    = document.getElementById('cart-icon');
  const closeCart   = document.getElementById('close-cart');
  const cartOverlay = document.getElementById('cart-overlay');
  const cartBody    = document.querySelector('#cart-items tbody');
  const totalDisplay= document.getElementById('cart-total');
  const countBadge  = document.getElementById('cart-count');
  const checkoutBtn = document.getElementById('checkout-button');

  let cart = [];

  function renderCart() {
    cartBody.innerHTML = '';
    let total = 0;
    let itemCount = 0;

    cart.forEach(item => {
      const lineTotal = item.price * item.quantity;
      total += lineTotal;
      itemCount += item.quantity;

      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${item.name}</td>
        <td>${lineTotal.toFixed(2)}$</td>
        <td>
          <button class="qty-decrease" data-name="${item.name}">–</button>
          ${item.quantity}
          <button class="qty-increase" data-name="${item.name}">+</button>
        </td>
      `;
      cartBody.appendChild(tr);
    });

    // update totals
    totalDisplay.innerText = total.toFixed(2) + '$';
    countBadge.innerText   = itemCount;
  }

  function addToCart(name, price) {
    const existing = cart.find(i => i.name === name);
    if (existing) existing.quantity += 1;
    else cart.push({ name, price, quantity: 1 });
    renderCart();
    cartOverlay.classList.add('active');
  }

  // Delegate +/- clicks
  cartBody.addEventListener('click', e => {
    const name = e.target.dataset.name;
    if (!name) return;
    const item = cart.find(i => i.name === name);
    if (!item) return;

    if (e.target.matches('.qty-increase')) item.quantity += 1;
    else if (e.target.matches('.qty-decrease')) {
      item.quantity -= 1;
      if (item.quantity <= 0) cart = cart.filter(i => i.name !== name);
    }
    renderCart();
  });

  // toggle overlay
  cartIcon.addEventListener('click', () =>
    cartOverlay.classList.toggle('active')
  );
  closeCart.addEventListener('click', () =>
    cartOverlay.classList.remove('active')
  );

  // Buy Now buttons
  document.querySelectorAll('.buy-button').forEach(btn =>
    btn.addEventListener('click', e => {
      e.preventDefault();
      const card = e.currentTarget.closest('.product-card');
      const name = card.querySelector('h2').innerText.trim();
      const priceText = card.querySelector('.price').innerText;
      const price = parseFloat(priceText.replace(/[^0-9.]/g, '')) || 0;
      addToCart(name, price);
    })
  );

  // checkout stub
  checkoutBtn.addEventListener('click', () => {
  if (!cart.length) {
    return alert('Your cart is empty!');
  }

  fetch("{{ route('cart.checkout') }}", {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ items: cart })
  })
  .then(res => res.json())
  .then(json => {
    if (json.success) {
      alert(`Cart saved! Your cart ID is #${json.cart_id}.`);
      // optionally: window.location = `/order/confirmation/${json.cart_id}`;
    } else {
      alert('Something went wrong saving your cart.');
    }
  })
  .catch(() => alert('Network error saving cart.'));
});

});
</script>
