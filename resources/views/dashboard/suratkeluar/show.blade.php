@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
        <h2 class="container">Show surat keluar</h1>
    </div>

        <div class=" border-bottom border-dark">
            <a class="btn btn-primary mb-2 pt-2 me-4" href="/dashboard/suratkeluar"><i class="bi bi-caret-left"></i> Kembali</a>
        </div>
        
            <div class="card mt-4 container-fluid col-9">
                <div class="card-header text-center">
                <h3>Detail Surat</h3>
                </div>
                <a class="container btn btn-info col-3 mt-3 text-center text-dark border-bottom">Status Surat : {{ $surat->status }}</a>
                <div class="card-body mt-2">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th scope="row">Surat Dibuat Pada</th>
                            <td>{{ $surat->created_at->format('m/d/y') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Surat Untuk Tgl</th>
                            <td>{{ $surat->tgl_surat_keluar }}</td>
                        </tr>
                            <th scope="row">Kode Surat</th>
                            <td>{{ $surat->jenissurat['kodesurat'] ?? '' }}-{{ str_pad($surat->no_surat_keluar, 4, '0', STR_PAD_LEFT) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Penerima Surat</th>
                            <td colspan="2">{{ $surat->penerima_surat }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Pengirim Surat</th>
                            <td colspan="2">{{ $surat->user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis Surat</th>
                            <td colspan="2">{{ $surat->jenissurat['namejenis'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Sifat Surat</th>
                            <td colspan="2">{{ $surat->sifatsurat['namesifat'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Isi Surat</th>
                            <td>
                                    <textarea readonly class="form-control" style="height: 100px">{{ $surat->perihal }}</textarea>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <hr class="featurette-divider mt-5 mb-5">
                    @if ($surat->print_surat == true)
                    <div class="card-header mt-5 text-center">
                        <h3>Isi Disposisi</h3>
                    </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                        <tbody>    
                            <tr>
                                <th scope="row">No Surat</th>
                                <td colspan="2">
                                @isset($surat->disposisi)
                                    {{ $surat->diposisi }}
                                    <div>{{ $surat->disposisi['no_disposisi'] }}</div>
                            </tr>
                            <tr>
                                <th scope="row">Tgl Disposisi</th>
                                <td colspan="2">{{ $surat->disposisi->created_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Disposisi Oleh</th>
                                <td colspan="2">{{ $surat->disposisi['disposisi_oleh'] }}</td>
                            </tr>
                            @endisset
                            @else
                            <div class="card-header mt-4 mb-3 text-center">
                                <h3>Disposisi Ditolak</h3>
                                </div>
                                <table class="table table-bordered">
                                    <tbody>
                            <tr>
                                <th scope="row">Isi Ditolak</th>
                            <td>
                                    <textarea readonly class="form-control" style="height: 100px">{{ $surat->disposisi['isi_ditolak'] }}</textarea>
                            </td>
                            </tr>
                                    </tbody>
                                </table>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <hr class="featurette-divider mt-1 mb-4">

                @section( $surat->print_surat == true )
                @show
                @if ($surat->print_surat == true)
                    <div class="container mt-5">
                        {{-- <form method="post" action="/dashboard/suratkeluar">
                        @csrf
                    <button class="container btn btn-primary me-2" type="submit"><i class="bi bi-filetype-doc"></i> Export Doc</button>
                        </form> --}}

                    <a href="/dashboard/suratkeluar{{ $surat->id }}.pdf" 
                        target="_blank"
                        class="container btn btn-danger me-2 mt-3 content-center" type="submit"><i class="bi bi-file-earmark-pdf"></i> Export PDF</a>
                    
                    </div>
                </div>
                @endif
            </div>

    @endsection