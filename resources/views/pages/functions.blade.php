<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart House System Functions</title>
    <link rel="stylesheet" href="{{ asset('css/functionsstyle.css') }}">
</head>
<body>
@include('partials.meta')
@include('partials.header')
    

    <div class="content">
    @include('widgets.functions-header')
    @include('widgets.nav-tabs')
        @include('widgets.garden')
        @include('widgets.livingRoom')
        @include('widgets.kitchen')
        @include('widgets.bedroom')
        @include('widgets.bathroom')
        @include('widgets.garage')
    </div>
    @include('partials.footer')
    <script src="{{ asset('js/functionsscript.js') }}"></script>
</body>
</html>
