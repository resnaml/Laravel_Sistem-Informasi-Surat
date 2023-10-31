@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buat Jenis Surat</h6>
        </div>

        <div class="card-body">
            <form class="user" action="/jenissurat" method="POST">
                @csrf
                <div class="form-group container col-sm-5">
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-user text-center @error('namejenis') is-invalid @enderror" placeholder="Kode Surat" name="kodesurat" required>
                        @error('namejenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div ></div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-user text-center @error('namejenis') is-invalid @enderror" placeholder="Nama Jenis" name="namejenis" required>
                        @error('namejenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info text-grayy-800 container">Buat Jenis</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Surat</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    
                @foreach ($jenis as $item)
                    <tbody>
                    <tr>    
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item['kodesurat'] }} </td>
                    <td>{{ $item['namejenis'] }}</td>
                    <td>
                        <form action="/jenissurat/{{ $item['id'] }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin untuk hapus data ?')">Hapus</button>
                        </form>
                </td>
                </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
@endsection