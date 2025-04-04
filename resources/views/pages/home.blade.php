@include('partials.meta')
<body>
    @include('partials.header')

    <!-- Home Page Widgets -->
    @include('widgets.slider')
    @include('widgets.services')
    @include('widgets.about')
    @include('widgets.categories')
    @include('widgets.featured-products')
    @include('widgets.contact')

    @include('partials.footer')

    <script src="{{ asset('javascript/main.js') }}"></script>
</body>
</html>
