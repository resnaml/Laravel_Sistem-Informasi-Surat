<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        table.static {
            position: relative;
            border: 1px solid rgb(84, 53, 53);
        }
    </style>
    <title class="container">LaporanSeluruh Surat</title>

</head>

    <body>
        <div class="form-group">
            <p align="center"><b>Laporan Data Surat Pribadi</b></p>
            <table class="static" align="center" rule="all" border="3px" style="width: 80%;">
            <tr>
                <th>No</th>
                <th>Kode Surat</th>
                <th>Jenis Surat</th>
                <th>Sifat Surat</th>
                <th>Tgl Surat Keluar</th>
                <th>Tujuan Surat</th>
                <th>Pembuat Surat</th>
                <th>Proses Surat</th>
                <th>Waktu Pembuatan</th>
            </tr>

            @foreach ($suratkeluar as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->jenissurat['kodesurat'] ?? '' }}-{{ str_pad($surat->no_surat_keluar, 4, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $surat->jenissurat['namejenis'] }}</td>
                <td>{{ $surat->sifatsurat['namesifat'] }}</td>
                <td>{{ $surat->tgl_surat_keluar }}</td>
                <td>{{ $surat->kepada_id['name'] }}</td>
                <td>{{ $surat->user->name }}</td>
                <td>{{ $surat->status }}</td>
                <td>{{ $surat->created_at->format('m-d-y') }}</td>
            </tr>
            @endforeach
            
            </table>
        </div>

        <script src="js/print.js"></script>

    </body>
</html>