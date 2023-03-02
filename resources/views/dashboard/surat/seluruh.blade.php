@extends('dashboard.layouts.main')

@section('container')
    <div class="border-bottom border-dark d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2">
        <h1 class="h2">Daftar Seluruh Surat BP3MI</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-flex border-bottom border-dark">
        <form action="" method="POST" role="search">
        <div class="d-flex btn">
                @csrf
            <input class="d-flex mb-3 form-control me-3" type="search" placeholder="Search" aria-label="Search">
        <button class="d-flex btn mb-3 btn-outline-success" type="submit">Search</button>
    </form>
    </div>
        
            <div class="row mt-2 m-1">
                    <div class="col">
                        <input type="date" name="tglawal" id="tglawal" class="form-control">
                        <label class="d-flex" for="Tgl Surat dari"><b>Tgl Surat dari </b></label>
                    </div>
                    <div class="col">
                        <i class="bi bi-chevron-double-right" style="font-size: 1.5rem;"></i>
                    </div>
                    <div class="col">
                    <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                    <label class="d-flex" for="sampai Tgl Surat"><b>sampai Tgl Surat</b></label>
                    </div>
            </div>
            <div class="row2">
                <a target="_blank" class="d-flex btn btn-success me-3 mt-2" onclick="this.href='/dashboard/seluruhsurat/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"><i class="bi bi-printer"> Print Data</i></a>
            </div>
            <div class="row2">
                <a target="_blank" class="d-flex btn btn-primary mt-2" href="/dashboard/seluruhsurat/cetakseluruh"><i class="bi bi-printer"> Print Seluruh Data</i></a>
            </div>
    </div>

    <div class="d-flex mt-2">
        <div class="d-flex mt-1">
            <div class="d-flex">
                {{ $surats->links() }}
            </div>
        </div>
    </div>

    <div class="table-responsive text-center d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1">
        <table class="table table-striped table-bordered mb-3">
        <thead class="table table-primary table-striped-columns">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Surat</th>
            <th scope="col">Tgl Surat Untuk</th>
            <th scope="col">Jenis Surat</th>
            <th scope="col">Sifat Surat</th>
            <th scope="col">Pembuat Surat</th>
            <th scope="col">Tujuan Surat</th>
            <th scope="col">Status Surat</th>
            {{-- <th scope="col">Tgl Dibuat</th> --}}
            <th scope="col"></th>
            <tbody>
                @foreach ($surats as $surat)
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->jenissurat['kodesurat'] ?? '' }}-{{ str_pad($surat->no_surat_keluar, 4, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $surat->tgl_surat_keluar }}</td>
                <td>{{ $surat->jenissurat['namejenis'] }}</td>
                <td>{{ $surat->sifatsurat['namesifat'] }}</td>
                <td>{{ $surat->user->name }}</td>
                <td>{{ $surat->penerima_surat }}</td>
                <td>{{ $surat->status }}</td>
                {{-- <td>{{ $surat->created_at->format('m-d-y') }}</td> --}}
            <td>
                <a href="/dashboard/pengarsipan/create" class="btn btn-success m-lg-1"><i class="bi bi-safe"></i></a>
                    
                    <form action="/dashboard/suratkeluar/{{ $surat->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                    </form>
            </td>
                </tr>
            </tr>
            @endforeach
            </tbody>
        </div>

@endsection