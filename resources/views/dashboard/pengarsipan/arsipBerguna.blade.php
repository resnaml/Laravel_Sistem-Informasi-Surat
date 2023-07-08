@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
        <h2>Daftar Arsip Berguna</h1>
    </div>

    <div class="d-flex mb-0 border-bottom border-dark">

        <a class="d-flex btn btn-primary me-3 mb-3 border-bottom" href="/pengarsipan"><i class="bi bi-caret-left"> Kembali</i></a>

        {{-- <a class="d-flex btn btn-success me-3 mb-3 border-bottom" href="/dashboard/suratkeluarcetak" target="_blank"><i class="bi bi-printer"> Cetak Data</i></a> --}}
    </div>
    
    <div class="table-responsive d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1">
        <table class="table table-striped table-sm table-bordered text-center">
        <thead class="table table-primary">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Arsip</th>
            <th scope="col">kategori</th>
            <th scope="col">Judul</th>
            <th scope="col">Tgl Arsip</th>
            <th scope="col"></th>
            <th scope="col"> </th>
            </tr>
        <tbody>
            @foreach ($arsipBerguna as $arsip)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $arsip->kategori['kode_arsip'] ?? '' }}-{{ str_pad($arsip->kodearsip, 4, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $arsip->kategori['arsip_kategori'] }}</td>
                <td>{{ $arsip->judul }}</td>
                <td>{{ $arsip->created_at->format('d-m-y') }}</td>
                <td>{{ $arsip->file_arsip }}</td>
                <td>
                <a href="{{ url('/pengarsipan/download/'.$arsip->id) }} " class="btn btn-success m-lg-1"><i class="bi bi-download"></i></a>
                    
                    <form action="/pengarsipan/{{ $arsip->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </div>

    @endsection