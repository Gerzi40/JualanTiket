<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiketin</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/icon/tlogo_final.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/styling.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <style>
        html,
        body {
            height: 100%;
        }

        .pagination>.active>a,
        .pagination>.active>a:focus,
        .pagination>.active>a:hover,
        .pagination>.active>span,
        .pagination>.active>span:focus,
        .pagination>.active>span:hover {
            background-color: #2D3142;
            border-color: #2D3142;
        }
    </style>
</head>

<body>

    <div class="position-fixed top-0 bottom-0 start-0 end-0 overflow-auto d-flex flex-column">
        @include('layout.user.header')

        <div class="flex-grow-1">
            @yield('content')
        </div>

        @include('layout.user.footer')
    </div>


</body>
@yield('scripts');
@yield('style');

</html>
