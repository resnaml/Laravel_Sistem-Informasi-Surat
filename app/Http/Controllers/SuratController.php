<?php

namespace App\Http\Controllers;

use App\Models\Suratkeluar;
use Barryvdh\DomPDF\Facade\PDF;


class SuratController extends Controller
{
    /*
        Surat Saya
    */ 
    public function suratSaya()
    {
        $suratkeluar = Suratkeluar::where('kepada', auth()->user()->id)->where('disposisi_isi' , 1)->get();
        return view('main.surats.surat-saya',compact('suratkeluar'));
    }

    /*
        Buka Surat Generate PDF
    */
    public function bukaSuratPDF(Suratkeluar $suratkeluar)
    {
        $surat = [
            'title' => $suratkeluar->full_number,
            'tgl' => date('d M Y', strtotime($suratkeluar->tgl_surat_keluar)),
            'no' => $suratkeluar->disposisi['no_disposisi'],
            'jenis' => $suratkeluar->jenissurat['namejenis'],
            'isi' => $suratkeluar->perihal,
            'ttd' => $suratkeluar->disposisi['ttd'],
            'oleh' =>  $suratkeluar->disposisi['disposisi_oleh']
        ];
        return PDF::loadView('main.utils.surat.mypdf', $surat)->setPaper('a4')->download('Suratku.pdf');
    }

    /*
        Hapus Surat Saya
    */
    public function hapusSurat(Suratkeluar $suratkeluar)
    {
        Suratkeluar::destroy($suratkeluar->id);
        return redirect('/surats');
    }
}
