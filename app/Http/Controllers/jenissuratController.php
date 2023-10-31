<?php

namespace App\Http\Controllers;
use App\Models\jenissurat;
use Illuminate\Http\Request;

class jenissuratController extends Controller
{
    /* 
        Halaman Jenis Surat
    */
    public function index()
    {
        $jenis = jenissurat::all()->map->only('id','kodesurat','namejenis');
        // dd($jenis);

        return view('main.layout.admin.jenis',compact('jenis'));
    }

    /*
        Store data -> Jenis Surat
    */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kodesurat' => 'required|max:4|unique:jenissurats',
            'namejenis' => 'required|max:20'
        ]);
    jenissurat::create($validatedData);
    return redirect('/jenissurat');
    }

    /*
        Hapus Data -> Jenis Surat
    */
    public function destroy(jenissurat $jenis)
    {
        jenissurat::destroy($jenis->id);
        return redirect('/jenissurat');
    }
}
