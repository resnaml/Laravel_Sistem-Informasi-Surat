@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
    <h2>Daftar Pegawai BP3MI</h2>
</div>

    <div class="border-bottom border-dark mb-3">
        <a class="btn btn-warning mb-2" href="/dashboard/kelolaakun"><i class="bi bi-caret-left-fill"></i> Kembali</a>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="d-flex">

        <div class="card col-7 justify-content-start mb-4 border text-center" style="width: 25rem;">
    
            <div class="justify-content-start mt-2">
                <h4>Masukan Data Pegawai</h4>
                <form method="post" action="/dashboard/kelolaakun/nip">
                    @csrf
                    <div class="container mt-3 col-7">
    
                        <div class="container">
                            <label for="No induk" class="mb-2"><b>No Induk Pegawai</b></label>
                            <input type="number" class="text-center form-control @error('nip_kode') is-invalid @enderror" name="nip_kode" required value="{{ old('nip_kode') }}">
                            @error('nip_kode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="container">
                            <label class="mb-2 mt-2"><b>Nama Pegawai</b></label>
                            <input type="text" class="text-center form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" required value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="container">
                            <label class="mb-2 mt-2"><b>Jabatan Pegawai</b></label>
                            <input type="text" class="text-center form-control @error('jabatan') is-invalid @enderror" name="jabatan" required value="{{ old('jabatan') }}">
                            @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
    
                        <div class="container">
                            <label for="alamat" class="mb-2 mt-2"><b>Alamat Pegawai</b></label>
                            <textarea class="form-control" value="{{ old('alamat') }}" name="alamat" cols="4" rows="4"></textarea>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="container">
                            <label class="mb-2 mt-2"><b>No Telpon Pegawai</b></label>
                            <input type="number" class="text-center form-control @error('telepon') is-invalid @enderror" name="telepon" required value="{{ old('telepon') }}">
                            @error('telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="container">
                            <label class="mb-2 mt-2"><b>Tgl Lahir Pegawai</b></label>
                            <input type="date" class="text-center form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" required value="{{ old('tgl_lahir') }}">
                            @error('tgl_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                    </div>
    
                    <button type="submit" class="btn btn-success mb-3 mt-3"><i class="bi bi-person-add"></i> Tambah NIP</button>
                </form>
    
            </div>
            
        </div>


        <div class="justify-content-end col-7 p-3 text-center">
    
                <h4 class="mt-2">Daftar Pegawai</h4>
            
                <table class="table table-striped table-sm table-bordered    table-primary">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telpon</th>
                        <th scope="col">Tahun</th>
                        <th scope="col"></th>
                        </tr>
                    <tbody>
                        @foreach ($nips as $nip)
                        <tr>
                            <td><b>{{ $loop->iteration }}</b></td>
                            <td>{{ $nip->nip_kode }}</td>
                            <td>{{ $nip->nama_lengkap }}</td>
                            <td>{{ $nip->jabatan }}</td>
                            <td>{{ $nip->alamat }}</td>
                            <td>{{ $nip->telepon }}</td>
                            <td>{{ $nip->tgl_lahir }}</td>
                            <td>
                                <form action="#" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                                </form>
                            </td>
                        </tr>
                @endforeach
            
    </div>

    </div>


@endsection