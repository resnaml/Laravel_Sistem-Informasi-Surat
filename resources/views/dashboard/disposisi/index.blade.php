@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex pt-3 pb-2 mb-3 border-bottom border-dark">
    <h2>Halaman Disposisi</span></h2>
    </div> 

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    

    @if ($jumlah == 0)
        <marquee class="h4" behavior="20" direction="20">Belum ada Data</marquee>
    @else

    <div class="container-fluid">
        
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                    <thead class="table table-primary">
                    <th scope="col">No</th>
                    <th scope="col">Kode Surat</th>
                    {{-- <th scope="col"><i class="bi bi-clock-fill"></i></th> --}}
                    <th></th>
                </thead>
            </tr>
            </thead>
            @foreach ($suratkeluar as $surat)
            <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat->full_number }}</td>
                    {{-- <td>{{ $surat->created_at->diffForHumans() }} </td> --}}
                <td>
                    <a href="/diposisikepala/{{ $surat->id }}" class="btn btn-info m-lg-1"><i class="bi bi-clipboard2-check"></i></a>
                    
                </td>
                </tr>
            </tbody>
            @endforeach
        </table>

    </div>

    @endif

@endsection