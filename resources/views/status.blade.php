@extends('layouts.main')

@section('container')

<body class="bg-light">

<main>
        <h1 class="text-center mb-3">{{ $title }}</h1>

        <div class="row justify-content-center mb-1">
            <div class="col-md-6 conten-justify">
                <form action="/status">
                    @if (request('jenissurat'))
                        <input type="hidden" name="jenissurat" value="{{ request('jenissurat') }}">
                    @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Surat..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" id="button-addon2" type="submit" ><i class="bi bi-search"></i> Cari...</button>
                </div>
                </form>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="row">
                @foreach ($surats as $surat)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <div class="position-absolute bg-dark p-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">{{ $surat->created_at->diffForHumans() }}</div>
                        <img src="https://source.unsplash.com/400x400/?envelope" class="card-img-top" alt="..." height="225" width="300">
                        <div class="card-body text-center">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item h4 border border-primary">{{ $surat->jenissurat['kodesurat'] ?? '' }}-{{ str_pad($surat->no_surat_keluar, 4, '0', STR_PAD_LEFT) }}</li>
                            <li class="list-group-item"><p class="card-text mt-0">Surat Keluar :<b> {{ $surat->user['name'] }}</b></p></li>
                            <small href="#" class="btn btn-info col-5 mt-3 container">{{ $surat->status }}</small>
                        </ul>
                        </div>
                    </div>
                    </div>
                    @endforeach 
            </div>
        </div>     
</main>

    <footer class="d-flex justify-content-end">
        <div class="container">
            {{ $surats->links() }}
        </div>
    </footer>
    
</body>

@include('dashboard.layouts.footer')

@endsection