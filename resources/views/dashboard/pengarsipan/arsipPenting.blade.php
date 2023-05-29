@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
        <h2>Daftar Arsip Penting</h1>
    </div>

    <div class="d-flex mb-0 border-bottom border-dark">

        <a class="d-flex btn btn-primary me-3 mb-3 border-bottom" href="/dashboard/pengarsipan"><i class="bi bi-caret-left"> Kembali</i></a>

        <a class="d-flex btn btn-success me-3 mb-3 border-bottom" href="/dashboard/suratkeluarcetak" target="_blank"><i class="bi bi-printer"> Cetak Data</i></a>

        {{-- <form class="d-flex col-lg-3 pt-1 pb-3" role="search" action="">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
    </div>
    
    <div class="table-responsive d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1">
        <table class="table table-striped table-sm table-bordered text-center">
        <thead class="table table-primary">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Arsip</th>
            <th scope="col">Kategori</th>
            <th scope="col">Judul</th>
            <th scope="col">Tgl Arsip</th>
            <th scope="col">Author</th>
            <th scope="col">Nama file</th>
            <th scope="col"> </th>
            </tr>
        <tbody>
            @foreach ($arsipPenting as $arsip)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $arsip->kategori['kode_arsip'] ?? '' }}-{{ str_pad($arsip->kodearsip, 4, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $arsip->kategori['arsip_kategori'] }}</td>
                <td>{{ $arsip->judul }}</td>
                <td>{{ $arsip->created_at->format('m/d/y') }}</td>
                <td>{{ $arsip->author }}</td>
                <td>{{ $arsip->file_arsip }}</td>
                <td>
                    <a href="/dashboard/pengarsipan/{{ $arsip->id }}" class="btn btn-info m-lg-1"><i class="bi bi-eye"></i></a>
                    
                    <form action="/dashboard/pengarsipan/{{ $arsip->id }}" method="post" class="d-inline">
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