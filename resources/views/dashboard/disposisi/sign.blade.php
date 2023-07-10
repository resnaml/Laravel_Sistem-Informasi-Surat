@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
    <h2>Kepala : <span class="text-uppercase text-success">{{ auth()->user()->username }}</span></h2>
    </div> 

    {{-- Jquery Signin Pad By:Keith Wood --}}
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
            <h3>Tanda Tangan Surat</h3>
        </div>
        <div class="card border mt-3 border-dark container-fluid text-center" style="width: 18rem;">
            <div class="card-head h4 mt-2 border-bottom border-dark"><i class="bi bi-envelope-open"></i> : {{ $surat->full_number }}</div>
            <div class="card-body">
                <h5 class="card-text"> <i class="bi bi-person-circle"></i> : {{ $surat->user->username }}</h5>
                <h5 class="card-title mb-2"><i class="bi bi-caret-right-fill"></i> : {{ $surat->jenissurat['namejenis'] }}</h5>
                <h5 class="card-title mb-2"><i class="bi bi-clock"></i> : {{ $surat->tgl_surat_keluar }}</h5>
                <h5 class="card-title border bg-success border-dark rounded mb-2"><i class="bi bi-check-circle-fill"></i> : Sudah Acc Admin</h5>
            </div>
        </div>
            
            <div class="card-body">
                        <div class="container">
                        <form method="POST" action="/diposisikepala/{{ $surat->id }}">
                            @method('POST')
                            @csrf
                            <div class="mb-3 mt-4 text-center border border-dark rounded me-2">
                                <input class="form-check-input mt-3 mb-3" type="checkbox" value="1" name="disposisi_isi">
                                <label class="form-check-label me-4 mb-2 mt-2">Setuju Disposisi</label>
                            </div>

                            <div class="mb-2 mt-2 text-center">
                                <label for="status disposisi" class="form-label"><b>Status Disposisi</b></label>
                                <select class="form-control text-center" name="status" id="status">
                                @foreach(["Diterima" => "Diterima"] as $status => $status2)
                                <option value="{{ $status2 }}">{{ $status2 }}</option>
                                @endforeach
                                </select>
                            </div> 
                            
                            <div class="mt-3 text-center bg-transparent border border-dark rounded-3" id="form-ttd">
                                <label for="Tanda tangan" class="form-label"><b>Tanda Tangan</b></label>
                                <div id="sign"></div>
                                <br>
                                <textarea id="asd" name="ttd" style="display:none"></textarea>
                                <button class="btn btn-danger mb-3" id="clear">Hapus Ttd</button>
                            </div>

                            <div class="text-center container mt-4">
                                <button type="submit" class="btn btn-success"><i class="bi bi-pen"></i> Simpan</button>
                            </div>
                        </form>
                        </div>
            </div>
        </div>

        <script src="/js/tanda-tangan.js"></script>
        
@endsection