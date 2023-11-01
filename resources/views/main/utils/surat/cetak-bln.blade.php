<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laporan Surat PerBulan BP3MI</title>
</head>

    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>

    <body>
        <div class="form-group">
            <p align="center"><b>Laporan Data PerBulan Surat BP3MI Bandung</b></p>
            <table class="table-secondary" align="center" rule="all" border="1px" style="width: 100%;">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Surat</th>
                <th scope="col">Tgl Surat </th>
                <th scope="col">Jenis Surat</th>
                <th scope="col">Sifat Surat</th>
                <th scope="col">Pembuat Surat</th>
                <th scope="col">Tujuan Surat</th>
                <th scope="col">Status Surat</th>
                <th scope="col">Disposisi</th>
                <th scope="col">Tgl Surat Dibuat</th>
            </tr>
            @foreach ($surat as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->jenissurat['kodesurat'] ?? '' }}-{{ str_pad($s->no_surat_keluar, 4, '0', STR_PAD_LEFT) }}</td>
                <td><b>{{ $s->tgl_surat_keluar }}</b></td>
                <td>{{ $s->jenissurat['namejenis'] }}</td>
                <td>{{ $s->sifatsurat['namesifat'] }}</td>
                <td>{{ $s->user->username }}</td>
                <td>{{ $s->kepada_id['username'] }}</td>
                <td>{{ $s->status }}</td>
                <td>
                    @isset($s->disposisi)
                    {{ $s->disposisi['disposisi_oleh'] }}
                    @endisset
                </td>
                <td>{{ $s->created_at->format('m-d-y') }}</td>
            </tr>
            @endforeach
            </table>
        </div>

    </body>
</html>