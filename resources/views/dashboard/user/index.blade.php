@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
        <h2>Daftar Akun Staff Bp2mi</h2>
        
    </div>
    <form class="d-flex col-lg-3 pt-1 pb-3 mb-2 border-bottom border-dark" role="search" action="">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

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
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Opsi</th>
                </tr>
            </thead>
            @foreach ($user as $akun)
            <tbody class="table-light">
                <td>{{ $loop->iteration }}</td>
                <td scope="col">{{ $akun->name }}</td>
                <td scope="col">{{ $akun->email }}</td>
                <td scope="col">{{ $akun->jabatan }}</td>
                <td scope="col">
                    <a href="/dashboard/kelolaakun/{{ $akun->id }}" class="btn btn-info m-lg-1"><i class="bi bi-eye"></i></a>
                    <a href="/dashboard/kelolaakun/{{ $akun->id }}/edit" class="btn btn-warning m-lg-1"><i class="bi bi-tools"></i></a>

                    <form action="/dashboard/kelolaakun/{{ $akun->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                    </form>
                    
                </td>
            </tbody>
            @endforeach
        </div>
        
                
    
@endsection