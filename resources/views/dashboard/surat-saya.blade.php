@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom border-dark">
        <h1 class="h2">Surat Untuk : {{ auth()->user()->username }}</h1>
    </div>

    @if(session()->has('danger'))
    <div class="alert alert-danger mt-2" role="alert">
        {{ session('danger') }}
    </div>
    @endif

    <div class="container">


        @if ($jumlahMasuk == null)
            <h1 class="mt-2">
                <marquee behavior="2" direction="3">
                    Belum Ada Surat
                </marquee> 
            </h1>
        @else
            
        <div class="row">
            
            @foreach ($suratkeluar as $surat)
            
                <div class="row col-md-3 g-3">
                    <div class="col">
                        <div class="card h-100 text-center border-dark">
                            <img src="https://source.unsplash.com/200x200/?letter" class="card-img-top" width="200" height="200">
                            <div class="card-body">
                                <h4 class="card-title mb-3"><b>{{ $surat->user->username }} <i class="bi bi-chat-quote"></i></b></h4>
                                <div class="">
                                    <h6 class="card-title mt-2"><i class="bi bi-dash-lg"></i> {{ $surat->jenissurat['namejenis'] }} <i class="bi bi-dash-lg"></i></h6>
                                    <h6 class="card-title"><i class="bi bi-dash-lg"></i> {{ $surat->sifatsurat['namesifat'] }} <i class="bi bi-dash-lg"></i></h6>
                                </div>
                                <a class="btn btn-success mt-3" href="/dashboard/suratsaya/{{ $surat->id }}"><i class="bi bi-file-earmark-pdf"></i></a>
                                {{-- <a class="btn btn-primary mt-3"><i class="bi bi-file-earmark-word"></i>
                                </a> --}}
                                <form action="/dashboard/suratsaya{{ $surat->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn mt-3 btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                                </form>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">Terakhir {{ $surat->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
        
    </div>
    
@endsection