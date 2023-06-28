@extends('layouts.main')

@section('container')

    <link rel="stylesheet" href="/css/blog.css">

<body class="bg-light">

    <h2 class="text-center text-bold mt-3">Panduan Melakukan Pengajuan Surat</h2>

    <hr>

    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex text-center flex-column position-static"><hr>
                    <i class="bi bi-1-square" style="font-size: 2.0rem;"></i>
                    <strong class="mb-1"></strong>
                    <h3 class="mb-0">Daftar Akun</h3>
                    <p class="card-text mb-auto">Minta kepada Admin, untuk memasukan (NIP) agar dapat mendaftar akun.</p>
                    <strong class="mb-1"><hr></strong>
                </div>
                <div class="col-auto container mt-3 d-none d-lg-block">
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex text-center flex-column position-static"><hr>
                    <i class="bi bi-2-square" style="font-size: 2.0rem;"></i>
                    <strong class="mb-1"></strong>
                    <h3 class="mb-0">Buat Surat</h3>
                    <p class="card-text mb-auto">Masuk menu surat keluar, lalu pilih jenis surat & sifat, lalu pilih User tujuan surat</p>
                    <strong class="mb-1"><hr></strong>
                </div>
                <div class="col-auto container mt-3 d-none d-lg-block">
                {{-- <img src="/img/pengajuan.png" class="rounded" width="230" height="200"> --}}
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex text-center flex-column position-static"><hr>
                    <i class="bi bi-3-square" style="font-size: 2.0rem;"></i>
                    <strong class="mb-1"></strong>
                    <h3 class="mb-0">Disposisi</h3>
                    <p class="card-text mb-auto">Jika sudah membuat, Tunggu admin untuk Disposisi surat anda.</p>
                    <strong class="mb-1"><hr></strong>
                </div>
                <div class="col-auto container mt-3 d-none d-lg-block">
                {{-- <img src="/img/status.png" class="rounded" width="230" height="200"> --}}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex text-center flex-column position-static"><hr>
                    <i class="bi bi-4-square" style="font-size: 2.0rem;"></i>
                    <strong class="mb-1"></strong>
                    <h3 class="mb-0">Hasil</h3>
                    <p class="card-text mb-auto">Jika surat sudah Disetujui maka surat sudah terkirim kepada user yang dituju, dan bisa download PDF</p>
                    <strong class="mb-1"><hr></strong>
                </div>
                <div class="col-auto container mt-3 d-none d-lg-block">
                {{-- <img src="/img/hasil.png" class="rounded" width="230" height="200"> --}}
                </div>
            </div>
        </div>

    </div>

</body>

@endsection