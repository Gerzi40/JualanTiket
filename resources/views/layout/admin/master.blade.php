<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <style>

        html, body {
            height: 100%;
        }

        .gap {
            height: 1rem;
        }

        .dark-background {
            background-color: #2D3142;
        }

        .light-background {
            background-color: #EF8354;
        }

        .extra-light-background {
            background-color: #3D3F48;
        }

        .dark-color {
            color: #2D3142;
        }

        .light-color {
            color: #EF8354;
        }

        .light-button {
            display: inline-block;
            padding: 0.375rem 0.75rem;
            background-color: #EF8354;
            border: none;
            border-radius: 0.375rem;
            color: #2D3142;
            text-decoration: none;
            font-weight: bold;
        }

        .light-button:hover {
            background-color: #D96F40;
        }

        .light-button:active {
            background-color: #C95E36;
        }

    </style>

    @yield('style')

</head>
<body>
    
    <div class="position-fixed top-0 bottom-0 start-0 end-0 d-flex">
        @include('layout.admin.header')
        <div class="p-5" style="overflow-y: auto; width: 85%">
            @yield('content')
        </div>
    </div>

</body>
</html>