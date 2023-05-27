@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
        <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
    </div>

    <div class="border-bottom border-dark">
        <a class="btn btn-primary mb-2 me-2" href="/dashboard/viewakun"><i class="bi bi-file-person"></i> My akun</a>
    </div>
    
    <div class="card-group mt-4">
        
        
        <div class="card container" style="max-width: 18rem;">
            <div class="card-header">Surat Keluar Saya
                <div class="h4 border mt-2">  {{ $suratDisposisiCount }} </div>
            </div>
            <div class="card-body">
                <i class="bi bi-envelope-paper" style="font-size: 4.0rem;"></i>
            </div>
        </div>

        @if(auth()->user()->is_admin == 1)
        <div class="card" style="max-width: 18rem;">
            <div class="card-header">Surat Disposisi  
            <div class="mt-2 h4 bold border">{{ $suratKeluarCount }}</div>
            </div>
            <div class="card-body">
                <i class="bi bi-envelope-exclamation" style="font-size: 4.0rem;"></i>
            </div>
        </div>

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
        @endif
    </div>

    @if(auth()->user()->is_admin == 1)
    <div class="card mt-4 mb-3 border-dark">
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
        @endif
        
        
        <script type="text/javascript">
            var _ydata=JSON.parse( '{!! json_encode($months) !!}' );
            var _xdata=JSON.parse( '{!! json_encode($monthCount) !!}' );
        </script>

<script>
        // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

        // Bar Chart Example
        var ctx = document.getElementById("myBarChart");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: _ydata,
                datasets: [{
                label: "Registration",
                backgroundColor: "rgba(2,117,216,1)",
                borderColor: "rgba(2,117,216,1)",
                data: _xdata,
                }],
            },
            options: {
                scales: {
                xAxes: [{
                    time: {
                    unit: 'month'
                    },
                    gridLines: {
                    display: false
                    },
                    ticks: {
                    maxTicksLimit: 6
                    }
                }],
                yAxes: [{
                    ticks: {
                    min: 0,
                    max: 20,
                    maxTicksLimit: 5
                    },
                    gridLines: {
                    display: true
                    }
                }],
                },
                legend: {
                display: false
                }
            }
            });
</script>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#0a0a0a';

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: _ydata,
            datasets: [{
            label: "Sessions",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(7, 237, 157, 1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: _xdata,
            }],
        },
        options: {
            scales: {
            xAxes: [{
                time: {
                unit: 'date'
                },
                gridLines: {
                display: false
                },
                ticks: {
                maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                min: 0,
                max: 20,
                maxTicksLimit: 5
                },
                gridLines: {
                color: "rgba(0, 0, 0, .125)",
                }
            }],
            },
            legend: {
            display: false
            }
        }
        });
</script>
        
@endsection