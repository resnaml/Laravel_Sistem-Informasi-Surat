<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Aresss">
    
    <title>Dashboard | Bp2mi</title>

    {{-- <-- Javascript only --> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- <-- CSS only --> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <!-- TRIXXXXXX -->
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display:none;
        }
    </style>

</head>
<body>
    
    @include('dashboard.layouts.header')

<div class="container-fluid">
<div class="row">

    @include('dashboard.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('container')
    </main>
</div>
</div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <script src="/js/dashboard.js"></script>
</body>
</html>
