@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
        <h1 class="h1">Edit Surat keluar</h1>
    </div>

<div class="card mt-3 container-fluid col-7">
    <div class="card-header-">
    <form method="post" action="/dashboard/suratkeluar/{{ $surat->id }}" class="mb-5">
        @method('put')
        @csrf
        <h3 class="mb-2 text-center mt-2">Form Edit Surat</h3>
        <hr class="featurette-divider mb-4">

            <div class="mb-3 col-7 container text-center">
            <label for="tgl_surat_keluar" class="form-label container"><b> Tgl Surat Keluar</b></label>
            <div class="mb-3 col-10">
                <i class="bi bi-calendar-week" style="font-size: 1.7rem; "> <input type="date" id="tgl_surat_keluar" name="tgl_surat_keluar" class="@error('tgl_surat_keluar') is-invalid @enderror" required value="{{ old('tgl_surat_keluar',$surat->tgl_surat_keluar) }}"></i> 
                @error('tgl_surat_keluar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div>
            {{-- <div class="mb-3 col-7 container">
                <label for="jenissurat" class="form-label"><b> Surat </b></label>
                <select class="form-select mb-3" name="jenissurat_id">
                    @foreach ($jenissurats as $jenissurat)
                    @if(old('jenissurat_id',$surat->jenissurat_id) == $jenissurat->id)    
                    <option value="{{ $jenissurat->id }}" selected>{{ $jenissurat->namejenis }}</option>
                    @else
                    <option value="{{ $jenissurat->id }}">{{ $jenissurat->namejenis }}</option>
                    @endif
                    @endforeach
                </select>
            </div> --}}
            <div class="mb-3 col-7 text-center container">
                <label for="jenissurat" class="form-label"><b>Sifat Surat </b></label>
                <select class="form-select mb-3 col-7 container text-center" name="sifat_id">
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
            <div class="mb-5 col-7 container">
                <label for="penerimasurat" class="form-label"><b> Penerima Surat </b></label>
                <input type="text" class="form-control @error('penerima_surat') is-invalid @enderror" id="penerima_surat" name="penerima_surat" required value="{{ old('penerima_surat', $surat->penerima_surat) }}">
                @error('penerima_surat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2 col-7 container mt-2">
                <button type="submit" class="btn btn-primary m-right-3"><i class="bi bi-plus-square"></i> Update Surat</button>

                <a class="btn btn-warning" href="/dashboard/suratkeluar"><i class="bi bi-arrow-left-square"></i> Kembali</a>
            </div>

            
        </form>
    </div>
    </div>

@endsection