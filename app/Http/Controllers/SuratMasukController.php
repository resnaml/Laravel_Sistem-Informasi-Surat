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
        $suratmasuk = Suratkeluar::with('sifatsurat')->with('user')->where('acc_admin', 0)->get()->map(function($query){
            return [
                'id' => $query->id,
                'title' => $query->full_number,
                'created_at' => $query->created_at->diffForHumans(),
                'sifat' => $query->sifatsurat->namesifat,
                'pembuat' => $query->user->username
                ];
        });
        
        return view('main.layout.admin.suratmasuk', compact('suratmasuk'));
    }

    /* 
        Halaman Show Deatil Diposisi Surat Masuk
    */
    public function edit(Suratkeluar $suratkeluar)
    {
        return view('main.layout.admin.persetujuan', [
            'surat' => $suratkeluar
        ]);
    }
    
    /*
        Halaman Tampilkan Seluruh Surat 
    */
    public function seluruhSurat()
    {
        return view('main.layout.admin.seluruh',[
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

    public function destroy(Suratkeluar $suratkeluar)
    {
        Suratkeluar::destroy($suratkeluar->id);
        return redirect('/seluruhsurat')->with('danger','Data Surat berhasil terhapus !!!');
    }

}
