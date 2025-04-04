@include('partials.meta')
<!-- <link rel="stylesheet" href="../css/aboutusstyle.css"> -->
<link rel="stylesheet" href="{{ asset('css/aboutusstyle.css') }}">
<body>
    @include('partials.header')

    <!-- Include the About Us widgets -->
    @include('widgets.about-content')
    @include('widgets.team')

    @include('partials.footer')

    <script src="{{ asset('javascript/main.js') }}"></script>
</body>
</html>
