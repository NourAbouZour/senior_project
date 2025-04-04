function toggleMenu() {
    const menu = document.querySelector(".nav-menu");
    menu.classList.toggle("active");
}


document.addEventListener("DOMContentLoaded", function() {
    const slides = document.querySelectorAll(".slide");
    let currentIndex = 0;

    function showNextSlide() {
        slides[currentIndex].classList.remove("active");

        currentIndex = (currentIndex + 1) % slides.length;

        slides[currentIndex].classList.add("active");
    }

    setInterval(showNextSlide, 2000); // Change slide every 2 seconds
});



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