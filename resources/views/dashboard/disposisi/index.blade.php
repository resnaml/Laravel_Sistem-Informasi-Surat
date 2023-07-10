@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
    <h2>Disposisi Surat Oleh : <span class="text-uppercase">{{ auth()->user()->username }}</span></h2>
    </div> 

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    
    <div class="container-fluid">
        <h2 class="text-center mb-3 border-bottom">Daftar Surat Menunggu Disposisi</h2>
        <table class="table table-striped table-sm table-bordered text-center">
            <tr>
                <thead class="table table-primary">
                    <th scope="col">No</th>
                    <th scope="col">Kode Surat</th>
                    <th scope="col">Tgl Surat Keluar</th>
                    <th scope="col">Tujuan Surat</th>
                    <th scope="col">Pembuat Surat</th>
                    <th scope="col"><i class="bi bi-clock-fill"></i></th>
                    <th scope="col"> </th>
                </thead>
            </tr>
            <tbody>
                @foreach ($suratkeluar as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->full_number }}</td>
                <td>{{ $surat->tgl_surat_keluar }}</td>
                <td>{{ $surat->kepada_id['username'] }}</td>
                <td>{{ $surat->user->username }}</td>
                <td>{{ $surat->created_at->diffForHumans() }} </td>
                <td>
                    <a href="/diposisikepala/{{ $surat->id }}" class="btn btn-info m-lg-1"><i class="bi bi-clipboard2-check"></i></a>
                    
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection