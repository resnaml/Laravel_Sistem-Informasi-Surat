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

        // Ttd Store
        $folderPath = public_path('tandaTangan/');

        $image_parts = explode(';base64',$request->ttd);

        $image_type_aux = explode('image/', $image_parts[0]);
        
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath.uniqid().'.'.$image_type;
        file_put_contents($file,$image_base64);

        $validatedData = $request->validate([
            'disposisi_oleh' => 'nullable',
            'isi_ditolak' => 'nullable'
        ]);
        $validatedData['disposisi_id'] = ($suratkeluar->id);
        $validatedData['no_disposisi'] = ($suratkeluar->jenissurat['kodesurat'] . "/" . substr($suratkeluar->tgl_surat_keluar, 5, 2) . "/" . substr($suratkeluar->tgl_surat_keluar, 2, 2) . "/" . $suratkeluar->no_surat_keluar);

        $validatedData['ttd'] = ($file);
        Disposisisurat::create($validatedData);

        return redirect('/dashboard/surat')->with('success','Surat Masuk, Berhasil di Disposisi !!!');
    }

    function indexDisposisi()
    {
        $suratkeluar = Suratkeluar::where('print_surat', 0)->where('disposisi_isi', 1)->get();
        
        return view('dashboard.disposisi.index',compact('suratkeluar'));
    }

    function diposisiCreate(Suratkeluar $suratkeluar)
    {
        // dd($suratkeluar);
        return view('dashboard.disposisi.sign', [
            'surat' => $suratkeluar
        ]);
    }
}
