@extends('dashboard.layouts.main')

@section('container')
    <div class="border-bottom border-dark d-flex  pt-3 pb-2 mb-2">
        <h2>Halaman Persetujuan Surat</h2>
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
        <div class="table-responsive text-center mt-3">
            <table class="table table-striped table-bordered">
            <thead class="table table-primary table-striped-columns">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Surat</th>
                <th scope="col">Pembuat Surat</th>
                <th scope="col"><i class="bi bi-clock-fill"></i></th>
                <th scope="col"></th>
                </tr>
            </thead>
            @foreach ($suratmasuk as $surat)
                <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat->full_number }}</td>
                    <td>{{ $surat->user->username }}</td>
                    <td>{{ $surat->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="/suratmasuk/{{ $surat->full_number }}" class="btn btn-info m-lg-1"><i class="bi bi-clipboard-check" style="font-size: 1.2rem;"></i></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
            </table>
        </div>
    </div>
    @endif

@endsection