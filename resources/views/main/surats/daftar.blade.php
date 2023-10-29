@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Daftar Surat</h1>

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
                            <th scope="col">Tgl Surat Keluar</th>
                            <th scope="col">Tujuan Surat</th>
                            <th scope="col">Pembuat Surat</th>
                            <th scope="col">Proses Surat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($suratkeluar as $surat)
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $surat->full_number }}</td>
                            <td>{{ date('d/m/Y', strtotime($surat->tgl_surat_keluar)) }}</td>
                            <td>{{ $surat->kepada_id['username'] }}</td>
                            <td>{{ $surat->user->username }}</td>
                            
                            @if ($surat->status == 'Diterima')
                            <td>
                                <span class="d-inline btn btn-success">{{ $surat->status }}</span>
                                </td>
                            <td>
                            @endif
            
                            @if ($surat->status == 'Ditolak')
                            <td>
                                <span class="d-inline btn btn-danger">{{ $surat->status }}</span>
                                </td>
                            <td>
                            @endif
            
                            @if ($surat->status == 'Proses')
                            <td>
                                <span class="d-inline btn btn-warning">{{ $surat->status }}</span>
                            </td>
                            
                            <td>
                            @endif
                                @if ($surat->status == 'Ditolak')
                                <a href="/dashboard/suratkeluar/{{ $surat->id }}" class="d-inline btn btn-warning">Lihat</a>
                                @endif
                                
                                <form action="/surats/{{ $surat->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="d-inline btn btn-danger" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')">Hapus</button>
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