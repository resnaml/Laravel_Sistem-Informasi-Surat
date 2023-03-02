<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Surat BP3MI Bandung</title>
    {{-- <h2 align="center">Surat oleh : {{ $suratkeluar->user['name'] }}</h2> --}}
</head>
    <style>
        table.static {
            position: relative;
            border: 10px white;
            grid-area: auto;
            row-gap: 30px;
        }
        div.tgl{
            position: absolute;
            top: 225px;
            right: 10px;
            font-size: 15px;  
        }
        div.form-group{
            gap: 20px;
            bottom: 70px;
        }
        div.footer{
            position: absolute;
            top: 800px;
            right: 5px;
            font-size: 15px; 
        }


    </style>
<body>
    <div style="text-align: center;">
        <img src="/img/header.jpg" style="width: 800px; height: 200px">
    </div>

    <div class="form-group border-bottom-5">
        <p align="container mt-5">
            <b></b>
        </p>

            <div class="tgl"><b>{{ $suratkeluar->tgl_surat_keluar }}</b> 
            </div>
            
        <div>
        <table class="static" align="container"  style="width: 50%;">
            {{ $suratkeluar->diposisi }}
            <thead>
            <td>No Surat <td>: {{ $suratkeluar->disposisi['no_disposisi'] }}</td></td>
        </table>

        <table class="static" align="container"  style="width: 111%;">
            <td>Hal   <span></span><td>: <b>{{ $suratkeluar->jenissurat['namejenis'] }}</b></td></td>
        </table>

        <table class="static" align="container"  style="width: 37%;">
            <td>Kepada   <span></span><td>: {{ $suratkeluar->penerima_surat }}</td></td>
        </table>

        <hr>
        <div class="form-group border-bottom-5">
            <p align="container mt-5">
                Dengan hormat.
            </p>
        <table class="static mt-lg-5 justify-content-center" align="center"  style="width: 100%;">
            <td>{{ $suratkeluar->perihal }}</td>
        </table>
            <p align="container mt-5">
                Atas perhatian dan kerjasamanya, kami sampaikan terima kasih.
            </p>
        </div>

        <script type="text/javascript">
            window.print();
        </script>
</body>

<footer>
    <div class="footer" style="text-align: right;">
        <img src="/img/footer.jpg" style="width: 300px; height: 150px">
    <h4 class="mr-5">Kepala Sub.Bag, Tu</h4>
    </div>
</footer>

</html>