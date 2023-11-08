@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Surat Masuk</h5>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Surat</th>
                            <th scope="col">Sifat Surat</th>
                            <th scope="col">Pembuat Surat</th>
                            <th scope="col">Waktu Pengajuan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    
                @foreach ($suratmasuk as $surat)
                    <tbody>
                    <tr>    
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat['title'] }}</td>
                    @switch($surat['sifat'])

                    @case('Biasa')
                    <td><span class="btn btn-primary">{{ $surat['sifat'] }}</span></td>
                    @break

                    @case('Penting')
                    <td><span class="btn btn-warning">{{ $surat['sifat'] }}</span></td>
                    @break

                    @case('Segera')
                    <td><span class="btn btn-danger">{{ $surat['sifat'] }}</span></td>
                    @break

                    @case('Rutin')
                    <td><span class="btn btn-success">{{ $surat['sifat'] }}</span></td>
                    @break

                    @endswitch
                    <td><b>{{ $surat['pembuat'] }}</b></td>
                    <td>{{ $surat['created_at'] }}</td>
                    <td>
                        <a href="/suratmasuk/{{ $surat['title'] }}" class="d-inline btn btn-info">Setujui Surat</a>
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