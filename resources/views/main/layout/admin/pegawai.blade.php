@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex">
                <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Buat NIP
                </button>
    
                <a class="btn btn-warning" href="/kelolaakun"><i class="bi bi-caret-left-fill"></i> Kembali</a>
                
            </div>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="60%" cellspacing="0">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">(NIP)</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Tgl Lahir</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($nips as $nip)
                    <tbody>
                        <tr>
                        <td><b>{{ $loop->iteration }}</b></td>
                                <td>{{ $nip['nip'] }}</td>
                                <td>{{ $nip['nama'] }}</td>
                                <td>{{ $nip['jabatan'] }}</td>
                                <td>{{ $nip['alamat'] }}</td>
                                <td>{{ $nip['telepon'] }}</td>
                                <td>{{ $nip['tgl'] }}</td>
                        <td>
                            <a href="/kelolaakun/nip{{ $nip['id'] }}" class="btn btn-warning d-flex">Edit</a>

                            <form action="/kelolaakun/nip{{ $nip['id'] }}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger mt-2" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')">Hapus</button>
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>        
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
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
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        
        <button type="submit" class="btn btn-success"><i class="bi bi-person-add"></i> Save NIP</button>
    </form>
        
        </div>
    </div>
    </div>
</div>

@endsection