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
                <div class="form-floating mb-2">
                        <input type="number" name="nip" class="form-control rounded  @error('nip') is-invalid @enderror" placeholder="NIP" required value="{{ old('nip') }}">
                        <label for="nip">NIP</label>
                        @error('nip')
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