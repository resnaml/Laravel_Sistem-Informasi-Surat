@extends('main.layout.index')

@section('container')
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Create Surat</h1>

<div class="card shadow mb-4">

<div class="card-body text-center">
                
<form method="POST" action="/surats" enctype="multipart/form-data">
    @csrf
    
    <hr class="featurette-divider mb-3">
            
        <div class="mb-3 container">
            <label for="jenissurat" class="form-label"><b>Jenis Surat </b></label>
            <select class="form-select text-center" name="jenissurat_id" id="jenissurat_id">
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
                        
                        <div class="mb-3 container">
                            <label for="jenissurat" class="form-label"><b>Sifat Surat </b></label>
                            <select class="form-select text-center" name="sifat_id">
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
            
                            <div class="mb-4 container">
                                <label for="User" class="form-label"><b>Penerima Surat</b></label>
                                <select class="form-select text-center" name="kepada">
                                    <option selected disabled>-- Pilih User --</option>
                                    @foreach ($users as $users)
                                    <option value="{{ $users->id }}">{{ $users->username }} |
                                    @isset($users->nips_id) 
                                    {{ $users->nips_id['jabatan'] }}
                                    @endisset
                                    </option>
                                    @endforeach
                                </select>
                            </div>
            
                            <div>
                                <label for="perihal" class="form-label text-center"><b> Isi Surat </b></label>
                                <textarea name="perihal" id="mytextarea"></textarea>
                            </div>
            
                            <div class="container mt-4 mb-3 text-center">
                                <button type="submit" class="btn btn-primary m-right-3 me-3"><i class="bi bi-plus-square"></i> Buat Surat</button>
                
                                <a class="btn btn-warning" href="/dashboard/suratkeluar"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                            </div>

</form>
</div>
                    
    <script src="https://cdn.tiny.cloud/1/a68xqd9wpckqsojfq91h6e41dcf1qljlsk9ba1slymtnblhx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script src="/js/tinymce.js"></script>
    
</div>
@endsection