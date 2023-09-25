@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex pt-3 pb-2 border-bottom border-dark">
        <h2>Surat Masuk : <span class="text-uppercase text-success">{{ auth()->user()->username }}</span></h2>
    </div>

    @if(session()->has('danger'))
    <div class="alert alert-danger mt-2" role="alert">
        {{ session('danger') }}
    </div>
    @endif

    <div class="container">
        @if ($jumlahMasuk == null)
            <h2 class="mt-2">
                <marquee behavior="2" direction="3">
                    Belum Ada Surat
                </marquee> 
            </h2>
        @else
        
        <div class="row">
            
            @foreach ($suratkeluar as $surat)
                <div class="row col-md-3 g-3">
                    <div class="col">
                        <div class="card h-100 text-center border-dark">
                            <img src="https://source.unsplash.com/200x200/?pdf" class="card-img-top" width="200" height="200">
                            <div class="card-body">
                                <h4 class="card-title mb-3"><b class="text-uppercase">{{ $surat->user->username }} <i class="bi bi-chat-quote"></i></b></h4>
                                <div class="">
                                    <p class="card-title mt-2 fw-medium"><i class="bi bi-dash-lg"></i> {{ $surat->jenissurat['namejenis'] }} <i class="bi bi-dash-lg"></i></p>
                                    <p class="card-title fw-medium"><i class="bi bi-dash-lg"></i> {{ $surat->sifatsurat['namesifat'] }} <i class="bi bi-dash-lg"></i></p>
                                </div>
                                <a class="btn btn-success mt-3" href="/suratsaya{{ $surat->full_number }}"><i class="bi bi-file-earmark-pdf"></i></a>
                                {{-- <form action="/suratsaya{{ $surat->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn mt-3 btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                                </form> --}}
                            </div>
                            {{-- <div class="card-footer">
                                <small class="text-body-secondary">Terakhir {{ $surat->created_at->diffForHumans() }}</small>
                            </div> --}}
                        </div>
                    </div>
                    
                </div>

                @endforeach
            @endif

        </div>
        
    </div>
    
@endsection