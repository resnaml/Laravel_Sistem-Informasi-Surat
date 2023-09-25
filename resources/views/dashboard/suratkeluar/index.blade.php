@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex pt-3 pb-2 mb-2 border-bottom border-dark">
        <h2>Surat Keluar : <span class="text-uppercase text-success">{{ auth()->user()->username }}</span></h2>
    </div>
    
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if(session()->has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ session('danger') }}
    </div>
    @endif

    <div class="d-flex mb-0 mb-3">
        <a class="btn btn-primary me-2" href="/dashboard/suratkeluar/create"><i class="bi bi-envelope-plus"> Buat Surat</i></a>
        {{-- <a class="btn btn-success" href="/dashboard/suratkeluarcetak"><i class="bi bi-printer"> Cetak Data</i></a> --}}
    </div>
    
    
    <div class="d-flex mb-1">
        <table class="table table-hover text-center">
            <thead class="table table-primary">
                <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Surat</th>
            <th scope="col">Tgl Surat Keluar</th>
            <th scope="col">Tujuan Surat</th>
            <th scope="col">Pembuat Surat</th>
            <th scope="col">Proses Surat</th>
            <th scope="col"> </th>
        </tr>
        @foreach ($suratkeluar as $surat)
        </thead>
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
                    <a href="/dashboard/suratkeluar/{{ $surat->id }}" class="btn btn-info m-lg-1"><i class="bi bi-eye"></i></a>
                    @endif

                    {{-- @if ($surat->status == 'Diterima')
                    <a href="/dashboard/suratkeluar{{ $surat->id }}.pdf" class="btn btn-success m-lg-1 content-center" type="submit"><i class="bi bi-file-earmark-pdf"></i>
                    </a>
                    @endif --}}
                    
                    <form action="/dashboard/suratkeluar/{{ $surat->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    </div>

    @endsection