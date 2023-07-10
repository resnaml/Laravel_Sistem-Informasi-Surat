@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
        <h2>Surat Keluar oleh : <span class="text-uppercase text-success">{{ auth()->user()->username }}</span></h2>
    </div>
    
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if(session()->has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ session('danger') }}
    </div>
    @endif

    <div class="d-flex mb-0">
        <a class="d-flex btn btn-primary me-3 mb-3 border-bottom" href="/dashboard/suratkeluar/create"><i class="bi bi-envelope-plus"> Buat Surat</i></a>

        <a class="d-flex btn btn-success me-3 mb-3 border-bottom" href="/dashboard/suratkeluarcetak"><i class="bi bi-printer"> Cetak Data</i></a>
    </div>
    
    <h4 class="border-top border-dark">Daftar Surat</h4>
    <div class="d-flex table-responsive justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1">
        <table class="table table-striped table-sm table-bordered text-center">
        <thead class="table table-primary">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Surat</th>
            <th scope="col">Tgl Surat Keluar</th>
            <th scope="col">Tujuan Surat</th>
            <th scope="col">Pembuat Surat</th>
            <th scope="col">Proses Surat</th>
            <th scope="col"> </th>
            </tr>
        <tbody>
            @foreach ($suratkeluar as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->full_number }}</td>
                <td>{{ $surat->tgl_surat_keluar }}</td>
                <td>{{ $surat->kepada_id['username'] }}</td>
                <td>{{ $surat->user->username }}</td>
                <td>{{ $surat->status }}</td>
                <td>
                    
                    @if ($surat->status == 'Ditolak')
                    <a href="/dashboard/suratkeluar/{{ $surat->id }}" class="btn btn-info m-lg-1"><i class="bi bi-eye"></i></a>
                    
                    @endif

                    {{-- @if ($surat->print_surat == true)
                    <a href="/dashboard/suratkeluar/{{ $surat->id }}" class="btn btn-info m-lg-1"><i class="bi bi-eye"></i></a>
                    
                    <form action="/dashboard/suratkeluar/{{ $surat->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                    </form> --}}
                    
                    {{-- @else --}}
                    
                    <form action="/dashboard/suratkeluar/{{ $surat->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                    </form>
                    {{-- @endif --}}
                
                </td>
            </tr>
            @endforeach
        </tbody>
    </div>

    @endsection