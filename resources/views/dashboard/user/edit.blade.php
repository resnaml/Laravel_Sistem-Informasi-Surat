@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
        <h1 class="h2">Halaman Edit Akun</h1>
    </div>

    <div class="card mt-3 container-fluid col-4 border mb-4">
        <div class="card-header text-center">
        <h3>Form Edit User</h3>
        </div>
        <div class="card-body text-center">
            <table class="table">
                <tbody>
                    <form method="post" action="/kelolaakun/{{ $akun->id }}" class="mb-5">
                        @method('put')
                        @csrf
                        
                        <div class="mb-3">
                            <label for="username" class="form-label"><b>Username</b></label>
                            <input class="form-control text-center" disabled value="{{ old('username', $akun->username) }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><b>email</b></label>
                            <input class="form-control text-center" disabled value="{{ old('email', $akun->email) }}">
                        </div>

                        <div class="mb-3">
                            <label for="nip" class="form-label"><b>nip</b></label>
                            <input disabled class="form-control text-center" value="{{ old('nip', $akun->nip) }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label"><b>Ubah Password</b></label>
                            <input type="password" class="form-control text-center @error('password') is-invalid @enderror" name="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                        </div>

                        <div class="mb-3">
                            <label for="User" class="form-label"><b>User & Nip</b></label>
                            @if ($akun->nip_id == 0)
                            <select class="form-select mb-3" name="nip_id">
                                <option selected disabled>-- Pilih User --</option>
                                @foreach ($nips as $nips)
                                <option value="{{ $nips->id }}">{{ $nips->nama_lengkap }}</option>
                                @endforeach
                            </select>
                            @else
                            <input readonly class="form-control text-center" value="{{ old('nip', $akun->nips_id['nama_lengkap']) }}">
                            @endif
                        </div>

                        <div class="mb-4 mt-3 bg-white">
                            
                            @if ($akun->is_admin == 0)
                            <div class="form-control">
                                <input class="form-check-input" type="checkbox" value="1" name="is_admin">
                                <label class="form-check-label text-bold">
                                Jadikan Admin ?
                                </label>
                            </div>
                            @else
                            <h5>Akun Sudah Admin</h5>
                            @endif
                        </div>

                        <div class="mb-4 mt-3 bg-white">
                            
                            @if ($akun->is_kepala == 0)
                            <div class="form-control">
                                <input class="form-check-input" type="checkbox" value="1" name="is_kepala">
                                <label class="form-check-label text-bold">
                                Jadikan Kepala ?
                                </label>
                            </div>
                            @else
                            <h5>Akun Sudah Kepala</h5>
                            @endif
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary m-right-3 me-1"><i class="bi bi-plus-square"></i> Update</button>
                            <a class="btn btn-warning" href="/kelolaakun"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                        </div>
                    </form>
                </tbody>
            </table>
        </div>
    </div>

@endsection