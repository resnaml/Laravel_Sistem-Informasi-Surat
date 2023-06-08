@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
    <h2>Daftar NIP BP3MI</h2>
</div>

    <div class="border-bottom border-dark mb-3">
        <a class="btn btn-warning mb-2" href="/dashboard/kelolaakun"><i class="bi bi-caret-left-fill"></i> Kembali</a>
    </div>

    <div class="card col-10 container-fluid border text-center" style="width: 34rem;">

        <div class="container">

            <form method="post" action="/dashboard/kelolaakun/nip">
                @csrf
                <div class="container mt-3 col-7">
                    <label for="No induk" class="mb-2"><b>No Induk Pegawai</b></label>
                    <input type="number" class="text-center form-control @error('nip_kode') is-invalid @enderror" name="nip_kode" required value="{{ old('nip_kode') }}">
                    @error('nip_kode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success mb-3 mt-3"><i class="bi bi-person-add"></i> Tambah NIP</button>
            </form>

        </div>

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <ul class="list-group list-group-flush">
            <table class="table table-striped table-sm table-bordered    table-primary">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIP</th>
                    {{-- <th scope="col">Keterangan</th> --}}
                    <th scope="col"></th>
                    </tr>
                <tbody>
                    @foreach ($nips as $nip)
                    <tr>
                        <td><b>{{ $loop->iteration }}</b></td>
                        <td>{{ $nip->nip_kode }}</td>
                        <td>
                            <form action="#" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                            </form>
                        </td>
                        
            @endforeach
        </ul>
    </div>

@endsection