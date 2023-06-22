<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <link rel="stylesheet" href="/dashboard.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    {{-- css bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>


    {{-- <link href="/css/dashboard.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <style>
        trix-toolbar .trix-button-group[data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

</head>

<body>


    @include('dashboard.layouts.header')

    <div class="container-fluid">
        <div class="row">
            @include('dashboard.layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
                @yield('container')
            </main>

        </div>
    </div>


    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>


    <script src="/js/dashboard.js"></script>
</body>

</html>
