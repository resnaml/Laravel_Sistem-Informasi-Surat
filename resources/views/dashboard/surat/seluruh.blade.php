@extends('dashboard.layouts.main')

@section('container')
    <div class="border-bottom border-dark d-flex align-items-center pt-3 pb-2 mb-2">
        <h2>Daftar Seluruh Surat BP3MI</h2>
    </div>

    @if(session()->has('danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
    @endif

    <div class="d-flex border-bottom border-dark">
        <form action="/seluruhsurat" role="search">
            <div class="d-flex btn">
                <input class="d-flex mb-3 form-control me-3" name="search" type="search">
            <button class="d-flex btn mb-3 btn-outline-success" type="submit">Search</button>
            </div>
        </form>

        <div class="row mt-2 m-1">
                    <div class="col">
                        <input type="date" name="tglawal" id="tglawal" class="form-control">
                        <label class="d-flex" for="Tgl Surat dari"><b>-</b></label>
                    </div>
                    <div class="col">
                        <i class="bi bi-chevron-double-right" style="font-size: 1.5rem;"></i>
                    </div>
                    <div class="col">
                    <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                    <label class="d-flex" for="sampai Tgl Surat"><b>--</b></label>
                    </div>
        </div>

        <div class="row2">
            <a class="d-flex btn btn-outline-success me-3 mt-2" onclick="this.href='/seluruhsurat/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"><i class="bi bi-printer"> Cari data</i></a>
        </div>
        <div class="row2">
            <a class="d-flex btn btn-outline-primary mt-2" href="/seluruhsurat/cetakseluruh"><i class="bi bi-printer"> Print Seluruh Data</i></a>
        </div>
    </div>
    

    <div class="table-responsive text-center d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1">
        <table class="table table-striped table-bordered mb-3">
        <thead class="table table-primary table-striped-columns">
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
                <th scope="col"></th>
            </tr>
        </thead>

                <tbody>
                    <tr>
                    @foreach ($surats as $surat)
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
                            <form action="/seluruhsurat{{ $surat->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                            </form>
                    </td>
                    </tr>
                </tbody>

                @endforeach
        </table>

    </div>

@endsection