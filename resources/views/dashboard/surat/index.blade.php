@extends('dashboard.layouts.main')

@section('container')
    <div class="border-bottom border-dark d-flex  pt-3 pb-2 mb-2">
        <h2>Persetujuan Surat</h2>
    </div>

    @if(session()->has('warning'))
        <div class="alert alert-warning" role="alert">
            {{ session('warning') }}
        </div>
    @endif

    @if($jumlah == 0)
        
    <h2 class="mt-2">
            <marquee behavior="2" direction="3">
                Belum Pengajuan Surat
            </marquee> 
    </h2>
    @else
    
    <div>
        <div class="table-responsive text-center mt-3">
            <table class="table table-hover">
            <thead class="table table-primary">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Surat</th>
                <th scope="col">Sifat Surat</th>
                <th scope="col">Pembuat Surat</th>
                <th scope="col"><i class="bi bi-clock-fill"></i></th>
                <th scope="col"></th>
                </tr>
            </thead>
            @foreach ($suratmasuk as $surat)
                <tbody>
                <tr>
                    {{-- @@switch($type)
                        @case(1)
                            
                            @break
                        @case(2)
                            
                            @break
                        @default
                            
                    @endswitch --}}
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat['title'] }}</td>
                    @switch($surat['sifat'])
                    @case('Biasa')
                    <td><span class="btn btn-primary">{{ $surat['sifat'] }}</span></td>
                    @break
                    @case('Penting')
                    <td><span class="btn btn-warning">{{ $surat['sifat'] }}</span></td>
                    @break
                    @case('Segera')
                    <td><span class="btn btn-danger">{{ $surat['sifat'] }}</span></td>
                    @break
                    @case('Rutin')
                    <td><span class="btn btn-success">{{ $surat['sifat'] }}</span></td>
                    @break
                    @endswitch
                    <td>{{ $surat['pembuat'] }}</td>
                    <td>{{ $surat['created_at'] }}</td>
                    <td>
                        <a href="/suratmasuk/{{ $surat['title'] }}" class="btn btn-info m-lg-1"><i class="bi bi-clipboard-check" style="font-size: 1.2rem;"></i></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
            </table>
        </div>
    </div>
    @endif


@endsection