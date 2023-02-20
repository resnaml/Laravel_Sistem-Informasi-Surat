@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
        <h2>Form Sifat Surat</h2>
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
            <a class="btn btn-success mb-4 mt-4" href="/dashboard/sifatsurat/create">Tambah Sifat Baru</a>    
        </div>
        <ul class="list-group list-group-flush">
            <table class="table table-bordered table-striped table-sm table-primary">
                <thead>
                    <tr>
                    <th scope="col">Surat Sifat</th>
                    <th scope="col">Opsi</th>
                    </tr>
                <tbody>
                    @foreach ($sifat as $s)
                    <tr>
                        <td>{{ $s->namesifat }}</td>
                        <td>
                        <form action="/dashboard/sifatsurat/{{ $s->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i> Hapus</i></button>
                        </form>
                        </td>
            @endforeach
        </ul>
    </div>

    @endsection