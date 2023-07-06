<?php

namespace App\Http\Controllers;

use App\Models\Pengarsipan;
use App\Models\User;
use App\Models\Suratkeluar;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;

use Dflydev\DotAccessData\Data;

class DashboardController extends Controller
{
    /* 
        Halaman Dashboard 
    */
    public function index(User $user)
    {
        
        $suratKeluarCount = Suratkeluar::where('disposisi_isi', 0)->get()->count();
        $suratDisposisiCount = Suratkeluar::where('user_id', auth()->user()->id)->get()->count();
        $userCount = User::get()->count();
        $suratallCount = Suratkeluar::get()->count();
        $pengarsipanCount = Pengarsipan::get()->count();

        $data = Suratkeluar::select('id', 'created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });
        $months=[];
        $monthCount=[];
        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }

        return view('dashboard.index', compact('suratKeluarCount','suratDisposisiCount','userCount','suratallCount', 'data', 'months','monthCount','pengarsipanCount'));
    }

    /* 
        Halaman Show Akun
    */
    public function ShowAkun(User $user)
    {   
        $all = User::all();
        $collect = collect($all);
        $user = $collect->whereIn('id', auth()->user()->id);
        return view('dashboard.viewakun',compact('user'));
    }

    /*
        Surat Saya
    */ 
    public function suratSaya()
    {
        $suratkeluar = Suratkeluar::where('kepada', auth()->user()->id)->where('print_surat','=' ,1)->get();
        $jumlahMasuk = Suratkeluar::where('kepada', auth()->user()->id)->count();
        return view('dashboard.surat-saya',compact('suratkeluar','jumlahMasuk'));
    }

    /*
        Buka Surat Generate PDF
    */
    public function bukaSuratPDF(Suratkeluar $suratkeluar)
    {
        $surats = [
            'surat' => $suratkeluar
        ];
        
        $pdf = PDF::loadView('dashboard.mypdf', $surats);
        return $pdf->download('Suratku.pdf');
    }

    /*
        Hapus Surat Saya
    */
    public function hapusSurat(Suratkeluar $suratkeluar)
    {
        Suratkeluar::destroy($suratkeluar->id);
        return redirect('/dashboard/suratsaya')->with('danger','Data surat keluar berhasil terhapus !!!');
    }

    /*
        Halaman Front End Home
    */
    public function home()
    {
        return view('home',[
            "title" => "home"
        ]);
    }
    
    /*
        Halaman Front End About
    */
    public function about()
    {
        return view('about',[
            "title" => "about",
            "name" => "Resna Mulya",
            "email" => "resnamulyal@gmail.com"
        ]);
    }
    
    /*
        Halaman Front End Panduan
    */
    public function panduan()
    {
        return view('panduan',[
            "title" => "panduan"
        ]);
    }    
}

