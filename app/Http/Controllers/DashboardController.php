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
        $suratKeluarCount = Suratkeluar::where('acc_admin', 0)->get()->count();
        
        $disposisi = Suratkeluar::where('print_surat', 1)->where('disposisi_isi', 0)->get()->count();

        $suratme = Suratkeluar::where('kepada',  auth()->user()->id)->where('disposisi_isi', 1)->get()->count();
        
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
        return view('main.layout.home', compact('suratKeluarCount','userCount','suratallCount', 'data', 'months','monthCount','pengarsipanCount','disposisi','suratme'));
    }

    /* 
        Halaman Show Akun
    */
    public function ShowAkun(User $user)
    {   
        return view('main.layout.profile',compact('user'));
    }

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
        $surats = [
            'surat' => $suratkeluar
        ];
        return PDF::loadView('dashboard.mypdf', $surats)->setPaper('a4')->download('Suratku.pdf');
    }

    /*
        Hapus Surat Saya
    */
    public function hapusSurat(Suratkeluar $suratkeluar)
    {
        Suratkeluar::destroy($suratkeluar->id);
        return redirect('/suratsaya')->with('danger','Data surat keluar berhasil terhapus !!!');
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

