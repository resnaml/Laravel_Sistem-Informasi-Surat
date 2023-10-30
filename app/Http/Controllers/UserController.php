<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Nip;

class UserController extends Controller
{
    /* 
        Halaman tampil User 
    */
    public function index()
    {
        return view('main.layout.admin.user',[
            'user' => User::latest()->filter(request(['search']))->paginate(8)->withQueryString()
        ]);
    }

    /* 
        Halaman Edit Akun User (Admin) 
    */
    public function edit(User $user)
    {
        return view('dashboard.user.edit',[
            'akun' => $user,
            // 'user' => User::whereNull('nip_id')->get(),
            'nips' => Nip::all()
        ]);
    }

    /* 
        Halaman Update Akun User (Admin) 
    */
    public function update(Request $request, User $user)
    {
        $rules =[
            'is_admin' => 'nullable',
            'nip_id' => 'nullable',
            'is_kepala' => 'nullable'
        ];
        $validatedData = $request->validate($rules);
        User::where('id', $user->id)->update($validatedData);
        return redirect('/kelolaakun')->with('warning','Akun Berhasil di Update !!');
    }

    /* 
        Hapus Akun User (Admin) 
    */
    public function destroy(User $user)
    {   
        User::destroy($user->id);
        return redirect('/kelolaakun')->with('danger','User berhasil terhapus !!!');
    }

    /* 
        View NIP (Admin) 
    */
    public function indexNip()
    {
        return view('dashboard.user.nip' ,[
            'nips' => Nip::all()
        ]);
    }

    /* 
        Store NIP Control
    */
    public function createNip(Request $request)
    {
        $data = $request->validate([
            'nip_kode' => 'required|numeric|digits:18|unique:nips',
            'nama_lengkap' => 'required|max:20',
            'jabatan' => 'required|min:3|max:20',
            'alamat' => 'required|min:4|max:60',
            'telepon' => 'required|digits:13',
            'tgl_lahir' => 'required|date'
        ]);

        Nip::create($data);
        return redirect('/kelolaakun/nip')->with('success','NIP Berhasil di Daftarkan !');
    }

    public function destroyNip(Nip $nip)
    {
        Nip::destroy($nip->id);
        return redirect('/kelolaakun/nip')->with('danger','NIP berhasil terhapus !');
    }
}
