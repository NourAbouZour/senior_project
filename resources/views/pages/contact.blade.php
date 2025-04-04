@include('partials.meta')
<link rel="stylesheet" href="{{ asset('css/contactusstyle.css') }}">
<link rel="stylesheet" href="{{ asset('css/contactcard.css') }}">
<body>
    @include('partials.header')

    @include('widgets.contact-form')
    @include('widgets.contact-map')

    @include('partials.footer')

    <script src="{{ asset('javascript/main.js') }}"></script>
</body>
</html>
