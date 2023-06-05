@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom border-dark">
        <h1 class="h2">Surat Untuk : {{ auth()->user()->name }}</h1>
    </div>

    <div class="container">

        @if ($jumlahMasuk == 0)
            <h1 class="mt-2">
                Belum Ada Surat
            </h1>
        @else
            
        <div class="row">
            
            @foreach ($suratkeluar as $surat)
            
                @if ($surat->print_surat == false)
                @continue
                @endif
                <div class="row col-md-3 g-3">
                    <div class="col">
                        <div class="card h-100 text-center border-dark">
                            <img src="https://source.unsplash.com/200x200/?letter" class="card-img-top" width="200" height="200">
                            <div class="card-body">
                                <h4 class="card-title mb-3"><b>{{ $surat->user->name }} <i class="bi bi-chat-quote"></i></b></h4>
                                <div class="">
                                    <h6 class="card-title mt-2"><i class="bi bi-dash-lg"></i> {{ $surat->jenissurat['namejenis'] }} <i class="bi bi-dash-lg"></i></h6>
                                    <h6 class="card-title"><i class="bi bi-dash-lg"></i> {{ $surat->sifatsurat['namesifat'] }} <i class="bi bi-dash-lg"></i></h6>
                                </div>
                                <a class="btn btn-success mt-3" href="/dashboard/suratsaya/{{ $surat->id }}"><i class="bi bi-file-earmark-pdf"></i></a>
                                {{-- <a class="btn btn-primary mt-3"><i class="bi bi-file-earmark-word"></i>
                                </a> --}}
                                <a class="btn btn-danger mt-3" href="/generate-pdf"><i class="bi bi-trash-fill"></i></a>
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