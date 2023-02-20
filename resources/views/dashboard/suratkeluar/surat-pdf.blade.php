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
<body>
    <div style="text-align: center;">
        {{-- <img src="{{ public_path('image.png') }}" style="width: 100px; height: 100px"> --}}
    </div>
    <h2>No Surat      : {{ $surat->disposisi['no_disposisi'] }}</h2>
    <h4>Tanggal Surat : {{ $surat->tgl_surat_keluar }} </h4>
    <h5>Jenis Surat   : {{ $surat->jenissurat['namejenis'] }}</h5>
    <h5>Sifat Surat   : {{ $surat->sifatsurat['namesifat'] }} </h5>
    <h4>Penerima    : <b>{{ $surat->penerima_surat }}</b></h4>
    <p>Isi Surat    : {{ $surat->perihal }}</p>
</body>
<footer>
    
</footer>
</html>