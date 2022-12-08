<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request){
        $validatedata = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email:dns',
            'username' => 'required|min:4',
            'password' => 'required|min:8'
        ]);
        
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Berhasil Menambahkan akun! silahkan login!');
    }
    public function login(Request $request){
        $validatedata = $request->validate([
            'username' => 'required|min:4',
            'password' => 'required|min:8'
        ]);
    $user=$request->only(['username','password']);
    if(Auth::attempt($user)){
        return redirect()->route('dashboard')->with('islogin', 'kamu sudah login!');
    }
    else{
        return redirect()->back()->with('failed', 'Buat akun duls dong banh!');
    }
    }
}

