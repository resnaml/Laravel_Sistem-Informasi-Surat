<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BP3MI - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href={{ asset("css/sb/fontawesome-free/css/all.min.css") }} rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href= {{ asset("css/sb/sb-admin-2.min.css") }} rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        @include('main.layout.sidebar')
        
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
            
                @include('main.layout.navbar')

                <div class="container-fluid">
                
                @yield('container')
                
                </div>
            
            </div>
        
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2023</span>
                    </div>
                </div>
            </footer>
        
        </div>

    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    
    <script src={{ asset("js/sb/jquery/jquery.min.js") }}></script>
    <script src={{ asset("js/sb/bootstrap/js/bootstrap.bundle.min.js") }}></script>

    <!-- Core plugin JavaScript-->
    <script src={{ asset("js/sb/jquery-easing/jquery.easing.min.js") }}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ asset("js/sb/sb-admin-2.min.js") }}></script>

    <!-- Page level plugins -->
    <script src={{ asset("js/sb/chart.js/Chart.min.js") }}></script>

    <!-- Page level custom scripts -->
    {{-- <script src="js/sb/demo/chart-area-demo.js"></script> --}}
    <script src={{ asset("js/sb/demo/chart-pie-demo.js") }}></script>
    <script src={{ asset("js/sb/demo/chart-bar-demo.js") }}></script>

</body>

</html>