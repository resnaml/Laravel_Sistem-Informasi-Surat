@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Edit Surat keluar</h1>
    </div>

<div class="card mt-3 container col-7 border mb-5">
        <form method="post" action="/dashboard/suratkeluar/{{ $surat->id }}" class="mb-5">
            @method('put')
            @csrf
            <h3 class="mb-4 card-header text-center border-dark border-bottom mt-3">Form Edit Surat</h3>

            <div class="container">
                <div class="mb-3 text-center">
                    <label for="tgl_surat_keluar" class="form-label"><b> Tgl Surat Keluar</b></label>
                        <div class="mb-3 col-10 container">
                            <i class="bi bi-calendar-week" style="font-size: 1.7rem; "> <input type="date" id="tgl_surat_keluar" name="tgl_surat_keluar" class="@error('tgl_surat_keluar') is-invalid @enderror" required value="{{ old('tgl_surat_keluar',$surat->tgl_surat_keluar) }}"></i> 
                            @error('tgl_surat_keluar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                </div>
                
                <div class="mb-3 col-7 container text-center">
                    <label for="jenissurat" class="form-label"><b>Sifat Surat </b></label>
                    <select class="form-select mb-3 col-7 text-center" name="sifat_id">
                        @foreach ($sifat as $sifats)
                        @if(old('sifat_id',$surat->sifat_id) == $sifats->id)    
                        <option value="{{ $sifats->id }}" selected>{{ $sifats->namesifat }}</option>
                        @else
                        <option value="{{ $sifats->id }}">{{ $sifats->namesifat }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="perihal" class="form-label"><b> Isi Surat </b></label>
                    <input id="perihal" type="hidden" name="perihal" value="{{ old('perihal',$surat->perihal) }}" required>
                    @error('perihal')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <trix-editor input="perihal"></trix-editor>
                </div>

                <div class="mb-3 col-4 container">
                    <label for="penerimasurat" class="form-label"><b> Penerima Surat </b></label>
                    <input type="text" class="form-control @error('penerima_surat') is-invalid @enderror" name="penerima_surat" readonly value="{{ old('kepada_id', $surat->kepada_id['name']) }}">
                </div>
                
            </div>
            <div class="col-5 container mt-4">
                <button type="submit" class="btn btn-primary m-right-3"><i class="bi bi-plus-square"></i> Update</button>
                <a class="btn btn-warning" href="/dashboard/suratkeluar"><i class="bi bi-arrow-left-square"></i> Kembali</a>
            </div>
        </form>
</div>

@endsection