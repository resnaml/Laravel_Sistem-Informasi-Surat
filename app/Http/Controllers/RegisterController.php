<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Login;

class RegisterController extends Controller
{
    /* Halaman Register */
    public function index()
    {
        return view('register.index',[
            'title' => 'register'    
        ]);
    }

    /* Buat Akun Baru / Register */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:20',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:20',
            'jabatan' => 'nullable',
            'telphone' => 'nullable',
            'level' => 'nullable',
            'gambar' => 'nullable'
        ]);
        $validatedData['password']= Hash::make($validatedData['password']);
        User::create($validatedData);
        // $request->session()->flash('success','Registrasi berhasil silhakan untuk login!!!');
        return redirect('/login')->with('success','Registrasi berhasil silhakan untuk login!!!');
    }
}
