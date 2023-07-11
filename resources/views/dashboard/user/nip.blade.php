@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
    <h2>Daftar Pegawai BP3MI</h2>
</div>

    <div class="border-bottom border-dark mb-3">
        <a class="btn btn-warning mb-2" href="/kelolaakun"><i class="bi bi-caret-left-fill"></i> Kembali</a>
        
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-person-add"></i> Buat NIP
        </button>
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

    <div class="container-fluid">
            <div class="justify-content-end col-13 text-center">
                <table class="table table-striped table-sm table-bordered">
                    <thead class="table-info">
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
                    </thead>
                    <tbody class="table-group-divider">
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
                    </tbody>
                </table>
        </div>
    </div>

        <!-- Button trigger modal -->
    
    
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Buat Data Pegawai</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="col-12 justify-content-start text-center">
                    <div class="mt-2">
                        <form method="POST" action="/kelolaakun/nip">
                            @csrf
                            <div class="container col-9">
            
                                <div>
                                    <label for="No induk" class="mb-2 fw-bold">No Induk Pegawai</label>
                                    <input type="number" class="text-center form-control @error('nip_kode') is-invalid @enderror" name="nip_kode" required value="{{ old('nip_kode') }}">
                                    @error('nip_kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
            
                                <div>
                                    <label class="mb-2 mt-2 fw-bold">Nama</label>
                                    <input type="text" class="text-center form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" required value="{{ old('nama_lengkap') }}">
                                    @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
            
                                <div>
                                    <label class="mb-2 mt-2 fw-bold">Jabatan</label>
                                    <input type="text" class="text-center form-control @error('jabatan') is-invalid @enderror" name="jabatan" required value="{{ old('jabatan') }}">
                                    @error('jabatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
            
                                <div>
                                    <label for="alamat" class="mb-2 mt-2 fw-bold">Alamat</label>
                                    <textarea class="form-control" value="{{ old('alamat') }}" name="alamat" cols="4" rows="4" required></textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
            
                                <div>
                                    <label class="mb-2 mt-2 fw-bold">No Telpon</label>
                                    <input type="number" class="text-center form-control @error('telepon') is-invalid @enderror" name="telepon" required value="{{ old('telepon') }}">
                                    @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
            
                                <div class="container col-7">
                                    <label class="mb-2 mt-2 fw-bold">Tgl Lahir</label>
                                    <input type="date" class="text-center form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" required value="{{ old('tgl_lahir') }}">
                                    @error('tgl_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                            </div>
                            
                        </div>
                </div>
            </div>
            
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
            <button type="submit" class="btn btn-success"><i class="bi bi-person-add"></i> Save NIP</button>
        </form>
            
            </div>
        </div>
        </div>
    </div>

@endsection