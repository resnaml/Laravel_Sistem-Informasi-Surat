@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <div class="row mb-3">
        <h3 class="text-gray-800">Data Arsip</h3>
        <a class="btn btn-success ml-3 mb-2" href="/pengarsipan/create">Buat Arsip</a>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Arsip Berguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $berguna }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Arsip Peting</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $penting }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Arsip Vital</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $vital }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Arsip Dinamis</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dinamis }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>

        <form method="GET" action="/pengarsipan/cari-arsip"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group mt-3">
            @if (request('kode_arsip'))
                        <input type="hidden" name="kode_arsip" value="{{ request('kode_arsip') }}">
            @endif
            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..."  value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    Cari
                </button>
            </div>
        </form>
    </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                                <th>Kode Arsip</th>
                                <th>Judul Arsip</th>
                                <th>Tgl Arsip</th>
                                <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($arsip as $arsip)
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $arsip->full_kode }}</td>
                            <td>{{ $arsip->judul }}</td>
                            <td>{{ $arsip->created_at->format('y-m-d') }}</td>
                            <td>
                                <a href="{{ url('/pengarsipan/'.$arsip->id) }} " class="btn btn-success">Download</a>
                                
                                <form action="/pengarsipan/{{ $arsip->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')">Hapus</button>
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