<?php

namespace App\Http\Controllers;
use App\Models\Disposisisurat;
use App\Models\Suratkeluar;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rule;

class DisposisiController extends Controller
{
    /* Halaman Disposisi Surat Masuk */
    public function index(Suratkeluar $suratkeluar){
        return view('dashboard.disposisi.create',[
            'surat' => $suratkeluar
        ]);
    }

    /* Store data / Disposisi Surat masuk/Admin */
    public function store(Request $request, Suratkeluar $suratkeluar,User $user)
    {   
        $array =[
            'status' => 'required',
            'disposisi_isi' => 'nullable',
            'print_surat' => 'nullable'
        ];

        $validatedData = $request->validate($array);
        Suratkeluar::where('id', $suratkeluar->id)->update($validatedData);

        $validatedData = $request->validate([
            'no_disposisi' => 'nullable',
            'disposisi_oleh' => 'nullable',
            'isi_ditolak' => 'nullable'
            
        ]);
        $validatedData['disposisi_id'] = ($suratkeluar->id);
        // $validatedData['disposisi_oleh'] = ($user->id);
        Disposisisurat::create($validatedData);
        return redirect('/dashboard/surat')->with('success','Surat Masuk, Berhasil di Disposisi !!!');
    }
}
