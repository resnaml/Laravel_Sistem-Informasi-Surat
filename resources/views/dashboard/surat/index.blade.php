@extends('dashboard.layouts.main')

@section('container')
    <div class="border-bottom border-dark d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Daftar Surat Masuk</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-flex">

        @if($jumlah == 0)

    @else
    <a class="btn btn-danger">Segera Disposisi Surat : {{ $jumlah }}</a>
    @endif
    </div>
    
    @if($jumlah == 0)

    <h1>Belum ada Pengajuan</h1>

    @else 

    <div class="table-responsive text-center mt-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-top border-dark">
        <table class="table table-striped table-bordered mb-3">
        <thead class="table table-primary table-striped-columns">
            <tr>
            <th scope="col">Kode Surat</th>
            <th scope="col">Tgl Surat Dibuat</th>
            <th scope="col">Tujuan Surat</th>
            <th scope="col">Pembuat Surat</th>
            <th scope="col">Status Surat</th>
            <th scope="col"><i class="bi bi-clock-fill"></i></th>
            <th scope="col"></th>
            <tbody>

                @foreach ($suratmasuk as $surat)
                <td>{{ $surat->jenissurat['kodesurat'] ?? '' }}-{{ str_pad($surat->no_surat_keluar, 4, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $surat->tgl_surat_keluar }}</td>
                <td>{{ $surat->kepada_id['name'] }}</td>
                <td>{{ $surat->user->name }}</td>
                <td>{{ $surat->status }}</td>
                <td>{{ $surat->created_at->diffForHumans() }}</td>
                <td>
                    <a href="/dashboard/surat/{{ $surat->id }}" class="btn btn-info m-lg-1"><i class="bi bi-clipboard-check" style="font-size: 1.2rem;"></i></a>
                </td>
            </tr>
            
            @endforeach
            </tbody>
        </div>
        @endif

@endsection