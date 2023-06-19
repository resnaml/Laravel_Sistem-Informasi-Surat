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

</head>

    <body>
        <h3 align="center">Laporan Data Seluruh Surat BP3MI Bandung</h3>
        <div class="form-group">
            <table class="static" align="center" rule="all" border="1px" style="width: 100%;">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Tgl Untuk</th>
                <th scope="col">Jenis</th>
                <th scope="col">Sifat</th>
                <th scope="col">Pembuat</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Status</th>
                <th scope="col">Disposisi</th>
                <th scope="col"><i class="bi bi-clock-fill"></i>Surat Dibuat</th>
            </tr>
            @foreach ($suratkeluar as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->full_number }}</td>
                <td>{{ $surat->tgl_surat_keluar }}</td>
                <td>{{ $surat->jenissurat['namejenis'] }}</td>
                <td>{{ $surat->sifatsurat['namesifat'] }}</td>
                <td>{{ $surat->user->username }}</td>
                <td>{{ $surat->kepada_id['username'] }}</td>
                <td>{{ $surat->status }}</td>
                <td>
                    @isset($surat->disposisi)
                    {{ $surat->disposisi['disposisi_oleh'] }}
                    @endisset
                </td>
                <td>{{ $surat->created_at->format('y-m-d') }}</td>
            </tr>
            @endforeach
            </table>
        </div>

        <script type="text/javascript">
            window.print();
        </script>
    
    </body>
    
</html>