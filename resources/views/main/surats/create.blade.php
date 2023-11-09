@extends('main.layout.index')

@section('container')
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Create Surat</h1>

<div class="card shadow mb-4">
    <div class="card-body text-center">          
        <form method="POST" action="/surats" enctype="multipart/form-data">
            @csrf
            
            {{-- <hr class="featurette-divider mb-3"> --}}
            
            <div class="container col-5">

                <div class="container">
                    <label class="text-touppercase">
                        <h5>
                            Jenis Surat
                        </h5>
                    </label>
                    <div class="form-group">
                        <select class="form-control text-center" name="jenissurat_id" id="jenissurat_id" required>
                            <option selected disabled>-- Pilih Jenis Surat --</option>
                            @foreach ($jenis as $jenis)
                            @if(old('jenissurat_id') == $jenis['id'])    
                            <option value="{{ $jenis['id'] }}">{{ $jenis['namejenis'] }}</option>
                            @else
                            <option value="{{ $jenis['id'] }}">{{ $jenis['namejenis'] }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="container">
                    <label class="text-touppercase">
                        <h5>
                            Sifat Surat
                        </h5>
                    </label>
                    <div class="form-group">
                        <select class="form-control text-center" name="sifat_id" required>
                            <option selected disabled>-- Pilih Sifat Surat --</option>
                            @foreach ($sifat as $sifats)
                            @if(old('sifat_id') == $sifats['id'])    
                            <option value="{{ $sifats['id'] }}">{{ $sifats['namesifat'] }}</option>
                            @else
                            <option value="{{ $sifats['id'] }}">{{ $sifats['namesifat'] }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="container">
                    <label class="text-touppercase">
                        <h5>
                            Tanggal Surat
                        </h5>
                    </label>
                    <div class="form-group">
                        <input type="date" id="tgl_surat_keluar" name="tgl_surat_keluar" class="form-control" required value="{{ old('tgl_surat_keluar') }}">
                    </div>
                </div>

                <div class="container">
                    <label class="text-touppercase">
                        <h5>
                            Penerima Surat
                        </h5>
                    </label>
                    <div class="form-group">
                        <select class="form-control text-center" name="kepada">
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
                </div>
            </div>

                <div class="container">
                    <label class="text-touppercase">
                        <h5>
                            Isi Surat
                        </h5>
                    </label>
                    {{-- <div class="form-control"> --}}
                        <textarea name="perihal" id="mytextarea"></textarea>
                    {{-- </div> --}}
                </div>

                <div class="container mt-4 mb-3 text-center">
                    <button type="submit" class="btn btn-primary m-right-3 me-3"><i class="bi bi-plus-square"></i> Buat Surat</button>
            
                    <a class="btn btn-warning" href="/dashboard/suratkeluar"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                </div>
        </form>
    </div>
</div>
    
<script src="https://cdn.tiny.cloud/1/a68xqd9wpckqsojfq91h6e41dcf1qljlsk9ba1slymtnblhx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script src="/js/tinymce.js"></script>
    
@endsection