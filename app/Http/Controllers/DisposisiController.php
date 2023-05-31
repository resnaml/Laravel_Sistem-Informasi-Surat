<?php

namespace App\Http\Controllers;
use App\Models\Disposisisurat;
use App\Models\Suratkeluar;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rule;

class DisposisiController extends Controller
{
    /* 
        Halaman Disposisi Surat Masuk
    */
    public function index(Suratkeluar $suratkeluar){
        return view('dashboard.disposisi.create', [
            'surat' => $suratkeluar
        ]);
    }

    /*
        Store Data -> Disposisi Surat Masuk By: Admin 
    */
    public function store(Request $request, Suratkeluar $suratkeluar , Disposisisurat $diposisi)
    {   
        $array =[
            'status' => 'required',
            'disposisi_isi' => 'nullable',
            'print_surat' => 'nullable'
        ];
        $validatedData['disposisi_id'] = ($diposisi->id);
        $validatedData = $request->validate($array);
        Suratkeluar::where('id', $suratkeluar->id)->update($validatedData);

        $validatedData = $request->validate([
            'disposisi_oleh' => 'nullable',
            'isi_ditolak' => 'nullable'
        ]);
        $validatedData['disposisi_id'] = ($suratkeluar->id);
        $validatedData['no_disposisi'] = ($suratkeluar->jenissurat['kodesurat'] . "/" . substr($suratkeluar->tgl_surat_keluar, 5, 2) . "/" . substr($suratkeluar->tgl_surat_keluar, 2, 2) . "/" . $suratkeluar->no_surat_keluar);
        Disposisisurat::create($validatedData);

        return redirect('/dashboard/surat')->with('success','Surat Masuk, Berhasil di Disposisi !!!');
    }
}
