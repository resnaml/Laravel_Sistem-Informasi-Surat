<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Surat BP3MI Bandung</title>
</head>
    <style>
        table.static {
            position: relative;
            border: 3px white;
            grid-area: auto;
        }
        div.tgl{
            position: absolute;
            top: 140px;
            right: 30px;
            font-size: 15px;  
        }
        
    </style>
<body>
    <div style="text-align: center;">
        <img src="{{ public_path('image.png') }}" style="width: 100px; height: 100px">
    </div>
    <div class="form-group">
        <p align="center" class="border-bottom border-dark border-5"><b>Laporan Data Surat Pribadi</b></p>
        <div class="tgl">Tanggal Surat : {{ $suratkeluar->tgl_surat_keluar }} </div>
        <table class="static" align="center" rule="all" border="1px" style="width: 85%;">

    {{ $suratkeluar->diposisi }}
    <td>No Surat : {{ $suratkeluar->disposisi['no_disposisi'] }}</td>
</table>
    {{-- @foreach ($suratkeluar as $item) --}}
    <div class="center">Jenis Surat   : {{ $suratkeluar->jenissurat['namejenis'] }}</div>
    <div class="center1">Sifat Surat   : {{ $suratkeluar->sifatsurat['namesifat'] }} </div>
    <td>Penerima    : <b>{{ $suratkeluar->penerima_surat }}</b></td>
    <p class="justify">Isi Surat    : {{ $suratkeluar->perihal }}</p>
    </div>
    {{-- @endforeach --}}
    <script type="text/javascript">
        window.print();

    </script>
</body>

<footer>
    
</footer>

</html>