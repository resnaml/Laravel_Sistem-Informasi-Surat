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
                <h3 class="card-title mb-3">$pengirim</h3>
                {{-- <h4 class="card-title">$jenis surat</h4>
                <h5 class="card-title">$sifat surat</h5> --}}
                <button class="btn btn-primary">Buka Surat</button>
                {{-- <p class="card-text">$isi</p> --}}
                </div>
                <div class="card-footer">
                <small class="text-body-secondary">Terakhir 3 menit yang lalu</small>
                </div>
            </div>
            </div>
        </div>
        
    </div>
    
    
        
        
@endsection