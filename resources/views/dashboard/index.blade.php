@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
        <h1 class="h2">Selamat Datang, <span class="text-uppercase">{{ auth()->user()->username }}</span></h1>
    </div>

    <div class="container-fluid mt-3">
        <div class="row">

            <div class="col-lg-3 col-4 text-center mb-2">
                <div class="card bg-info flex-md-row position-relative">
                    <i class="bi bi-envelope-paper mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Surat Keluar Saya</h5>
                        <h3 class=" btn-outline-dark text-bold">{{ $suratDisposisiCount }}</h3>
                    </div>
                </div>
            </div>

            @can('kepala')
            <div class="col-lg-3 col-4 text-center">
                <div class="card bg-danger flex-md-row position-relative">
                    <i class="bi bi-journal-check mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Surat Disposisi</h5>
                        <h3 class=" btn-outline-dark text-bold">{{ $suratKeluarCount }}</h3>
                    </div>
                </div>
            </div>
            @endcan

            @can('admin')
            <div class="col-lg-3 col-4 text-center">
                <div class="card bg-primary flex-md-row position-relative">
                    <i class="bi bi-mailbox mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Seluruh Surat</h5>
                        <h3 class=" btn-outline-dark text-bold">{{ $suratallCount }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-4 text-center">
                <div class="card bg-success flex-md-row position-relative">
                    <i class="bi bi-safe2 mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body rounded border-dark">
                        <h5 class="card-title">Jumlah Pengarsipan</h5>
                        <h3 class=" btn-outline-dark text-bold">{{ $pengarsipanCount }}</h3>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-4 text-center">
                <div class="card bg-warning flex-md-row position-relative">
                    <i class="bi bi-people-fill mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Jumlah User</h5>
                        <h3 class=" btn-outline-dark text-bold">{{ $userCount }}</h3>
                    </div>
                </div>
            </div>
        
        
        <div class="card mt-4 mb-3 border border-dark">
            <div class="row mt-4 container">
                <div class="col-xl-6">
                    <div class="card-header text-bg-dark">
                        <i class="bi bi-graph-up-arrow"></i> Chart Surat
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
    
                <div class="col-xl-6">
                    <div class="card-header text-bg-dark">
                        <i class="bi bi-reception-4"></i> Grafik Surat
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas>
                    </div>
                </div>
                </div>
        </div>
        @endcan

    </div>

    
    {{-- <div class="card-group mt-4">
        <div class="card container border" style="max-width: 18rem;">
            <div class="card-header">Surat Keluar Saya
                <div class="h4 border mt-2">  {{ $suratDisposisiCount }} </div>
            </div>
            <div class="card-body">
                <i class="bi bi-envelope-paper" style="font-size: 4.0rem;"></i>
            </div>
        </div>
        
        
        
        @can('kepala')
        <div class="card container" style="max-width: 18rem;">
            <div class="card-header">Surat Disposisi  
            <div class="mt-2 h4 bold border">{{ $suratKeluarCount }}</div>
            </div>
            <div class="card-body">
                <i class="bi bi-journal-check" style="font-size: 4.0rem;"></i>
            </div>
        </div>
        @endcan
        
        @can('admin')
        <div class="card" style="max-width: 18rem;">
            <div class="card-header">Seluruh Surat
                <div class="h4 border mt-2">  {{ $suratallCount }} </div>
            </div>
            <div class="card-body">
                <i class="bi bi-mailbox" style="font-size: 4.0rem;"></i>
            </div>
        </div>
        <div class="card" style="max-width: 18rem;">
            <div class="card-header">Pengarsipan 
            <div class="h4 border mt-2">{{ $pengarsipanCount }}</div>
            </div>
            <div class="card-body">
                <i class="bi bi-safe2" style="font-size: 4.0rem;"></i>
            </div>
        </div>
        <div class="card" style="max-width: 18rem;">
            <div class="card-header">Jumlah User 
            <div class="h4 border mt-2">  {{ $userCount }} </div> 
            </div>
            <div class="card-body">
                <i class="bi bi-people-fill" style="font-size: 4.0rem;"></i>
            </div>
        </div>
    </div> --}}

        
        <script type="text/javascript">
            var _ydata=JSON.parse( '{!! json_encode($months) !!}' );
            var _xdata=JSON.parse( '{!! json_encode($monthCount) !!}' );
        </script>

        <script src="/js/chart-bar.js"></script>
        <script src="/js/chart-area.js"></script>

@endsection