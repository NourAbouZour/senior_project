function toggleMenu() {
    const menu = document.querySelector(".nav-menu");
    menu.classList.toggle("active");
}

document.addEventListener("DOMContentLoaded", () => {
    const productsContainer = document.querySelector(".products");
    const prevButton = document.querySelector(".prev-btn");
    const nextButton = document.querySelector(".next-btn");


    prevButton.addEventListener("click", () => {
        productsContainer.scrollBy({
            left: -220,
            behavior: "smooth",
        });
    });


    nextButton.addEventListener("click", () => {
        productsContainer.scrollBy({
            left: 220,
            behavior: "smooth",
        });
    });


    const toggleButtons = () => {
        const maxScrollLeft =
            productsContainer.scrollWidth - productsContainer.clientWidth;

        prevButton.disabled = productsContainer.scrollLeft <= 0;
        nextButton.disabled = productsContainer.scrollLeft >= maxScrollLeft;
    };


    productsContainer.addEventListener("scroll", toggleButtons);


    toggleButtons();
});

function toggleMenu() {
    const navMenu = document.querySelector('.nav-menu');
    const hamburger = document.querySelector('.hamburger');
    const headcontents = document.querySelector('.headcontents');

    // Toggle .active on these elements
    navMenu.classList.toggle('active');
    hamburger.classList.toggle('active');
    headcontents.classList.toggle('active');
}

// Optional: Navbar changes to white on scroll
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// tooglefilter
document.addEventListener('DOMContentLoaded', () => {
    const applyBtn   = document.getElementById('applyFilter');
    const checkboxes = document.querySelectorAll('.filter input[type=checkbox]');
    const priceRange = document.getElementById('priceRange');
    const priceValue = document.getElementById('priceValue');
    const cards      = document.querySelectorAll('.product-card');
  
    // keep the price label in sync
    priceRange.addEventListener('input', () => {
      priceValue.textContent = priceRange.value;
    });
  
    applyBtn.addEventListener('click', () => {
      // 1) which categories are checked?
      const pickedCats = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.id);
  
      // 2) what's the maximum price?
      const maxPrice = parseFloat(priceRange.value);
  
      cards.forEach(card => {
        const cat = card.getAttribute('data-category') || '';
        // grab the numeric price (e.g. "5$" → 5)
        const priceText = card.querySelector('.price').textContent;
        const price = parseFloat(priceText.replace('$','').trim());
  
        // 3) match both category AND price
        const catMatch   = pickedCats.includes('all') || pickedCats.includes(cat);
        const priceMatch = price <= maxPrice;
  
        // 4) show or hide
        card.style.display = (catMatch && priceMatch) ? '' : 'none';
      });
    });
  });
  
  