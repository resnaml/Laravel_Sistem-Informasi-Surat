@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
        <h1 class="h2">Halaman Pengarsipan</h1>
    </div>

<div class="container card border border text-center col-lg-5 mt-4">
    <form method="post" action="/dashboard/pengarsipan/create" class="mb-3" enctype="multipart/form-data">
        @csrf
        <h3 class="text-center mt-4 border-bottom">Form Pengarsipan</h3>
        <div class="container mb-3 mt-3 col-8">
            
            <label for="judul" class="form-label"><b>Judul Arsip</b></label>
            <input type="text" class="form-control text-center @error('judul') is-invalid @enderror" name="judul"  autofocus value="{{ old('judul') }}" required>
            @error('judul')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="container mb-3 col-8">
            <label for="Kategori" class="form-label"><b>Kategori Arsip</b></label>
            <select class="form-select mb-3 text-center" name="kategori_arsip_id" required>
                <option selected disabled>Pilih Kategori & Kode arsip</option>
                @foreach ($kategori as $k)    
                <option value="{{ $k->id }}">{{ $k->arsip_kategori }}/{{ $k->kode_arsip }}</option>
                @endforeach
            </select>
        </div>

        <div class="container mb-3 col-8">
            <label for="Kategori" class="form-label"><b>Tgl Arsip</b></label>
            <input type="date" class="form-control  @error('tgl_arsip') is-invalid @enderror" name="tgl_arsip" value="{{ old('tgl_arsip') }}" required>
            @error('tgl_arsip')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

            <div class="container col-8">
                <label for="file" class="form-label"><b>Pilih File Arsip</b></label>
                <img class="img-preview img-fluid">
                <input type="file" class="form-control @error('file_arsip') is-invalid @enderror" name="file_arsip" onchange="previewImage()" required>
                @error('file_arsip')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="container col-lg-9 mt-4">
                <button type="submit" class="btn btn-primary m-right-1 me-1"><i class="bi bi-safe"></i> Masukan Arsip</button>
                <a class="btn btn-warning" href="/dashboard/pengarsipan"><i class="bi bi-arrow-left-square"></i> Kembali</a>
            </div>
    </form>
    </div>

    <script>
        function previewImage()
        {
            const image = document.querySelector('#file_arsip');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob
        }
    </script>

@endsection