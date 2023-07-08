@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h2>Sifat Surat Create</h2>
    </div>

    <div class="card col-5 border container-fluid text-center mb-2" style="width: 30rem;">
        <div class="container">
            <h4 class="mt-2 mb-3 border-bottom border-1">Form Sifat Surat</h4>    
        </div>
            <form action="/sifatsurat/create" method="POST">
                    @csrf
                    <div class="container-fluid mb-3 mt-1 col-lg-7">
                        <label for="namesifat" class="visually-hiddensd mb-2 "><b> Sifat Surat</b></label>
                        <input type="text" class="text-center form-control @error('namesifat') is-invalid @enderror" name="namesifat" required value="{{ old('namesifat') }}">
                        @error('namesifat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                        <div class="mt-2 mb-3">
                            <button type="submit" class="btn btn-primary me-2"><i class="bi bi-plus-square"></i> Buat Sifat</button>
                            <a class="btn btn-warning" href="/sifatsurat"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                        </div>
                    </form>
        </div>

@endsection