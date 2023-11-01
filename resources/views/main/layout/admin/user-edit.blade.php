@extends('main.layout.index')

@section('container')

<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">User Data</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <div class="card-body">
            
                <div class="mt-3 container-fluid text-center">
                    <div class="card-head h4">: {{ $user->username}} </div>
                    <div class="card-body">
                        <h5 class="card-text">: {{ $user->email }}</h5>
                        <h5 class="card-title mb-2">: {{ $user->nip }}</h5>
                        <h5 class="card-title mb-2">: {{ $user->is_admin }}</h5>
                        <h5 class="card-title mb-2">: {{ $user->is_kepala }}</h5>
                    </div>
                </div>

                <div class="mt-3">
                    <select class="form-control text-center" name="status" id="status">
                        @foreach($nips as $item)
                        <option value="{{ $item['id'] }}">{{ $item['nama_lengkap'] }}</option>
                        @endforeach
                        </select>
                </div>
                
                    <div class="text-center container mt-4">
                        <button type="submit" class="btn btn-success me-2"><i class="bi bi-pen"></i> Simpan</button>
                        <a href="/kelolaakun" class="btn-primary btn">Kembali</a>
                    </div>

        </div>
    </div>
</div>


@endsection