@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-4 mt-5">

            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session()->has('LoginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('LoginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <style>
                div.logo{
                    width: 100px;
            height: 100px;
            position: absolute;
            top:80px;
            bottom: 50;
            left: 0;
            right: 20px;
            margin: auto;
                }
            </style>
            
            <div class="logo" style="">
                <img src="/img/logo.png" width="120" height="120">
            </div>

            <main class="form-signin mt-5">
                <form action="/login" method="post">
                    @csrf
                <div class="form-floating">
                    <input  name="username" class="form-control @error('username') is-invalid @enderror" placeholder="name@example.com" autofocus required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <label for="Password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                <small class="d-block text-center mt-3"> Belum Memiliki Akun
                    <a href="/register">Daftar Dahulu?</a>
                </small>
                </form>
            </main>

        </div>
    </div>

@endsection