<?php

namespace App\Http\Controllers;
use App\Models\jenissurat;
use Illuminate\Http\Request;

class jenissuratController extends Controller
{
    /* Halaman Jenis Surat */
    public function index()
    {
        return view('dashboard.jenissurat.index',[
            'jenissurat' => jenissurat::all(),
            'title' => 'jenissurat'
        ]);
    }

    /* Halaman Buat Jenis Surat */
    public function create()
    {
        return view('dashboard.jenissurat.create');
    }

    /* Store data Jenis Surat */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kodesurat' => 'required|max:4|unique:jenissurats',
            'namejenis' => 'required|max:20',
            'keterangan' => 'nullable|max:255'
        ]);
    jenissurat::create($validatedData);
    return redirect('/dashboard/jenissurat')->with('success','Kode Surat Telah Terbuat !');
    }

    /* Hapus data Jenis Surat */
    public function destroy(jenissurat $jenis)
    {
        jenissurat::destroy($jenis->id);
        return redirect('/dashboard/jenissurat')->with('danger','Jenis Surat  berhasil terhapus !!!');
    }
}
