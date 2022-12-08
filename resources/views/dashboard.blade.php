@extends('layout')

@section('content')
<body>
@if (session('islogin'))

                <div class="alert alert-success">
                    {{ session('islogin') }}
                </div>
          @endif
          @if (session('notAllowed'))
                <div class="alert alert-success">
                    {{ session('notAllowed') }}
                </div>
          @endif
          @if (session('addTodo'))
                <div class="alert alert-success">
                    {{ session('addTodo') }}
                </div>
          @endif
        <div class="dashboard1">
            <h1>Hi Welcome</h1>
        </div>
        <div class="container1">
            <img src="assets/img/buku3-removebg-preview.png" alt=""><br>
            <div class="ig">
            <button type="submit"  class="fa-brands fa-square-instagram"></button>
        </div>
        <div class="twit">
            <button type="submit"  class="fa-brands fa-square-twitter"></button>
        </div>
        </div>
        
</body>
@endsection