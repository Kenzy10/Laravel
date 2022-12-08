<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login-lama');
    }
    public function register()
    {
        //
        return view('register');
    }

    public function dashboard()
    {
        //
        return view('dashboard');
    }
    public function logout()
    {
        //
       Auth::logout();
       return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // kenapa kirim 5data pdhl di input ada 3 inputan? kalau di cek di table
    //  todos itu kan ada 6 column yang harus diisi, salah satunya column done_data
    //  yg nullable, kalau nullable itu gausa diiisi gpp jd ga diisi dulu 
    //  user_id ngambil id dari fitur auth(history login), supaya tau itu todo punya siapa 
    //  column status kan boolean, jd kalo status si todo blm dikerjain = 0
    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8'
        ]);
        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status'=>0,
        ]);
        //kalau berhasil tambah ke db, bakal diarahin ke halaman dashboard dengan menampilkan pemberitahuan
        return redirect('/dashboard')->with('addTodo', 'Berhasil Menambahkan data Todo!');
    }
    public function data()
    {
        $todos = Todo::all();
        //compact untuk mengirim data ke bladenya
        //isi di compact hrs sama kaya nama variablenya
        return view('data', compact ('todos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // parameter $id mengambil data path dinamis {id}
        // ambil satu baris data yang memiliki value column id sama
        // dengan data path dinamis id yang dikirim ke route
        $todo = Todo::where('id', $id)->first();
        // kemudian arahkan/tampilkan file view yang bernama edit.blade.php
        // dan kirim data dari $todo ke file edit tersebut dengan bantuan compact
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8'
        ]);
        // cari baris data yang punya value column id sama dengan id yang dikirim ke route
        Todo::where('id', $id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status'=>0,
        ]);
        // kalau berhasil, arahkan ke halaman data dengan pemberitahuan berhasil
        return redirect('/data')->with('successUpdate', 'Berhasil Mengubah data Todo!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // cari data yang mau dihapus, kalo ketemu langsung hapus datanya
        Todo::where('id', $id)->delete();
        // kalau berhasil arahin balik ke halaman data dengan pemberitahuan
        return redirect('/data')->with('successDelete', 'Berhasil menghapus data Todo!');
    }

    public function updateToComplated(Request $request, $id)
    {
        Todo::where('id', $id)->update([
            'status' => 1,
            'date' => \Carbon\Carbon::now(),
            
        ]);
        // kalau berhasil, arahkan ke halaman data dengan pemberitahuan berhasil
        return redirect()->back()->with('done', 'Todo telah selesai dikerjakan!');
    
    }

}
