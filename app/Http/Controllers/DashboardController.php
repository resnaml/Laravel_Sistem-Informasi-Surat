<?php

namespace App\Http\Controllers;

use App\Models\Pengarsipan;
use App\Models\User;
use App\Models\Suratkeluar;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /* 
        Halaman Dashboard     
    */
    
    public function index()
    {
        $suratKeluarCount = Suratkeluar::persetujuan()->count();
        
        $disposisi = Suratkeluar::DisposisiKepala()->count();

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
    public function profileKu()
    {   
        return view('main.layout.profile');
    }

    

    /*
        Halaman Front End Home
    */
    public function home()
    {
        return view('front-end.home',[
            "title" => "home"
        ]);
    }
    
    /*
        Halaman Front End About
    */
    public function about()
    {
        return view('front-end.about',[
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
        return view('front-end.panduan',[
            "title" => "panduan"
        ]);
    }    
}

