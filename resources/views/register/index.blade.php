@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-4">

            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <main class="container form-registration w-100 m-auto">
                <h1 class="h3 lg-4 mb-4 fw-normal text-center">Silahkan Daftar</h1>
                <form action="/register" method="post">
                    @csrf
                <div class="form-floating">
                        <input type="number" name="nip" class="form-control rounded mb-1 @error('nip') is-invalid @enderror" placeholder="NIP" required value="{{ old('nip') }}">
                        <label for="nip">NIP</label>
                        @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>

                <div class="form-floating">
                    <input type="name" name="name" class="form-control rounded @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                    <label for="name">Nama</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                
                <div class="form-floating mt-2 mb-2">
                    <div class="col-12">
                        <select  required class="form-control text-center" name="status" id="status" aria-placeholder="Jabatan">
                            @foreach(["Proses" => "Proses"] as $status => $status1)
                            {{-- <option value="{{ $status }}" {{ old("status", $surat->status) == $status ? "selected" : "" }} >{{ $status1 }}</option> --}}
                            @foreach(["Kepala" => "Kepala"] as $status => $status2)
                            <option id="status2" value="{{ $status2 }}">{{ $status2 }}</option>
                            @foreach(["Karyawan" => "Karyawan"] as $status => $status3)
                            <option id="status3" value="{{ $status3 }}">{{ $status3 }}</option>
                            @endforeach
                            @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-floating">
                    <input type="name" name="jabatan" class="form-control rounded mb-1 @error('jabatan') is-invalid @enderror" placeholder="Jabatan" required value="{{ old('jabatan') }}">
                    <label for="jabatan">Jabatan</label>
                    @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="text" name="username" class="form-control rounded mb-1 @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control rounded mb-1 @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                
                
                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Daftar Akun</button>
                <small class="d-block text-center mt-3"> Sudah Pernah Daftar
                    <a href="/login">Login</a>
                </small>
                </form>
            </main>

        </div>
    </div>

@endsection