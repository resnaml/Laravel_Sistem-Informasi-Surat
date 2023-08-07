@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex pt-3 pb-2 border-bottom">
    </div>

            <div class="card mt-5 container-fluid border mb-4 col-5">
                <div class="text-center mt-2 mb-2">
                <h4><i class="bi bi-envelope-open"></i> : {{ $surat->full_number }}</h4>
                </div>

                    <div class="container-fluid text-center col-9">
                                
                            <div class="border rounded border-dark mb-2">
                                    <label class="form-label"><b>Jenis Surat</b></label>
                                    <h4>{{ $surat->jenissurat['namejenis'] }}</h4>
                                </div>

                                <div class="border rounded border-dark mb-2">
                                    <label class="form-label"><b>Sifat Surat</b></label>
                                    <h4>- {{ $surat->sifatsurat['namesifat'] }}</h4>
                                </div>

                                <div class="border rounded border-dark mb-2">
                                    <label class="form-label"><b>Tgl Surat</b></label>
                                    <h4>{{ $surat->tgl_surat_keluar }}</h4>
                                </div>
                                
                                <div class="border rounded border-dark mb-2">
                                    <label class="form-label"><b>Pembuat Surat</b></label>
                                    <h4>{{ $surat->user->username }}</h4>
                                </div>

                                <div class="container mt-3">
                                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-bookmark-check"></i> Setujui Surat</button>
                                        
                                        <a class="btn btn-warning mb-3" href="/suratmasuk"><i class="bi bi-arrow-left-square"></i> Kembali</a>
                                </div>
                            </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Disposisi Surat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="card-body">
                            <div class="container col-lg-8">
                            <form method="POST" action="/suratmasuk/{{ $surat->full_number }}">
                                @method('POST')
                                @csrf
                                
                                <div class="mb-2 mt-2 text-center">
                                    <label for="status disposisi" class="form-label"><b>Status Disposisi</b></label>
                                    <select onchange="handelOnChangeEvent(this.value)" required class="form-control text-center" name="status" id="status">
                                    <option selected disabled>-- Pilih Status --</option>
                                    @foreach(["Proses" => "Proses"] as $status => $status2)
                                    <option value="{{ $status2 }}">{{ $status2 }}</option>
                                    @foreach(["Ditolak" => "Ditolak"] as $status => $status3)
                                    <option id="status3" value="{{ $status3 }}">{{ $status3 }}</option>
                                    @endforeach
                                    @endforeach
                                    </select>
                                </div> 
        
                                <div id="isi_ditolak" class="mb-3 text-center mt-4">
                                    <label class="form-label"><b>Alasan Surat Ditolak</b></label>
                                    <textarea class="form-control" rows="4" name="isi_ditolak"></textarea>
                                </div>
                                
                                <div class="mb-3 mt-4 text-center border border-dark rounded" id="checkbox">
                                    <div class="mt-3 mb-3">
                                        <input class="form-check-input" type="checkbox" value="1" name="print_surat"{{ $surat->print_surat || old('print_surat', 0) === 1 ? 'checked' : '' }}>
                                        <label class="form-check-label">Setujui Surat</label>
                                    </div>
                                </div>

                                <div class="mb-3 mt-4 text-center border border-dark rounded" id="acc_admin">
                                    <div class="mt-3 mb-3">
                                        <input class="form-check-input" type="checkbox" value="1" checked name="acc_admin">
                                        <label class="form-check-label">acc admin</label>
                                    </div>
                                </div>

                                <div class="mb-3 mt-3 text-center" id="isi_oleh">
                                    <label for="disposisi oleh" class="form-label"><b>Disetujui Oleh</b></label>
                                    <input type="text" class="form-control text-center" value="{{ auth()->user()->username }}" readonly>
                                </div>

                                <div class="text-center container mt-4">
                                    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Simpan</button>
                                </div>
                                
                                </form>
                            </div>
                        </div>
                        <hr>
                        </div>
                    </div>
                </div>

    <script src="/js/disposisi.js"></script>

    @endsection