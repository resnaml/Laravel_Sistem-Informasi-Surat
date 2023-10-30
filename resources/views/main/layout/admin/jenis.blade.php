@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <span class="btn btn-info text-grayy-800 mb-3">Buat Jenis</span>

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
                    <td><span class="btn btn-danger">Hapus</span></td>
                </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
@endsection