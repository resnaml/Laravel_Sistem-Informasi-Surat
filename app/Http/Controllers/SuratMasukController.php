<?php

namespace App\Http\Controllers;

use App\Models\jenissurat;
use App\Models\Sifatsurat;
use App\Models\Suratkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratMasukController extends Controller
{
    /* 
        Halaman Disposisi Surat Masuk
    */
    public function index()
    {
        return view('dashboard.surat.index', [
            'suratmasuk' => Suratkeluar::all()
        ]);
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
            'surats' => Suratkeluar::latest()->paginate(10)->withQueryString()
        ]);
    }

    /* 
        Cetak Surat Keseluruhan
    */
    public function cetakSeluruhSurat()
    {
        $suratkeluar = Suratkeluar::with('jenissurat')->get();
        return view('dashboard.surat.cetak_seluruh', compact('suratkeluar'));
    }

    /*
        Cari Surat di Seluruh Surat
    */
    public function search()
    {
        
    }

    /* 
        Cetak Surat per Bulan
    */
    public function cetakPerBln($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal,"Tanggal Akhir :".$tglakhir]);
        $surat = Suratkeluar::with('jenissurat')->whereBetween('tgl_surat_keluar', [$tglawal, $tglakhir])->get();
        return view('dashboard.surat.cetak_surat_tgl', compact('surat'));
    }

    /* Cari surat per Range Bulan */
    // public function search2(Request $request)
    // {
    //     $fromDate = $request->input('fromDate');
    //     $toDate = $request->input('toDate');

    //     $query = DB::table('suratkeluars')->select()
    //         ->where('created_at', '>=', $fromDate)
    //         ->where('created_at', '<=', $toDate)
    //         ->get();
    //     dd($query);

    //     // $surat = DB::table('suratkeluars')
    //     // ->select('kode_surat','created_at','tgl_surat_keluar')
    //     // ->get();
    //     // dd($surat);
    //     return view('dashboard.surat.seluruh', compact('query'));
    // }

}
