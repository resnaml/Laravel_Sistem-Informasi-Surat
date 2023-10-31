<?php

namespace App\Http\Controllers;

use App\Models\Pengarsipan;
use Illuminate\Http\Request;
use App\Models\Kategoriarsip;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PengarsipanController extends Controller
{
    // Index View 
    public function index()
    {
        $berguna = Pengarsipan::where('kategori_arsip_id', 1)->get()->count();
        $penting = Pengarsipan::where('kategori_arsip_id', 2)->get()->count();
        $vital = Pengarsipan::where('kategori_arsip_id', 3)->get()->count();
        $dinamis = Pengarsipan::where('kategori_arsip_id', 4)->get()->count();
        $arsip = Pengarsipan::latest()->filter(request(['search']))->paginate(10)->withQueryString();

        return view('main.layout.admin.pengarsipan', compact('berguna','penting','vital','dinamis','arsip'));
    }

    // View Kategori
    public function create()
    {
        return view('main.layout.admin.buat-arsip',[
            'kategori' => Kategoriarsip::all()->map->only('id','arsip_kategori')
        ]);
    }

    // Store Data Pengarsipan
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:35|min:5',
            'kategori_arsip_id' => 'required',
            'file_arsip' => 'required|file|mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx',
            'kodearsip' => 'nullable',
            'full_kode' => 'nullable'
        ]);
        $validatedData['arsip_user'] = auth()->user()->id;
        if($request->file('file_arsip')) {
            $validatedData['file_arsip'] = $request->file('file_arsip')->store('dokument');
        }
        
        Pengarsipan::create($validatedData);
        return redirect('/pengarsipan')->with('success','Data Arsip Berhasil Dibuat !!! ');
    }

    // Download Data
    public function download($id) 
    
    {
        $data = DB::table('pengarsipans')->where('id',$id)->first();
        $file_path = storage_path("app/public/{$data->file_arsip}"); 
        return Response::download($file_path);
    }

    // Delete Data
    public function destroy(Pengarsipan $pengarsipan)
    {
        if($pengarsipan->file_arsip)
        {
            Storage::delete($pengarsipan->file_arsip);
        }
        Pengarsipan::destroy($pengarsipan->id);
        return redirect('/pengarsipan');
    }
}
