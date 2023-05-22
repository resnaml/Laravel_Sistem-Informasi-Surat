@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
        <h1 class="h2">Surat Untuk : {{ auth()->user()->name }}</h1>
    </div>

    <div class="">
        <h4>-----</h4>
    </div>
    
    
        
        
@endsection