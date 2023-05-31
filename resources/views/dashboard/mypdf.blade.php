<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>No Surat : {{ $surat->full_number }}</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>


<style>

</style>

<div style="text-align: center;">
        <img src="img/header_jelas.jpg" style="width: 800px; height: 130px">
    </div>

    <div class="text-end mt-1 px-2">
        <h6>{{ $surat->tgl_surat_keluar }}</h6>
    </div>

<body>
    
    <div>
        <table class="table table-borderless text-start mb-3 px-2">
            <tr>
                <th>NoSurat</th>
                <td class="table">: {{ $surat->disposisi['no_disposisi'] }}</td> 
            </tr>
            <tr>
                <th>Hal</th>
                <td>: {{ $surat->jenissurat['namejenis'] }}</td>
            </tr>
            <tr>
                <th>Sifat</th>
                <td>: {{ $surat->sifatsurat['namesifat'] }}</td>
            </tr>
            <tr>
                <th>Kepada</th>
                <td>: {{ $surat->kepada_id['name'] }}</td>
            </tr>
        </table>
    </div>
    
    <div class="justify px-2">
        <p>{{ strip_tags($surat->perihal) }}</p>
    </div>
    
</body>

<footer>
    <div class="footer" style="text-align: right;">
        <img src="img/ttd1.jpg" style="width: 230px; height: 130px">
    <h4 class="mr-5">Kepala Sub.Bag, Tata Usaha</h4>
</footer>

</html>