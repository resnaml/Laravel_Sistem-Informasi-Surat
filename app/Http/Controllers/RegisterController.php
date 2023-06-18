<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Login;


class RegisterController extends Controller
{
    /*
        Halaman View Register
    */
    public function index()
    {
        return view('register.index',[
            'title' => 'register'    
        ]);
    }

    /* 
        Store Data Akun Baru
    */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|numeric|digits:18|unique:users|exists:nips,nip_kode',
            'name' => 'required|max:20',
            'jabatan' => 'required|max:20',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:20',
            'no_induk' => 'required' . $this->nip()->id()
        ]);
        $validatedData['password']= Hash::make($validatedData['password']);
        User::create($validatedData);
        // $request->session()->flash('success','Registrasi berhasil silhakan untuk login!!!');
        return redirect('/login')->with('success','Registrasi berhasil silhakan untuk login!!!');
    }
}
