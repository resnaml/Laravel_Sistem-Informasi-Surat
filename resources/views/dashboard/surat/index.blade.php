@extends('dashboard.layouts.main')

@section('container')
    <div class="border-bottom border-dark d-flex  pt-3 pb-2 mb-2">
        <h2>Halaman Surat Masuk</h2>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($jumlah == 0)
        
    <h2 class="mt-2">
            <marquee behavior="2" direction="3">
                Belum Pengajuan Surat
            </marquee> 
    </h2>
    @else
    
    <div>

        <h2 class="text-center">Menunggu Persetujuan</h2>
        <div class="table-responsive text-center mb-1">
            <table class="table table-striped table-bordered mb-3">
            <thead class="table table-primary table-striped-columns">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Surat</th>
                <th scope="col">Tgl Surat Dibuat</th>
                <th scope="col">Tujuan Surat</th>
                <th scope="col">Pembuat Surat</th>
                <th scope="col">Status Surat</th>
                <th scope="col"><i class="bi bi-clock-fill"></i></th>
                <th scope="col"></th>
                <tbody>
                    @foreach ($suratmasuk as $surat)

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat->jenissurat['kodesurat'] ?? '' }}-{{ str_pad($surat->no_surat_keluar, 4, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $surat->tgl_surat_keluar }}</td>
                    <td>{{ $surat->kepada_id['username'] }}</td>
                    <td>{{ $surat->user->username }}</td>
                    <td>{{ $surat->status }}</td>
                    <td>{{ $surat->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="/suratmasuk/{{ $surat->full_number }}" class="btn btn-info m-lg-1"><i class="bi bi-clipboard-check" style="font-size: 1.2rem;"></i></a>
                    </td>
                </tr>
                
                @endforeach
                </tbody>
        </div>
    </div>
    @endif

@endsection