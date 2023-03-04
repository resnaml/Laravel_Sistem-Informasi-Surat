<?php

namespace App\Http\Controllers;

use App\Models\Pengarsipan;
use App\Models\User;
use App\Models\Suratkeluar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;

class DashboardController extends Controller
{
    /* 
        Halaman Dashboard 
    */
    public function index(User $user)
    {
        $surat = Suratkeluar::get();
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

        return view('dashboard.index', compact('surat','suratKeluarCount','suratDisposisiCount','userCount','suratallCount', 'data', 'months','monthCount','pengarsipanCount'));
    }

    /* 
        Halaman Show Akun
    */
    public function ShowAkun(User $user)
    {   
        $name = auth()->user()->name;
        $username = auth()->user()->username;
        $email = auth()->user()->email;
        $alamat = auth()->user()->alamat;
        $telepon = auth()->user()->telepon;
        $tgl_lahir = auth()->user()->tgl_lahir;
        $jabatan = auth()->user()->jabatan;
        
        return view('dashboard.viewakun',compact('name', 'username', 'email', 'jabatan','alamat','telepon','tgl_lahir'));
    }

    /*
        Halaman Edit Akun
    */
    public function EditAkun(User $user)
    {
        return view('dashboard.editakun',compact('user'));
    }

    /*
        Halaman Front End Status Surat
    */
    public function StatusSurat()
    {
        return view('status',[
            "title" => "Status Surat",
            "surats" => Suratkeluar::latest()->filter(request(['search','jenissurat']))->paginate(6)->withQueryString()
        ]);
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
            "title" => "about"
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

