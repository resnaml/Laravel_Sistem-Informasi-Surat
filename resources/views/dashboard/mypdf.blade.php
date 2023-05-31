<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat BP3MI</title>

</head>

<style>

</style>

<div style="text-align: center;">
        <img src="img/header_jelas.jpg" style="width: 800px; height: 130px">
    </div>

<body>
    <div class="">
        <h5>No Surat : {{ $surat->disposisi['no_disposisi'] }}</h5>
        <h6>Hal : {{ $surat->jenissurat['namejenis'] }}</h6>
        <h6>Sifat : {{ $surat->sifatsurat['namesifat'] }}</h6>
        <h6>Kepada : {{ $surat->kepada_id['name'] }}</h6>
    </div>
    <p>{{ strip_tags($surat->perihal) }}</p>
    
</body>

<footer>
    <div class="footer" style="text-align: right;">
        <img src="img/ttd1.jpg" style="width: 230px; height: 130px">
    <h4 class="mr-5">Kepala Sub.Bag, Tata Usaha</h4>
</footer>

</html>