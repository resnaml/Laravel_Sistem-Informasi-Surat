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
        Store Data -> Disposisi Surat Masuk By: Admin 
    */
    public function store(Request $request, Suratkeluar $suratkeluar , Disposisisurat $diposisi)
    {   
        $array =[
            'status' => 'nullable',
            'print_surat' => 'nullable',
            'acc_admin' => 'nullable'
        ];
        $validatedData['disposisi_id'] = ($diposisi->id);
        $validatedData = $request->validate($array);
        Suratkeluar::where('id', $suratkeluar->id)->update($validatedData);
        
        if ($request->print_surat == 1) {
            $validatedData['disposisi_id'] = ($suratkeluar->id);
            $validatedData['no_disposisi'] = ($suratkeluar->jenissurat['kodesurat'] . "/" . substr($suratkeluar->tgl_surat_keluar, 5, 2) . "/" . substr($suratkeluar->tgl_surat_keluar, 2, 2) . "/" . $suratkeluar->no_surat_keluar);
        } else {
            $validatedData['disposisi_id'] = ($suratkeluar->id);
            $validatedData['isi_ditolak'] = ($request->isi_ditolak);
        }

        Disposisisurat::create($validatedData);
        return redirect('/suratmasuk')->with('warning','Surat berhasil telah di proses');
    }

    /*
        View Persetujuan Surat Masuk By: Admin 
    */
    function indexDisposisi()
    {
        $suratkeluar = Suratkeluar::where('acc_admin', 1)->where('print_surat', 1)->where('disposisi_isi', 0)->with('disposisi')->orderBy('id','ASC')->get();
        $jumlah = $suratkeluar->count();
        return view('main.layout.kepala.index',compact('suratkeluar','jumlah'));
    }


    /*
        View -> Disposisi Surat By: Kepala 
    */
    function diposisiCreate(Suratkeluar $suratkeluar)
    {
        return view('main.layout.kepala.disposisi', [
            'surat' => $suratkeluar
        ]);
    }

    /*
        Store Data -> Disposisi Surat By: Kepala 
    */
    public function disposisiStore(Request $request,Suratkeluar $suratkeluar)
    {

        $validatedData['disposisi_isi'] = ($request->disposisi_isi);
        $validatedData['status'] = ($request->status);

        Suratkeluar::where('id', $suratkeluar->id)->update($validatedData);
        
        // Ttd Store
        
        $folderPath = public_path('tandaTangan/');
        $image_parts = explode(';base64',$request->ttd);
        $image_type_aux = explode('image/', $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath.uniqid().'.'.$image_type;
        file_put_contents($file,$image_base64);

        $array['ttd'] = ($file);
        $array['disposisi_oleh'] = (auth()->user()->username);
        $suratkeluar->disposisi->forceFill($array)->save();
        return redirect('/diposisi');
        
    }
}
