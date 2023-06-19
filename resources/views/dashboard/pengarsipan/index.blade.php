@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-dark border-bottom">
        <h1 class="h2">Halaman Pengarsipan</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success mt-1" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if(session()->has('danger'))
    <div class="alert alert-danger mt-1" role="alert">
        {{ session('danger') }}
    </div>
    @endif

    <div class="d-flex border-bottom border-dark">
        <a class="btn btn-primary mb-2 me-3" href="/dashboard/pengarsipan/create"><i class="bi bi-folder-plus"></i> Buat File Arsip</a>
        
            <form action="/dashboard/pengarsipan/cari-arsip">
                <input type="text" class="btn mb-2 me-3 btn-outline-info" placeholder="Cari Surat..." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary mb-2 me-3" id="button-addon2" type="submit" ><i class="bi bi-search"></i> Cari...</button>
            </form>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <table class="table table-striped table-bordered mb-3">
                    <thead class="table table-primary table-striped-columns">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>judul</th>
                            <th>tgl</th>
                            <th></th>

                            <tbody>
                                <td>1</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td></td>
                            </tbody>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="card-group_s mt-4 row">
        <div class="card border border-dark" style="max-width: 13rem;">
            <div class="card-header h5 mt-2"><b>Arsip Berguna</b>  
            <div class="mt-2 h4 bold border"><a href="/dashboard/pengarsipan/arsipberguna">{{ $arsipBerguna }}</a></div>
            </div>
            <div class="card-body">
                <i class="bi bi-safe" style="font-size: 4.0rem;"></i>
            </div>
        </div>
        <div class="card border border-dark" style="max-width: 13rem;">
            <div class="card-header h5 mt-2"><b>Arsip Penting</b>
                <div class="h4 border mt-2"><a href="/dashboard/pengarsipan/arsippenting">{{ $arsipPenting }}</a></div>
            </div>
            <div class="card-body">
                <i class="bi bi-safe-fill" style="font-size: 4.0rem;"></i>
            </div>
        </div>
        <div class="card border border-dark" style="max-width: 13rem;">
            <div class="card-header h5 mt-2"><b>Arsip Vital</b>
                <div class="h4 border mt-2"><a href="/dashboard/pengarsipan/arsipvital">{{ $arsipVital }}</a></div>
            </div>
            <div class="card-body">
                <i class="bi bi-safe2" style="font-size: 4.0rem;"></i>
            </div>
        </div>
        <div class="card border border-dark" style="max-width: 13rem;">
            <div class="card-header h5 mt-2"><b>Arsip Dinamis</b> 
            <div class="h4 border mt-2"><a href="/dashboard/pengarsipan/arsipdinamis">{{ $arsipDinamis }}</a></div>
            </div>
            <div class="card-body">
                <i class="bi bi-safe2-fill" style="font-size: 4.0rem;"></i>
            </div>
        </div>
    </div>
    
@endsection