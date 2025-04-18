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
