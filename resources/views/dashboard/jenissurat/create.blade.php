@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h3>Jenis Surat Create</h3>
    </div>

    <div class="card col-lg-4 container-fluid text-center border">
        <div class="container">
            <h4 class="card-header mt-2 mb-2 border-bottom border-1">Form Kode Surat</h4>    
        </div>

            <form action="/jenissurat/create" method="POST">
                @csrf
                        <div class="mb-2">
                        <label for="kodesurat" class="visually-hiddensd mb-2"><b>Kode Surat</b></label>
                        <input type="text" class="text-center form-control @error('kodesurat') is-invalid @enderror" name="kodesurat" required value="{{ old('kodesurat') }}">
                        @error('kodesurat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>

                            <div class="mb-2">
                            <label for="namejenis" class="visually-hiddensd mb-2 "><b> Jenis Surat</b></label>
                            <input type="text" class="text-center form-control @error('namejenis') is-invalid @enderror" id="namejenis" name="namejenis" required value="{{ old('namejenis') }}">
                            @error('namejenis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                        
                        <div class="mb-3 mt-3">
                            <label for="keterangan" class="hidden"><b>Keterangan Jenis Surat</b></label>
                            <textarea class="form-control mt-2 @error('keterangan') is-invalid @enderror"  name="keterangan">
                            </textarea>
                        </div>

                        <div class="mt-2 mb-4">
                            <button type="submit" class="btn btn-primary me-2"><i class="bi bi-plus-square"></i> Buat </button>
                            <a class="btn btn-warning" href="/jenissurat"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                        </div>
            </form>
    </div>


@endsection