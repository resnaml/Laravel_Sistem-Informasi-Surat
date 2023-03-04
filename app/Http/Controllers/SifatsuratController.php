<?php

namespace App\Http\Controllers;

use App\Models\Sifatsurat;
use Illuminate\Http\Request;

class SifatsuratController extends Controller
{
    /*
        Halaman Sifat Surat -> Admin 
    */
    public function index()
    {
        return view('dashboard.sifatsurat.index',
        [
            'sifat' => Sifatsurat::all()
        ]);
    }

    /*
        Halaman Buat Sifat Surat -> Admin
    */
    public function create()
    {
        return view('dashboard.sifatsurat.create');
    }

    /*
        Store Sifat Surat -> Admin 
    */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namesifat' => 'required|max:10|unique:sifatsurats'
        ]);
        Sifatsurat::create($validatedData);
        return redirect('/dashboard/sifatsurat')->with('success','Sifat Surat Berhasil Terbuat !');
    }

    /*
        Hapus Sifat Surat/Admin
    */
    public function destroy(Sifatsurat $s)
    {
        Sifatsurat::destroy($s->id);
        return redirect('/dashboard/sifatsurat')->with('danger','Sifat surat berhasil terhapus !!!');
    }
}
