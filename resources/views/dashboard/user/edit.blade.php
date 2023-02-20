@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
        <h1 class="h2">Halaman edit</h1>
    </div>

    <div class="card mt-3 container-fluid col-5">
        <div class="card-header text-center">
        <h3>Form Edit User</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <form method="post" action="/dashboard/kelolaakun/{{ $akun->id }}/edit" class="mb-5">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label"><b>Nama</b></label>
                            <input type="text" class="form-control" id="name" disabled value="{{ old('name', $akun->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label"><b>Username</b></label>
                            <input type="text" class="form-control" id="username" disabled value="{{ old('username', $akun->username) }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><b>email</b></label>
                            <input type="text" class="form-control" id="email" disabled value="{{ old('email', $akun->email) }}">
                        </div>

                        <div class="mb-3">
                            <label for="jabatan" class="form-label"><b>jabatan</b></label>
                            <input type="text" name="jabatan" autofocus class="form-control" id="jabatan" value="{{ old('jabatan') }}">
                            @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 text-center">
                            <label for="tgl_lahir" class="form-label"><b>Tgl Lahir</b></label>
                            <div class="mb-3">
                                <i class="bi bi-calendar-week" style="font-size: 1.4rem; "> <input type="date" name="tgl_lahir" class="@error('tgl_lahir') is-invalid @enderror" required value="{{ old('tgl_lahir') }}"></i> 
                                @error('tgl_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            </div>
                        
                        <div class="mb-3">
                            <label for="alamat" class="form-label"><b>alamat</b></label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" required>
                        </div>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="mb-3">
                            <label for="telepon" class="form-label"><b>No telepon</b></label>
                            <input type="number" name="telepon" class="form-control" id="alamat" value="{{ old('telepon') }}" required>
                        </div>
                        @error('telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="col-lg-9 mt-4">
                            <button type="submit" class="btn btn-primary m-right-3 me-1"><i class="bi bi-plus-square"></i> Update akun</button>
                
                            <a class="btn btn-warning" href="/dashboard/kelolaakun"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                        </div>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
            


@endsection