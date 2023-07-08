@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="container">Form Surat Masuk</h4>
    </div>

            <div class="card mt-4 container-fluid border mb-5 col-5">
                <div class="card-header text-center">
                <h3>Detail Surat Masuk</h3>
                </div>
                <div class="card-body text-center">
                    <table class="table">
                        <tbody>
                            <div class="container-fluid col-lg-8">
                                <div class="mb-3 container-fluid">
                                    <label for="no_surat_keluar" class="form-label"><b>Kode Surat Keluar</b></label>
                                    <input type="text"  class="text-center form-control" readonly id="no_surat_keluar" name="no_surat_keluar" value="{{ $surat->jenissurat['kodesurat'] ?? '' }}-{{ str_pad($surat->no_surat_keluar, 4, '0', STR_PAD_LEFT) }}">
                                </div>

                                <div class="mb-3 container-fluid">
                                    <label for="no_surat_keluar" class="form-label"><b>Tgl Surat Masuk</b></label>
                                    <input type="text" class="text-center form-control" readonly id="tgl_surat_keluar" name="tgl_surat_keluar" value="{{ old('tgl_surat_keluar',$surat->tgl_surat_keluar) }}">
                                </div>

                                <div class="mb-3 container-fluid">
                                    <label for="no_surat_keluar" class="form-label"><b>Jenis Surat Masuk</b></label>
                                    <input type="text" class="text-center form-control" readonly id="jenis_surat_masuk" name="jenis_surat_masuk" value="{{ old('jenissurat_namejenis',$surat->jenissurat['namejenis']) }}">
                                </div>

                                <div class="mb-3 container-fluid">
                                    <label for="no_surat_keluar" class="form-label"><b>Sifat Surat Masuk</b></label>
                                    <input type="text"class="text-center form-control" readonly id="sifat_surat_masuk" name="sifat_surat_masuk" value="{{ old('sifat_id', $surat->sifatsurat['namesifat']) }}">
                                </div>

                                <div class="mb-3 container-fluid">
                                    <label for="no_surat_keluar" class="form-label"><b>Pembuat Surat Masuk</b></label>
                                    <input type="text" class="text-center form-control" readonly id="penerima_surat_masuk" name="penerima_surat_masuk" value="{{ old('pengirim_surat', $surat->user->username) }}">
                                </div>

                                <div class="col-fluid container mt-4">
                                        <a href="/dashboard/surat{{ $surat->id }}/disposisi" class="btn btn-primary mb-3"><i class="bi bi-check-circle"></i> Disposisi</a>
                                        
                                        <a class="btn btn-warning" href="/suratmasuk"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                                </div>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>


    @endsection