@extends('layout')

@section('content')
<form action="/update/{{$todo['id']}}" method="post" style="max-width: 300px; margin: auto;">
    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <!-- mengirim data ke controller yang di tampung oleh Request $request -->
    @csrf
    <!-- karena attribute method pada tag form cm bisa GET/POST sedangkan buat update data itu pake method PATCH,
     jadi method="post" di form di timpa sama method patch ini -->
     @method('PATCH')
    <div class="d-flex flex-column">
        <label>title</label>
        <input type="text" name="title" value="{{$todo['title']}}">
    </div>
    <div class="d-flex flex-column">
        <label>Date</label>
        <input type="date" name="date" value="{{$todo['date']}}">
    </div>
    <div class="d-flex flex-column">
        <label>Description</label>
        <!-- kenapa textarea gpunya attribute value? karena text are bukan termasuk tag input/atau select
        dan dia punya penutup tag, jadi buat nampilinnya langsung tanpa attribute value(sebelum penutup tag textarea) -->
        <textarea name="description" cols="30" rows="10">{{$todo['description']}}</textarea>
    </div>
        <button type="submit">Kirim</button>
    </form>
@endsection