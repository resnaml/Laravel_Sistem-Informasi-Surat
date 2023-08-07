@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex pt-3 pb-2 mt-4 mb-4 border-bottom">

    </div>

    <div class="card col-lg-4 container-fluid text-center border">
        <div class="container">
            <h4 class="mt-3 mb-2">Form Kode Surat</h4>    
        </div>

            <div class="mt-3 border-top">
            <form action="/jenissurat/create" method="POST">
                @csrf
                        <div class="container mb-2 col-7">
                        <label for="kodesurat" class="mb-2"><b>Kode Surat</b></label>
                        <input type="text" class="text-center form-control @error('kodesurat') is-invalid @enderror" name="kodesurat" required>
                            @error('kodesurat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="container col-10 mb-2">
                        <label for="namejenis" class="mb-2"><b> Jenis Surat</b></label>
                        <input type="text" class="text-center form-control @error('namejenis') is-invalid @enderror" id="namejenis" name="namejenis" required>
                            @error('namejenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 mt-3">
                            <label for="keterangan" class="hidden"><b>Keterangan Jenis Surat</b></label>
                            <textarea class="form-control mt-2"  name="keterangan">
                            </textarea>
                        </div>

                        <div class="mt-3 mb-3">
                            <button type="submit" class="btn btn-primary me-2"><i class="bi bi-plus-square"></i> Buat </button>
                            <a class="btn btn-warning" href="/jenissurat"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                        </div>
            </form>
        </div>
    </div>

@endsection