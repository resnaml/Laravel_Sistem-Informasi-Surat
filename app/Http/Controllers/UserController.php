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
        return view('dashboard.user.index',[
            'user' => User::all()
        ]);
    }

    /* 
        Halaman Detail User => akun 
    */
    public function show(User $user)
    {
        return view('dashboard.user.show',[
            'user' => $user
        ]);
    }

    /* 
        Halaman Edit Akun User (Admin) 
    */
    public function edit(User $user)
    {
        return view('dashboard.user.edit',[
            'akun' => $user
        ]);
    }

    /* 
        Halaman Update Akun User (Admin) 
    */
    public function update(Request $request, User $user)
    {
        $rules =[
            'alamat' => 'required|max:50',
            'jabatan' => 'nullable',
            'telepon' => 'required|min:10|max:14',
            'tgl_lahir' => 'required',
            'is_admin' => 'nullable',
            'nip' => 'nullable'
        ];
        $validatedData = $request->validate($rules);
        User::where('id', $user->id)->update($validatedData);
        return redirect('/dashboard/kelolaakun')->with('warning','Akun Berhasil di Update !!');
    }

    /* 
        Hapus Akun User (Admin) 
    */
    public function destroy(User $user)
    {   
        User::destroy($user->id);
        return redirect('/dashboard/kelolaakun')->with('danger','User berhasil terhapus !!!');
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
        Store NIP (Admin) 
    */
    public function createNip(Request $request)
    {
        $data = $request->validate([
            'nip_kode' => 'required|numeric|digits:18|unique:nips',
            'nama_lengkap' => 'required|max:20',
            'jabatan' => 'required|max:20',
            'alamat' => 'required|max:50',
            'telepon' => 'required|numeric',
            'tgl_lahir' => 'required|date'
        ]);

        Nip::create($data);
        return redirect('/dashboard/kelolaakun/nip')->with('success','NIP Berhasil di Daftarkan !');
    }
}
