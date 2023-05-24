@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
        <h1 class="h2">Surat Untuk : {{ auth()->user()->name }}</h1>
    </div>

    <div >

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
            <div class="card h-100 text-center">
                <img src="https://source.unsplash.com/200x200/?letter" class="card-img-top" width="200" height="200">
                <div class="card-body">
                    @foreach ($suratkeluar as $surat)
                    <h4 class="card-title mb-3"><b>{{ $surat->user->name }} <i class="bi bi-chat-quote"></i></b></h4>
                    <div class="">

                        <h6 class="card-title mt-2"><i class="bi bi-dash-lg"></i> {{ $surat->jenissurat['namejenis'] }} <i class="bi bi-dash-lg"></i></h6>
                        <h6 class="card-title"><i class="bi bi-dash-lg"></i> {{ $surat->sifatsurat['namesifat'] }} <i class="bi bi-dash-lg"></i></h6>
                    </div>
                    <a class="btn btn-primary mt-3" href="#">Buka Surat</a>
                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">Terakhir {{ $surat->created_at->diffForHumans() }}</small>
                </div>
                @endforeach
            </div>
            </div>
        </div>
        
    </div>
    
    
        
        
@endsection