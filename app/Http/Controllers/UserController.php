<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'alamat' => 'required|max:30',
            'jabatan' => 'nullable',
            'telepon' => 'required|min:10|max:14',
            'tgl_lahir' => 'required',
            'gambar' => 'nullable|image',
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

}
