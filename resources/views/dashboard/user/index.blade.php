@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
        <h2>Daftar User Staff Bp3mi</h2>    
    </div>


    <div class="d-flex pt-1 p-3 mb-2 border-bottom border-dark">
        <form action="submit">
            <input class="form-control" name="search" type="search" placeholder="Cari User..." value="">
        </form>
        <button class="btn btn-outline-primary me-2" type="submit">Search</button>
    </div>

    <a class="btn btn-primary mb-2" href="/dashboard/kelolaakun/nip"><i class="bi bi-people-fill"></i></i> Daftar Pegawai</a>

    @if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

        <div class="table-responsive table-bordered text-center">
            <table class="table table-dark table-sm">
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
                    <a href="/dashboard/kelolaakun/{{ $akun->id }}/edit" class="btn btn-warning m-lg-1"><i class="bi bi-tools"></i></a>
                    <form action="/dashboard/kelolaakun/{{ $akun->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                    </form>
                </td>
                
            </tbody>
            @endforeach
            </table>
        </div>
    
@endsection