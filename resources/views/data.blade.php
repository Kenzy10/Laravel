@extends('layout')

@section('content')
@if (session('successUpdate'))
                <div class="alert alert-success">
                    {{ session('successUpdate') }}
                </div>
          @endif
@if (session('successDelete'))
                <div class="alert alert-warning">
                    {{ session('successDelete') }}
                </div>
          @endif
@if (session('done'))
                <div class="alert alert-success">
                    {{ session('done') }}
                </div>
@endif    
<div class="container mt-5">     
<table>

    <table class="table table-success table-striped table-bordered">
        <tr>
            <td>No</td>
            <td>Kegiatan</td>
            <td>Deskripsi</td>
            <td>Batas Waktu</td>
            <td>Status</td>
            <td>Aksi</td>
        </tr>
        
        @php 
            $no = 1;
        @endphp
        @foreach ($todos as $todo)
       
        <tr>
            <!-- {{-- tiap di looping, $no bakal ditambah 1 --}} -->
            <td>{{ $no++ }}</td>
            <td>{{ $todo['title'] }}</td>
            <td>{{ $todo['description'] }}</td>
            <!-- {{--carbon : package date pada laravel, nantiny si date yg 2022-11-22 formatnya jadi 22 november,2022 --}} -->
            <td>{{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}</td>
            <!-- {{-- konsep ternary, if statusnya 1 nampilin teks complated kalo 0 nampilin teks on-process .
            status tuh boolean kan? cmn antara 1 atau 0 --}} -->
            <td>{{ $todo['status'] ? 'Complated' : 'On-Process' }}</td>
            
            <td class="d-flex justify-content-center">
                <!-- karena path {id} merupakan path dinamis, jadi kita harus isi path dinamis tersebut. karena kita mengisinya dengan data dinamis/data dari data base jd buat isinya pake kurung kurawal dua kali -->
                <div class="edit">
                <a href="/edit/{{$todo['id']}}" class="btn btn-primary fa-solid fa-pen-to-square"></a>  
                </div> 

                <form action="/destroy/{{$todo['id']}}" method="POST"> 
                    @csrf 
                    <!-- menimpan method="POST", karena di route nya menggunakan method delete -->
                    @method("DELETE")
                <button type="submit" class="btn btn- btn-danger fa-solid fa-trash"></button>
            </form>
            @if ($todo['status'] == 0)
            
            <form action="/complated/{{$todo['id']}}" method="POST"> 
                    @csrf 
                    <!-- menimpan method="POST", karena di route nya menggunakan method delete -->
                    @method("PATCH")
                    <div class="complated">
                <button type="submit"  class="btn btn- btn-success fa-solid fa-square-check"></button>
                    </div>
            </form>
            @endif
            </td>
            </tr>
         @endforeach
    </table>
    </div>
    @endsection
    
            