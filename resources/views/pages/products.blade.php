@include('partials.meta')
<link rel="stylesheet" href="{{ asset('css/productsstyle.css') }}">
<body>
    @include('partials.header')

    <div class="container">
        @include('widgets.product-filter')
        @include('widgets.product-grid')
    </div>

    @include('partials.footer')

    <script src="{{ asset('javascript/main.js') }}"></script>
</body>
</html>
