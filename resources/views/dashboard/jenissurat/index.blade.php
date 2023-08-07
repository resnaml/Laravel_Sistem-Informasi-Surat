@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex pt-3 pb-2 mb-4 border-bottom border-dark">
        <h2>Halaman Jenis Surat</h1>
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
    
    <div class="card col-6 container-fluid border text-center">
        <div class="container">
            <a class="btn btn-success mb-3 mt-3" href="/jenissurat/create">Buat Kode Surat</a>    
        </div>
            <table class="table table-striped table-sm table-bordered table-primary">
                <thead>
                    <tr>
                    <th scope="col">Kode Surat</th>
                    <th scope="col">Nama Jenis Surat</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                @foreach ($jenissurat as $jenis)
                <tbody>
                    <tr>
                        <td>{{ $jenis->kodesurat }}</td>
                        <td>{{ $jenis->namejenis }}</td>
                        <td>{{ $jenis->keterangan }}</td>
                        <td>
                            <form action="/jenissurat/{{ $jenis->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus Jenis Surat !!!')"><i class="bi bi-trash"></i></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
    </div>

    @endsection