<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @include('layouts/header')
        @yield('content')
    </div>
    @section('javascript')
        <script src="{{ asset('js/app.js') }}"></script>
    @show
</body>
</html>
