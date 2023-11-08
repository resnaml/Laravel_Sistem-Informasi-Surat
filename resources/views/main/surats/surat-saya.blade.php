@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <div class="card shadow mb-4">
        
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Surat untuk ({{ auth()->user()->username }})</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Surat</th>
                            <th scope="col">Surat Dari</th>
                            <th scope="col">Tgl Surat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($suratkeluar as $surat)
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $surat->full_number }}</td>
                            <td>{{ $surat->user->username }}</td>
                            <td>{{ $surat->created_at->format('Y-M-d') }}</td>
                            <td>
                                <a class="d-inline btn btn-success" href="/suratsaya{{ $surat->full_number }}">Save</a>
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