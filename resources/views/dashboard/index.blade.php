@extends('dashboard.layouts.main')

@section('container')
    <div class="pt-3 pb-2 mb-3 border-bottom border-dark">
        <h1 class="h2">Selamat Datang, <span class="text-uppercase">{{ auth()->user()->username }}</span></h1>
    </div>

    <div class="container-fluid mt-3">
        <div class="row text-center">

            <div class="col-lg-3 col-4 mt-2">
                <div class="card bg-info flex-md-row position-relative">
                    <i class="bi bi-envelope-paper mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Surat Keluar Saya</h5>
                        <a class="btn bg-dark btn-outline-dark text-white">{{ $suratsaya }}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-4 mt-2">
                <div class="card bg-light flex-md-row position-relative">
                    <i class="bi bi-envelope-exclamation-fill mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Surat Untuk Saya</h5>
                        <a href="/suratsaya" class="btn bg-dark btn-outline-dark text-white">{{ $suratme }}</a>
                    </div>
                </div>
            </div>

            @can('kepala')
            <div class="col-lg-3 col-4 mt-2">
                <div class="card bg-secondary flex-md-row position-relative">
                    <i class="bi bi-pen mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Menunggu Disposisi</h5>
                        <a href="/diposisikepala" class="btn bg-dark btn-outline-dark text-white">{{ $disposisi }}</a>
                    </div>
                </div>
            </div>
            @endcan
            
            @can('admin')
            <div class="col-lg-3 col-4 mt-2">
                <div class="card bg-danger flex-md-row position-relative">
                    <i class="bi bi-journal-check mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Menunggu Perersetujuan</h5>
                        <a href="/suratmasuk" class="btn bg-dark btn-outline-dark text-white">{{ $suratKeluarCount }}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-4 mt-2">
                <div class="card bg-primary flex-md-row position-relative">
                    <i class="bi bi-mailbox mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Seluruh Surat</h5>
                        <a class="btn bg-dark btn-outline-dark text-white">{{ $suratallCount }}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-4 mt-2">
                <div class="card bg-success flex-md-row position-relative">
                    <i class="bi bi-safe2 mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body rounded border-dark">
                        <h5 class="card-title">Jumlah Pengarsipan</h5>
                        <a class="btn bg-dark btn-outline-dark text-white">{{ $pengarsipanCount }}</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-4 mt-2">
                <div class="card bg-warning flex-md-row position-relative">
                    <i class="bi bi-people-fill mx-3 me-3 mt-2" style="font-size: 4.0rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Seluruh User</h5>
                        <a class="btn bg-dark btn-outline-dark text-white">{{ $userCount }}</a>
                    </div>
                </div>
            </div>
        
        <div class="card container mt-4 mb-3 border border-dark">
            <div class="row mt-4">
                <div class="col-6">
                    <div class="card-header text-bg-dark">
                        <i class="bi bi-graph-up-arrow"></i> Chart Surat
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
    
                <div class="col-6">
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

    

        <script type="text/javascript">
            var _ydata=JSON.parse( '{!! json_encode($months) !!}' );
            var _xdata=JSON.parse( '{!! json_encode($monthCount) !!}' );
        </script>

        <script src="/js/chart-bar.js"></script>
        <script src="/js/chart-area.js"></script>

@endsection