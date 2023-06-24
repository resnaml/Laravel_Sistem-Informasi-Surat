<?php

namespace App\Http\Controllers;

use App\Models\jenissurat;
use App\Models\Sifatsurat;
use App\Models\Suratkeluar;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    /* 
        Halaman Disposisi Surat Masuk
    */
    public function index()
    {
        
        $suratmasuk = Suratkeluar::where('disposisi_isi', 0)->get();
        $jumlah = Suratkeluar::where('disposisi_isi', 0)->count();
        return view('dashboard.surat.index', compact('suratmasuk','jumlah'));
    }

    /* 
        Halaman Show Deatil Diposisi Surat Masuk
    */
    public function edit(Suratkeluar $suratkeluar)
    {
        return view('dashboard.surat.disposisi', [
            'surat' => $suratkeluar,
            'jenissurats' => jenissurat::all(),
            'sifat' => Sifatsurat::all()
        ]);
    }
    
    /*
        Halaman Tampilkan Seluruh Surat 
    */
    public function seluruhSurat()
    {
        return view('dashboard.surat.seluruh',[
            'surats' => Suratkeluar::latest()->filter(request(['search','jenissurat']))->paginate(10)->withQueryString()
        ]);
    }

    /* 
        Cetak Surat Keseluruhan
    */
    public function cetakSeluruhSurat()
    {
        $suratkeluar = Suratkeluar::with('jenissurat')->get();
        $surats = [
        'suratkeluar' => $suratkeluar 
        ];
        $pdf = PDF::loadView('dashboard.surat.cetak_seluruh', $surats);
        return $pdf->download('Laporan Seluruh Surat.pdf');
    }

    /* 
        Cetak Surat per Bulan
    */
    public function cetakPerBln($tglawal, $tglakhir)
    {
        $surat = Suratkeluar::with('jenissurat')->whereBetween('tgl_surat_keluar', [$tglawal, $tglakhir])->get();
        $surats = [
            'surat' => $surat
        ];
        $pdf = PDF::loadView('dashboard.surat.cetak_surat_tgl', $surats);
        return $pdf->download('Laporan Surat PerBulan.pdf');
    }

}
