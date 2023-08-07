@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex pt-3 pb-2 border-bottom border-dark">
        <h2>Daftar User</h2>    
    </div>

    <div class="d-flex border-bottom border-dark">
        <div class="col-3 mb-2 mt-3 me-2">
            <form action="/kelolaakun">
            <div class="d-flex">
                <input class="form-control me-3" name="search" type="search" placeholder="Cari User...">

                <button class="btn btn-outline-primary me-2" type="submit">Search</button>
            </div>
            </form>
        </div>
        <div class="mb-1 mt-2">
            <a class="btn btn-primary mt-2 mb-2" href="/kelolaakun/nip"><i class="bi bi-people-fill"></i></i> Daftar Pegawai</a>
        </div>
    </div>

    @if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" data-bs-dismiss="alert" ></button>
    </div>
    @endif
    
    @if(session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" data-bs-dismiss="alert" ></button>
    </div>
    @endif

        <div class="table text-center mt-3">
            <table class="table table-primary table-sm">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col">Tgl Lahir</th>
                <th scope="col"></th>
                </tr>
            </thead>
            
            @foreach ($user as $akun)
            <tbody class="table-light">
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td scope="col">{{ $akun->username }}</td>
                <td scope="col">{{ $akun->email }}</td>
                <td scope="col">{{ $akun->nip }}</td>
                
                @isset($akun->nips_id)
                    <td scope="col">{{ $akun->nips_id['nama_lengkap'] }}</td>
                    <td scope="col">{{ $akun->nips_id['jabatan'] }}</td>
                    <td scope="col">{{ $akun->nips_id['alamat'] }}</td>
                    <td scope="col">{{ $akun->nips_id['telepon'] }}</td>
                    <td scope="col">{{ $akun->nips_id['tgl_lahir'] }}</td>
                @endisset
                
                <td scope="col">
                    <a href="/kelolaakun/{{ $akun->id }}" class="btn btn-warning m-lg-1"><i class="bi bi-tools"></i></a>
                    <form action="/kelolaakun/{{ $akun->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                    </form>
                </td>
                </tr>
            </tbody>
            @endforeach
        </div>
    
@endsection