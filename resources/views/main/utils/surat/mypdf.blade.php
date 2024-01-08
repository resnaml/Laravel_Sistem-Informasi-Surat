<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>No Surat : {{ $title }}</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<div style="text-align: center;">
        <img src="img/header_jelas.jpg" style="width: 800px; height: 130px">
</div>


<head>
    <div class="text-end px-2">
        <h6 class="fw-normal">{{ $tgl }}</h6>
    </div>
    <div class="text-start px-2">

        <table class="table table-borderless">
            <tr>
                <th class="fw-normal">Nomor</th>
                <td class="table">: {{ $no }}</td> 
            </tr>
            <tr>
                <th class="fw-normal">Hal</th>
                <td class="fw-bold">: {{ $jenis }}</td>
            </tr>
        </table>
    </div>
</head>

<body style="padding-top: 15px;">
    <div class="justify px-2">
        {!! $isi !!}
    </div>
</body>

<footer>
    <div class="position-absolute bottom-0 end-0" style="text-align: right;">
        <div class="lh-1 text-wrap justify-content-center" style="width: 14rem;">
            <p>Ka.Sub.Bag. Tata Usaha</p>
        </div>
        <img src="{{ $ttd }}" width="130" height="90">
        <p class="text-uppercase px-2">{{ $oleh }}</p>
    </div>
</footer>

</html>