@extends('dashboard.layouts.main')

@section('container')
    <div class="pt-3 pb-2 mb-2 border-bottom border-dark">
        <h2 class="d-flex">Kode {{ $surat->full_number }}</h2>
    </div>

        <div class=" border-bottom border-dark">
            <a class="btn btn-primary mb-2 pt-2 me-4" href="/dashboard/suratkeluar"><i class="bi bi-caret-left"></i> Kembali</a>
        </div>
        
            <div class="card mt-4 container-fluid border mb-4 col-6">
                <div class="mt-3 text-center">
                    <h3>Alasan Ditolak</h3>
                </div>
                    <div>                    
                        <table class="table table-responsive"> 
                            <tr>
                                <td>
                                <textarea readonly class="form-control text-center" style="height: 90px">{{ $surat->disposisi['isi_ditolak'] }}</textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                
            </div>

    @endsection