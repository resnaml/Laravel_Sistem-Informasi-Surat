<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>No Surat : {{ $surat->full_number }}</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<div style="text-align: center;">
        <img src="img/header_jelas.jpg" style="width: 800px; height: 130px">
</div>


    <head>
        <div class="text-end px-2">
            <h6 class="fw-normal">{{ date('d M Y', strtotime($surat->tgl_surat_keluar)) }}</h6>
        </div>
        <div class="text-start px-2">

            <table class="table table-borderless">
                <tr>
                    <th class="fw-normal">Nomor</th>
                    <td class="table">: {{ $surat->disposisi['no_disposisi'] }}</td> 
                </tr>
                <tr>
                    <th class="fw-normal">Hal</th>
                    <td class="fw-bold">: {{ $surat->jenissurat['namejenis'] }}</td>
                </tr>
                {{-- <tr>
                    <th>Sifat</th>
                    <td>: {{ $surat->sifatsurat['namesifat'] }}</td>
                </tr> --}}
                {{-- <tr>
                    <th>Kepada</th>
                    <td>: {{ $surat->kepada_id['username'] }}</td>
                </tr> --}}
            </table>
        </div>
    </head>

    {{-- <hr class="border border-dark border-1 opacity-100" style="padding-top: 10px;"> --}}

<body style="padding-top: 15px;">
    
    <div class="justify px-2">
        {!! $surat->perihal !!}
    </div>
    
</body>

<footer>
    <div class="position-absolute bottom-0 end-0" style="text-align: right;">
        <div class="lh-1 text-wrap justify-content-center" style="width: 14rem;">
            {{-- an. Kepala UPT BP3MI Wilayah Bandung-Jawa Barat --}}
            <p>Ka.Sub.Bag. Tata Usaha</p>
        </div>
        <img src="{{ ($surat->disposisi['ttd']) }}" width="130" height="90">
        <p class="text-uppercase px-2">{{ $surat->disposisi['disposisi_oleh'] }}</p>
    </div>
</footer>

</html>