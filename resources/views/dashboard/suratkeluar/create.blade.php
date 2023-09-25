@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
        <h2>Buat Surat keluar </h2>
    </div>

    <div class="card mt-4 text-center container-fluid col-10 mb-4">
    
    <form method="post" action="/dashboard/suratkeluar" enctype="multipart/form-data">
        @csrf

        <h3 class="mb-2 mt-2 text-center text-uppercase text-bold">Form Surat</h3>
        
        <hr class="featurette-divider mb-3">

            <div class="mb-3 col-5 container">
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
            
            <div class="mb-3 col-5 container">
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

                <div class="mb-4 col-5 container">
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

            {{-- <div class="mb-3">
                <label for="perihal" class="form-label"><b> Isi Surat </b></label>
                <input id="perihal" type="hidden" name="perihal" value="{{ old('perihal') }}" required>
                @error('perihal')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <trix-editor id='text' class="text-right bg-white" input="perihal"></trix-editor>
            </div> --}}

                <div>
                    <label for="perihal" class="form-label text-center"><b> Isi Surat </b></label>
                    <textarea name="perihal" id="mytextarea"></textarea>
                </div>

                {{-- <div id="summernote"></div> --}}
    
                <div class="container mt-4 mb-3">
                    <button type="submit" class="btn btn-primary m-right-3 me-3"><i class="bi bi-plus-square"></i> Buat Surat</button>
    
                    <a class="btn btn-warning" href="/dashboard/suratkeluar"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                </div>

        </form>
    </div>
        

    <script src="https://cdn.tiny.cloud/1/a68xqd9wpckqsojfq91h6e41dcf1qljlsk9ba1slymtnblhx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script src="/js/tinymce.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> --}}
    
    {{-- <script>
      $('#summernote').summernote({
        // placeholder: '',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script> --}}

    {{-- <script>
        document.getElementById('text').addEventListener('keydown', function(e) {
            if(e.key == 'Tab'){
                e.preventDefault();
                var start = this.selectionStart;
                var end = this.selectionEnd;
                this.value = this.value.substring(0, start) +
                "\t" + this.value.substring(end);
                this.selectionStart = this.selectionEnd = start + 1;
            }
        });
    </script> --}}
    
    {{-- <script>
        const jenissurat_id = document.querySelector('#jenissurat_id');
        const no_surat_keluar = document.querySelector('#no_surat_keluar');
        
        title.addEventListener('change', function() {
            fetch('/dashboard/suratkeluar/KodeSurat?jenissurat_id=' + jenissurat_id.value)
            .then(response => response.json())
            .then(data => no_surat_keluar.value = data.no_surat_keluar)
        });
    </script> --}}

@endsection