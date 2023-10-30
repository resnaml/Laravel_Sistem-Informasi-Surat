@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Seluruh Surat</h1>

    <div class="d-flex">
        <form action="/seluruhsurat" role="search">
            <div class="d-flex btn">
                <input class="d-flex mb-3 form-control me-3" name="search" type="search">
            <button class="d-flex btn mb-3 btn-outline-success" type="submit">Search</button>
            </div>
        </form>

        <div class="row mt-2">
                    <div class="col">
                        <input type="date" name="tglawal" id="tglawal" class="form-control">
                        <label class="d-flex" for="Tgl Surat dari"><span>Tgl surat</span></label>
                    </div>
                    
                    <div class="col">
                    <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                    <label class="d-flex" for="sampai Tgl Surat"><b>--</b></label>
                    </div>
        </div>

        <div class="row2">
            <a class="d-flex btn btn-success mr-3 mt-2" onclick="this.href='/seluruhsurat/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"><i class="bi bi-printer"> Cari data</i></a>
        </div>
        <div class="row2">
            <a class="d-flex btn btn-primary mt-2" href="/seluruhsurat/cetakseluruh"><i class="bi bi-printer"> Print Seluruh Data</i></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Surat</th>
                            <th scope="col">Tgl Surat</th>
                            <th scope="col">Jenis Surat</th>
                            <th scope="col">Sifat Surat</th>
                            <th scope="col">Pembuat Surat</th>
                            <th scope="col">Tujuan Surat</th>
                            <th scope="col">Status Surat</th>
                            <th scope="col">Disposisi</th>
                            <th scope="col">Tgl Pengajuan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($surats as $surat)
                    <tbody>
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
                            <td>
                                <a class="d-flex btn btn-success mb-2">Lihat</a>

                                    <form action="/seluruhsurat/{{ $surat->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="d-inline btn btn-danger" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')">Hapus</button>
                                    </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
@endsection