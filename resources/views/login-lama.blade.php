@extends('layout')

@section('content')
@if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
          @endif
          @if (session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
          @endif
          @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('notAllowed'))
                <div class="alert alert-danger">
                    {{ session('notAllowed') }}
                </div>
          @endif

<section class="vh-100 bg-light ">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <div class="photo">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
    </div>
      </div>
        <form  action="{{route('login.post')}}" method="POST">
          @csrf
          <section class="page">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="form1Example13" class="form-control form-control-lg" name="username"/>
            <label class="form-label" for="form1Example13">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
            <label class="form-label" for="form1Example23">Password</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"></label>
              <a href="/register">Belum memiliki akun!</a>
            </div>
            
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
          </div>

          <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b998" href="#!"
            role="button">
            <link rel="shortcut icon" href="" type="image/x-icon">
            <i class=""></i>Continue with Facebook
          </a>
          <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!"
            role="button">
            <i class=""></i>Continue with Twitter</a>
          </section>
          

        </form>
      </div>
    </div>
  </div>
</section>
@endsection