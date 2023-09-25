<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    
    <style>
        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
            font-size: 50px !important;
            color: black;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed; 
            bottom: -60px; 
            left: 0px; 
            right: 0px;
            height: 30px; 
            font-size: 30px !important;
            color: black;
            text-align: center;
            line-height: 35px;

        }

        .table1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
            
            
        }
        
        .table1, th, td {
            border: 1px solid #999;
            padding: 3px 5px;
            width: 100%;
            border: 1px solid #543535;
        }
        </style>
    
</head>

<body>
    <header>
        <h5>Laporan Data Seluruh Surat BP3MI Bandung</h5>
    </header>

    <footer>
        <h6>BP3MI Bandung - JawaBarat</h6>
    </footer>

    <main>
        <body style="padding-top: 15px;">
                <table class="table1">
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
                    <td>{{ date('d/m/Y', strtotime($surat->tgl_surat_keluar)) }}</td>
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
                    <td>{{ $surat->created_at->format('d//m/Y') }}</td>
                </tr>
                @endforeach
                </table>
        </body>
        
    </main>

        <script type="text/javascript">
            window.print();
        </script>
    
    </body>
    
</html>