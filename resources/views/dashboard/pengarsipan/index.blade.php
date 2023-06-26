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
        
            <form method="GET" action="/dashboard/pengarsipan/cari-arsip">
                @if (request('kode_arsip'))
                        <input type="hidden" name="kode_arsip" value="{{ request('kode_arsip') }}">
                    @endif
                <input type="text" class="btn mb-2 me-3 btn-outline-info" placeholder="Cari Arsip..." name="search" value="{{ request('search') }}" id="search">
                <button class="btn btn-outline-secondary mb-2 me-3" id="button-addon2" type="submit" ><i class="bi bi-search"></i> Cari...</button>
            </form>
    </div>

    <div class="card-group_s mt-3 mb-3 row">
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

    <hr>

        
    <div class="container" id="tabel">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Daftar Arsip</h3>
                <table class="table table-striped table-bordered">
                    <thead class="table table-primary table-striped-columns">
                        <tr>
                            <th>No</th>
                            <th>Kode Arsip</th>
                            {{-- <th>Kategori</th> --}}
                            <th>Judul Arsip</th>
                            <th>Tgl Arsip</th>
                            <th></th>
                            @foreach($arsip as $arsip)
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $arsip->full_kode }}</td>
                                {{-- <td>{{ $arsip->kategori['kode_arsip'] }}</td> --}}
                                <td>{{ $arsip->judul }}</td>
                                <td>{{ $arsip->tgl_arsip }}</td>
                                <td>
                                    <a href="{{ url('/dashboard/pengarsipan/download/'.$arsip->id) }} " class="btn btn-success"><i class="bi bi-download"></i></a>
                                </td>
                            </tbody>
                            @endforeach
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- <script>
        $(function()
        {   
            $('#tabel').hide();
            $('#search').change(function()
            {
                if ($('#search').val() != true) {
                    // $('#checkbox').hide();
                    // $('#isi_oleh').hide();
                    // $('#checkbox').hide();
                    // $('#no_disposisi').hide();
                    // $('#sign').hide();
                    // $('#form-ttd').hide();
                    $('#tabel').show();
                }
            });
        });
    </script> --}}
    
    
@endsection