@include('partials.meta')
<link rel="stylesheet" href="{{ asset('css/styledesc.css') }}">
<body>
    <div class="product-detail-container">
        @include('widgets.product-image')
        @include('widgets.product-info')
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
