@include('partials.meta')
<link rel="stylesheet" href="{{ asset('css/homestyle.css') }}">
<link rel="stylesheet" href="{{ asset('css/contactcard.css') }}">

<body>
    @include('partials.header')
    @include('widgets.slider')
    @include('widgets.services')
    @include('widgets.about-us')
    @include('widgets.categories')
    @include('widgets.featured-products')
    @include('widgets.contact-us')

    @include('partials.footer')

</body>
</html>
<script>
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
</script>
