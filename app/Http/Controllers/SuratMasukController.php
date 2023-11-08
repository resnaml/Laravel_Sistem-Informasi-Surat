<?php

namespace App\Http\Controllers;

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
        $suratmasuk = Suratkeluar::persetujuan();
        return view('main.layout.admin.suratmasuk', compact('suratmasuk'));
    }

    /* 
        Halaman Show Deatil Diposisi Surat Masuk
    */
    public function edit(Suratkeluar $suratkeluar)
    {
        return view('main.layout.admin.persetujuan', [
            'title' => $suratkeluar->full_number,
            'jenis' => $suratkeluar->jenissurat['namejenis'],
            'sifat' => $suratkeluar->sifatsurat['namesifat'],
            'tgl' => $suratkeluar->tgl_surat_keluar,
            'pembuat' => $suratkeluar->user->username,
            'print' => $suratkeluar->print_surat
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
        $pdf = PDF::loadView('main.utils.surat.cetak-seluruh', $surats);
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
        $pdf = PDF::loadView('main.utils.surat.cetak-bln', $surats);
        return $pdf->download('Laporan Surat PerBulan.pdf');
    }

    public function destroy(Suratkeluar $suratkeluar)
    {
        Suratkeluar::destroy($suratkeluar->id);
        return redirect('/seluruhsurat')->with('danger','Data Surat berhasil terhapus !!!');
    }

}
