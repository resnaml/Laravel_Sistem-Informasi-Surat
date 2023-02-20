@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
        <h2>Form Jenis Surat</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="card col-10 container-fluid text-center" style="width: 34rem;">
        <div class="container">
            <a class="btn btn-success mb-3 mt-3" href="/dashboard/jenissurat/create">Buat Kode Surat</a>    
        </div>
        <ul class="list-group list-group-flush">
            <table class="table table-striped table-sm table-bordered    table-primary">
                <thead>
                    <tr>
                    <th scope="col">Kode Surat</th>
                    <th scope="col">Nama Jenis Surat</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Opsi</th>
                    </tr>
                <tbody>
                    @foreach ($jenissurat as $jenis)
                    <tr>
                        <td>{{ $jenis->kodesurat }}</td>
                        <td>{{ $jenis->namejenis }}</td>
                        <td>{{ $jenis->keterangan }}</td>
                        <td>
                            <form action="/dashboard/jenissurat/{{ $jenis->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                            </form>
                        </td>
                        
            @endforeach
        </ul>
    </div>

    @endsection