<form method="POST" action="{{ route('checkout.store') }}" class="checkout-form">
  @csrf
 <div class="form-group">
    <label>Cart ID</label>
    <input
      type="text"
      name="cart_id"
      value="{{ $cartId }}"
      readonly
    >
  </div>

  <div class="form-group">
    <label>Total</label>
    <input
      type="text"
      name="total"
      value="{{ $total }}"
      readonly
    >
  </div>


  {{-- show success message --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <h1>Checkout</h1>

  

  <fieldset>
    <legend>Shipping Address</legend>

    @foreach (['fullname','address1','address2','city','state'] as $field)
      <div class="form-group">
        <label>{{ ucwords(str_replace('2',' 2', $field)) }}</label>
        <input
          type="text"
          name="{{ $field }}"
          value="{{ old($field) }}"
          {{ $field !== 'address2' ? 'required' : '' }}
        >
        @error($field) <span class="error">{{ $message }}</span> @enderror
      </div>
    @endforeach

    <div class="form-group">
      <label>Country</label>
      <select id="country" name="country" required>
        <option value="">Select your country</option>
        @foreach($countries as $code => $name)
          <option
            value="{{ $code }}"
            {{ old('country') == $code ? 'selected' : '' }}
          >{{ $name }}</option>
        @endforeach
      </select>
      @error('country') <span class="error">{{ $message }}</span> @enderror
    </div>
  </fieldset>
<fieldset>
    <legend>Contact Information</legend>

    <div class="form-group">
      <label>Email address</label>
      <input
        type="email"
        name="email"
        value="{{ old('email') }}"
        required
      >
      @error('email') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Phone number</label>
      <input
        type="tel"
        name="phone"
        id="phone"
        value="{{ old('phone') }}"
        required
      >
      @error('phone') <span class="error">{{ $message }}</span> @enderror
    </div>
  </fieldset>
 <fieldset>
  <legend>Payment Details</legend>

  {{-- payment method dropdown + wrapper for injected code --}}
  <div class="form-group" id="payment-group">
    <label>Payment method</label>
    <select name="payment_method" id="payment-method" required>
      <option value="credit-card" id="credit-card" {{ old('payment_method') == 'credit-card' ? 'selected' : '' }}>
        Credit Card
      </option>
      <option value="apple-pay-wish" {{ old('payment_method') == 'apple-pay-wish' ? 'selected' : '' }}>
        Wish LB
      </option>
      <option value="omt" {{ old('payment_method') == 'omt' ? 'selected' : '' }}>
        OMT Lebanon
      </option>
      <option value="cod" {{ old('payment_method') == 'cod' ? 'selected' : '' }}>
        Cash on Delivery
      </option>
    </select>
    @error('payment_method')
      <span class="error">{{ $message }}</span>
    @enderror
  </div>

  {{-- credit-card fields, hidden unless CC was selected --}}
  <div
    id="cc-fields"
    style="{{ old('payment_method') !== 'credit-card' ? 'display:none' : '' }}"
  >
    @foreach ([
      'cc_name'       => 'Cardholder name',
      'cc_number'     => 'Card number',
      'cc_expiration' => 'Expiration (DD/YY)',
      'cc_cvc'        => 'CVV',
    ] as $name => $label)
      <div class="form-group">
        <label>{{ $label }}</label>
        <input
          type="text"
          name="{{ $name }}"
          value="{{ old($name) }}"
          {{ $name !== 'cc_name' ? 'maxlength=' . ($name === 'cc_cvc' ? 3 : 19) : '' }}
        >
        @error($name)
          <span class="error">{{ $message }}</span>
        @enderror
      </div>
    @endforeach
  </div>
</fieldset>


  <div class="terms">
    <label>
      <input type="checkbox" name="terms" value="1" {{ old('terms') ? 'checked' : '' }}>

      I agree to the <a href="{{ asset('terms') }}">Terms & Conditions</a>
    </label>
    @error('terms') <span class="error">{{ $message }}</span> @enderror
  </div>

  <button type="submit" class="btn-submit">Place order</button>
  <div class="back-button">
    <a href="/"> Return Home</a>
  </div>
</form>


  <link rel="stylesheet" href="{{ asset('css/formstyle.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/.../css/intlTelInput.css"/>
  <script src="https://cdnjs.cloudflare.com/.../js/intlTelInput.min.js"></script>
 <script>
document.addEventListener('DOMContentLoaded', function() {
  var pmSelect      = document.getElementById('payment-method');
  var ccFields      = document.getElementById('cc-fields');
  var paymentGroup  = document.getElementById('payment-group');

  function updatePaymentUI() {
    // Remove any old code paragraph
    var oldCode = document.getElementById('payment-code');
    if (oldCode) oldCode.remove();

    if (pmSelect.value === 'credit-card') {
      // Show credit card fields
      ccFields.style.display = '';
    } else {
      // Hide credit card fields
      ccFields.style.display = 'none';

      // For Wish LB or OMT, inject "111"
      if (pmSelect.value === 'apple-pay-wish' || pmSelect.value === 'omt') {
        var p = document.createElement('p');
        p.id = 'payment-code';
        p.textContent = '+961 76075491';
        paymentGroup.appendChild(p);
      }
      // For COD, do nothing (fields hidden, no code)
    }
  }

  // Attach listener and initialize on load
  pmSelect.addEventListener('change', updatePaymentUI);
  updatePaymentUI();
});

//country code
document.addEventListener('DOMContentLoaded', () => {
  // Grab by ID (or fallback to name selector)
  const countrySelect = document.getElementById('country')
                        || document.querySelector('select[name="country"]');
  const phoneInput    = document.getElementById('phone');
  if (!countrySelect || !phoneInput) return; 

  countrySelect.addEventListener('change', async () => {
    const code = countrySelect.value;  // e.g. "US" or "lb"
    if (!code) return;

    try {
      // Fetch dialing info
      const resp = await fetch(`https://restcountries.com/v3.1/alpha/${code}`);
      const data = await resp.json();
      const idd  = data[0].idd;
      // Some countries have multiple suffixes; take the first
      const dial = idd.root + (idd.suffixes?.[0] || '');
      
      // Put the dial code into the phone input
      phoneInput.value = dial + ' ';
      // Move cursor to end
      phoneInput.setSelectionRange(
        phoneInput.value.length,
        phoneInput.value.length
      );
    } catch (err) {
      console.error('Dial code lookup failed:', err);
    }
  });

});

</script>

