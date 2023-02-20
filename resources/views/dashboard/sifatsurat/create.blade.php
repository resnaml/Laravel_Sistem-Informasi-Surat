@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h2>Sifat Surat Create</h2>
    </div>

    <div class="card col-7 container-fluid text-center" style="width: 32rem;">
        <div class="container">
            <h4 class="mt-3 mb-3 border-bottom border-4">Form Sifat Surat</h4>    
        </div>
        
            <form action="/dashboard/sifatsurat/create" method="post">
                    @csrf
                    <div class="container-fluid mb-5 mt-1 col-lg-7">
                        <label for="namesifat" class="visually-hiddensd mb-2 "><b> Sifat Surat</b></label>
                        <input type="text" class="text-center form-control @error('namesifat') is-invalid @enderror" name="namesifat" required value="{{ old('namesifat') }}">
                        @error('namesifat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2"><i class="bi bi-plus-square"></i> Buat Sifat Surat</button>
            
                            <a class="btn btn-warning" href="/dashboard/sifatsurat"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                        </div>

                    </form>
                            
        </div>


@endsection