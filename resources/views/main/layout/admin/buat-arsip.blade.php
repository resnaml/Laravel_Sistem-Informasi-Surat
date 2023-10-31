@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <h3 class="text-gray-800">Buat Data Arsip</h3>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Data</h6>
        </div>

        <div class="card-body">
            <form class="user" action="/pengarsipan/create" method="POST">
                @csrf

                <div class="form-group container col-sm-5">
                    <label for="">Kategori</label>
                    <div class="mb-3">
                        <select name="kategori_arsip_id" id="" class="" required>
                            <option selected disabled>Pilih Kategori Arsip</option>
                            @foreach ($kategori as $item)
                            <option value="{{ $item['id'] }}">{{ $item['arsip_kategori'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control form-control-user text-center" placeholder="Judul Arsip" name="judul" required>
                        
                    </div>

                    <div class="mb-3">
                        <input type="file" class="form-control form-control-user text-center" placeholder="Nama Jenis" name="namejenis" required>
                        
                    </div>

                    <div class="row container-fluid">
                        <button type="submit" class="btn btn-info text-grayy-800 ml-5 mr-3">Tambah Arsip</button>
    
                        <a class="btn btn-warning" href="/pengarsipan">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection