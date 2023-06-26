@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="container">Disposisi Surat Masuk</h4>
    </div>

    {{-- <script type="text/javascript" src="js/excanvas.js"></script> --}}

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <style>
        .kbw-signature{width: 100%; height: 150px;}{
            $sign canvas{
                width: 100% !important;
                height: auto;
            }
        }
    </style>
    
    <div class="card mt-4 container mb-4 border-dark col-5">
            <div class="card-header text-center">
                <h3>Form Disposisi</h3>
            </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <div class="container col-lg-8">
                    <form method="post" action="/dashboard/surat{{ $surat->id }}/disposisi">
                        @method('post')
                        @csrf
                        
                        <div id="example" class="mb-2 mt-2 text-center">
                            <label for="status disposisi" class="form-label"><b>Status Disposisi</b></label>
                            <select  required class="form-control text-center" name="status" id="status">
                            @foreach(["Proses" => "Proses"] as $status => $status1)
                            {{-- <option value="{{ $status }}" {{ old("status", $surat->status) == $status ? "selected" : "" }} >{{ $status1 }}</option> --}}
                            @foreach(["Diterima" => "Diterima"] as $status => $status2)
                            <option id="status2" value="{{ $status2 }}">{{ $status2 }}</option>
                            @foreach(["Ditolak" => "Ditolak"] as $status => $status3)
                            <option id="status3" value="{{ $status3 }}">{{ $status3 }}</option>
                            @endforeach
                            @endforeach
                            @endforeach
                            </select>
                        </div> 

                        <div id="isi_ditolak" class="mb-3 text-center mt-4">
                            <label for="no_surat_keluar" class="form-label"><b>Alasan Surat Ditolak</b></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="isi_ditolak"></textarea>
                        </div>
                        
                        <div class="mb-3 mt-4 text-center border border-dark rounded me-2" id="checkbox">
                            <input class="form-check-input mt-3 mb-3" type="checkbox" value="1" name="print_surat"{{ $surat->print_surat || old('print_surat', 0) === 1 ? 'checked' : '' }}>
                            <label class="form-check-label me-4 mb-2 mt-2">Setuju Disposisi</label>
                        </div>

                        <div class="mb-2 mt-2" hidden>
                            <input class="form-check-input" type="checkbox" value="1" name="disposisi_isi" checked>
                            <label class="form-check-label" for="flexCheckChecked">Surat sudah disposisi</label>
                        </div>
                        
                        <div class="mb-3 mt-3 text-center" id="no_disposisi">
                            <label for="no disposisi" class="form-label"><b>No Surat</b></label>
                            <input type="text" disabled 
                            value="{{ $surat->jenissurat['kodesurat'] ?? '' }}/{{ substr($surat->tgl_surat_keluar, 5, 2) }}/{{ substr($surat->tgl_surat_keluar, 2, 2) }}/{{ $surat->no_surat_keluar }}"
                            class="form-control text-center">
                        </div>

                        <div class="mb-3 mt-3 text-center" id="isi_oleh">
                            <label for="disposisi oleh" class="form-label"><b>Disposisi Oleh</b></label>
                            <input type="text" class="form-control text-center" name="disposisi_oleh" value="{{ auth()->user()->username }}" readonly>
                        </div>

                        <div class="mt-3 text-center bg-transparent border border-dark rounded-3" id="form-ttd">
                            <label for="Tanda tangan" class="form-label"><b>Tanda Tangan</b></label>
                            <div id="sign"></div>
                            <br>
                            <textarea id="asd" name="ttd" style="display:none"></textarea>
                            <button class="btn btn-danger mb-3" id="clear">Hapus Ttd</button>
                            
                        </div>

                        <hr>

                        <div class="text-center container mt-4">
                            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Simpan</button>
                            <a class="btn btn-warning" href="/dashboard/surat/{{ $surat->id }}"><i class="bi bi-arrow-left-square"></i> Kembali
                            </a>
                        </div>
                        
                        </form>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
    

    <script src="/js/tanda-tangan.js"></script>

    <script src="/js/disposisi.js"></script>

    @endsection