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
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Surat</title>

</head>

    <body>
        <div class="form-group">
            <p align="center"><b>Laporan Data Surat Pribadi</b></p>
            <table class="static" align="center" rule="all" border="1px" style="width: 95%;">
            <tr>
                <th>No</th>
                <th>Kode Surat</th>
                <th>Tgl Surat Keluar</th>
                <th>Tujuan Surat</th>
                <th>Pembuat Surat</th>
                <th>Proses Surat</th>
            </tr>
            @foreach ($suratkeluar as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->no_surat_keluar }}</td>
                <td>{{ $surat->tgl_surat_keluar }}</td>
                <td>{{ $surat->penerima_surat }}</td>
                <td>{{ $surat->user->name }}</td>
                <td>{{ $surat->status }}</td>
            </tr>
            @endforeach
            
            </table>
        </div>
    </body>
</html>