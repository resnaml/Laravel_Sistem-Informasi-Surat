@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Disposisi Surat</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                                <thead class="table table-primary">
                                <th>No</th>
                                <th>Kode Surat</th>
                                <th>Action</th>
                            </thead>
                        </tr>
                        </thead>
                        @foreach ($suratkeluar as $surat)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $surat['full_number'] }}</td>
                            <td>
                                <a href="/diposisi/{{ $surat['id'] }}" class="d-inline btn btn-info">Disposisi</a>
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