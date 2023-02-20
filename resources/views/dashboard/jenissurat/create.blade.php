@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h4>Jenis Surat Create</h4>
    </div>

    <div class="card col-lg-4 container-fluid text-center">
        <div class="container">
            <h4 class="mt-3 mb-3 border-bottom border-2">Form Kode Surat</h4>    
        </div>
        
            <form action="/dashboard/jenissurat/create" method="POST">
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
                            <label for="keterangan" class="visually-hiddensd mb-2 "><b>Keterangan Kode</b></label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" rows="3" name="keterangan">
                            </textarea>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2"><i class="bi bi-plus-square"></i> Buat Kode Surat</button>
                            <a class="btn btn-warning" href="/dashboard/jenissurat"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                        </div>
                    </form>

</div>


@endsection