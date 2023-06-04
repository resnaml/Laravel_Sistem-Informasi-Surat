<?php

namespace App\Http\Controllers;

use App\Models\jenissurat;
use App\Models\Sifatsurat;
use App\Models\Suratkeluar;
use App\Models\Disposisisurat;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\TemplateProcessor;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SuratKeluarController extends Controller
{
    /*
        Index Surat keluar
    */
    public function index()
    {
        return view('dashboard.suratkeluar.index', [
            'suratkeluar' => Suratkeluar::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /* 
        Cetak Surat / Cetak Laporan Surat
    */
    public function cetakSurat()
    {
        $suratkeluar = Suratkeluar::where('user_id', auth()->user()->id)->with('jenissurat')->get();
        return view('dashboard.suratkeluar.cetak_surat', compact('suratkeluar'));
    }

    /*
        Tampilkan View Untuk Surat keluar
    */
    public function create()
    {
        $all = User::all();
        $collect = collect($all);
        $users = $collect->whereNotIn('id', auth()->user()->id);
        $users->all();
        $jenissurats = jenissurat::all();
        $sifat = Sifatsurat::all();
        return view('dashboard.suratkeluar.create', compact('jenissurats','sifat','users'));
    }
    
    /*
        Store Data -> Surat Keluar 
    */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_surat_keluar' => 'nullable',
            'tgl_surat_keluar' => 'required|date',
            'sifat_id' => 'required',
            'jenissurat_id' => 'required',
            'lampiran' => 'nullable',
            'status' => 'nullable',
            'kepada' => 'required'
        ]);
        
        // $validatedData['kepada'] = ($user_id);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['perihal'] = ($request->perihal);
        Suratkeluar::create($validatedData);
        return redirect('/dashboard/suratkeluar')->with('success','Surat Keluar berhasil terbuat !!!');
    }

    /*
        Show detail surat keluar
    */
    public function show(Suratkeluar $suratkeluar)
    {
        return view('dashboard.suratkeluar.show',[
            'surat' => $suratkeluar
        ]);
    }

    /*
        Edit surat controller
    */  
    public function edit(Suratkeluar $suratkeluar)
    {
        return view('dashboard.suratkeluar.edit', [
            'surat' => $suratkeluar,
            'jenissurats' => jenissurat::all(),
            'sifat' => Sifatsurat::all()
        ]);
    }

    /*
        Update Surat Keluar
    */
    public function update(Request $request, Suratkeluar $suratkeluar)
    {
        $rules =[
            'no_surat_keluar' => 'nullable',
            'tgl_surat_keluar' => 'required',
            'lampiran' => 'nullable',
            'penerima_surat' => 'required',
            'sifat_id' => 'required',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['perihal'] = ($request->perihal);
        Suratkeluar::where('id', $suratkeluar->id)
                    ->update($validatedData);
        return redirect('/dashboard/suratkeluar')->with('warning','Surat Keluar berhasil terbuat !!!');
    }

    /* 
        Hapus surat keluar 
    */
    public function destroy(Suratkeluar $suratkeluar)
    {
        Suratkeluar::destroy($suratkeluar->id);
        return redirect('/dashboard/suratkeluar')->with('danger','Data surat keluar berhasil terhapus !!!');
    }

    /* 
        Export surat ke PDF 
    */
    public function pdfExport(Suratkeluar $suratkeluar)
    {
        $surats = [
            'surat' => $suratkeluar
        ];
        $pdf = PDF::loadView('dashboard.mypdf', $surats);
        return $pdf->download('mypdf.pdf');
    }
    

    // public function KodeSurat(Request $request)
    // {
    //     $no_surat_keluar = SlugService::createSlug(Suratkeluar::class, 'no_surat_keluar', $request->jenissurat_id );
    //     return response()->json(['no_surat_keluar' => $no_surat_keluar]);
    // }
}
