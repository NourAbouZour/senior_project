document.addEventListener('DOMContentLoaded', () => {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const bundles = document.querySelectorAll('.bundle-card');
  
    // Filter logic
    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelector('.filter-btn.active').classList.remove('active');
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        bundles.forEach(card => {
          card.style.display = (filter === 'all' || card.dataset.category === filter) ? 'block' : 'none';
        });
      });
    });
  
    // Price calculation per bundle
    bundles.forEach(card => {
      const options = card.querySelectorAll('.option');
      const priceEl = card.querySelector('.price');
  
      function updatePrice() {
        let total = 0;
        options.forEach(opt => {
          if (opt.checked) total += parseFloat(opt.dataset.price);
        });
        priceEl.textContent = `Total: $${total.toFixed(2)}`;
      }
  
      options.forEach(opt => opt.addEventListener('change', updatePrice));
      updatePrice();
    });
  });
