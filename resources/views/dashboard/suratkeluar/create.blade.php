@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
        <h1 class="h2">Buat Surat keluar</h1>
    </div>

    <div class="card mt-4 container-fluid col-7">
        <div class="card-header-">
    <form method="post" action="/dashboard/suratkeluar" class="mb-5" enctype="multipart/form-data">
        @csrf
        <h3 class="mb-2 text-center">Form Isi Pengajuan</h3>
        
        <hr class="featurette-divider mb-4">

            <div class="mb-3 col-7 container">
                <label for="jenissurat" class="form-label"><b>Jenis Surat </b></label>
                <select class="form-select mb-3" name="jenissurat_id" id="jenissurat_id">
                    <option selected disabled>-- Pilih Jenis Surat --</option>
                    @foreach ($jenissurats as $jenissurat)
                    @if(old('jenissurat_id') == $jenissurat->id)    
                    <option value="{{ $jenissurat->id }}">{{ $jenissurat->namejenis }}</option>
                    @else
                    <option value="{{ $jenissurat->id }}">{{ $jenissurat->namejenis }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3 col-7 container">
                <label for="jenissurat" class="form-label"><b>Sifat Surat </b></label>
                <select class="form-select mb-3" name="sifat_id">
                    <option selected disabled>-- Pilih Sifat Surat --</option>
                    @foreach ($sifat as $sifats)
                    @if(old('sifat_id') == $sifats->id)    
                    <option value="{{ $sifats->id }}">{{ $sifats->namesifat }}</option>
                    @else
                    <option value="{{ $sifats->id }}">{{ $sifats->namesifat }}</option>
                    @endif
                    
                    @endforeach
                </select>
            </div>

            <div class="mb-3 text-center">
                <label for="tgl_surat_keluar" class="form-label"><b>Tgl Surat Keluar</b></label>
                <div class="mb-3">
                    <i class="bi bi-calendar-week" style="font-size: 1.4rem; "> <input type="date" id="tgl_surat_keluar" name="tgl_surat_keluar" class="@error('tgl_surat_keluar') is-invalid @enderror" required value="{{ old('tgl_surat_keluar') }}"></i> 
                    @error('tgl_surat_keluar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                </div>

                <div class="mb-3 col-7 container">
                    <label for="User" class="form-label"><b>Penerima Surat</b></label>
                    <select class="form-select mb-3" name="kepada">
                        <option selected disabled>-- Pilih Users --</option>
                        @foreach ($users as $users)
                        {{-- @if(old('users_id') == $users->id)     --}}
                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                        {{-- @else --}}
                        {{-- <option value="{{ $users->id }}">{{ $users->name }}</option>
                        @endif --}}
                        @endforeach
                    </select>
                </div>

            <div class="mb-3">
                <label for="perihal" class="form-label"><b> Isi Surat </b></label>
                <input id="perihal" type="hidden" name="perihal" value="{{ old('perihal') }}" required>
                @error('perihal')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <trix-editor class="text-right bg-white" input="perihal"></trix-editor>
            </div>

            {{-- <div class="mb-4 col-8 container">
                <label for="lampiran" class="form-label"><b> Lampiran <span class="text-muted">(Opsional)</span></b></label>
                <input type="file" class="form-control" id="lampiran" name="lampiran">
            </div> --}}

            <div class="col-lg-6 container ">
                <button type="submit" class="btn btn-primary m-right-3 me-3"><i class="bi bi-plus-square"></i> Buat Surat</button>

                <a class="btn btn-warning" href="/dashboard/suratkeluar"><i class="bi bi-arrow-left-square"></i> Kembali</a>
            </div>

            
        </form>
        </div>
    </div>

{{-- 
    <script>
        const jenissurat_id = document.querySelector('#jenissurat_id');
        const no_surat_keluar = document.querySelector('#no_surat_keluar');
        
        title.addEventListener('change', function() {
            fetch('/dashboard/suratkeluar/KodeSurat?jenissurat_id=' + jenissurat_id.value)
            .then(response => response.json())
            .then(data => no_surat_keluar.value = data.no_surat_keluar)
        });
    </script> --}}

@endsection