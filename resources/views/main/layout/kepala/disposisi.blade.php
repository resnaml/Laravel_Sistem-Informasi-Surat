@extends('main.layout.index')

@section('container')

<style>
    .kbw-signature{width: 100%; height: 150px;}{
        $sign canvas{
            width: 100% !important;
            height: auto;
        }
    }
    .sign{
        width: 30rem;
    }
</style>

<div class="container-fluid">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        
        <div class="card-body">
            
                <div class="card container-fluid text-center" style="width: 20rem;">

                    <div class="card-head border-bottom border-dark mt-1">
                        <h4>
                            {{ $title}}
                        </h4> 
                    </div>

                    <div class="card-body">
                        <h5> 
                            <b>
                                {{ $pembuat }}
                            </b>
                        </h5>
                        
                        <h5>
                            <b>
                                {{ $jenis }}
                            </b>
                        </h5>
                        <h5>
                            <b>
                                {{ $tgl }}

                            </b>
                        </h5>
                    </div>
                </div>

                <form method="POST" action="/diposisi/{{ $id }}/edit">
                    @method('PUT')
                    @csrf


                    <div checked id="hide2">
                        <input class="form-check-input mt-3 mb-3" type="checkbox" value="1" name="disposisi_isi" checked>
                        <label class="form-check-label me-4 mb-2 mt-2">Setuju Disposisi</label>
                    </div>

                    <div id="hide1">
                        <label for="status disposisi" class="form-label"><b>Status Disposisi</b></label>
                        <select class="form-control text-center" name="status" id="status">
                        @foreach(["Diterima" => "Diterima"] as $status => $status2)
                        <option value="{{ $status2 }}">{{ $status2 }}</option>
                        @endforeach
                        </select>
                    </div> 
                    
                    <div class="sign mt-3 text-center container-fluid border border-dark rounded" id="form-ttd">
                        <label for="Tanda tangan" class="form-label"><b>Tanda Tangan</b></label>
                        <div id="sign"></div>
                        <br>
                        <textarea id="asd" name="ttd" style="display:none"></textarea>
                        <button class="btn btn-danger mb-3" id="clear">Hapus Ttd</button>
                    </div>

                    <div class="text-center container mt-4">
                        <button type="submit" class="btn btn-success me-2"><i class="bi bi-pen"></i> Simpan</button>
                        <a href="/diposisi" class="btn-primary btn">Kembali</a>
                    </div>
                </form>

        </div>
    </div>

</div>

    {{-- Jquery Signin Pad By:Keith Wood --}}
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <script src="/js/tanda-tangan.js"></script>

@endsection