@extends('layout.app')

@section('contents')
<div class="row justify-content-center">
    <div class="col-lg-4">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
        </div> 
        @endif

        @if(session()->has('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
        </div> 
        @endif

        <main class="form-login">
            <h1 class="h3 mb-3 fw-normal text-center">Log In</h1>
            <form action="{{ route('pelaporan-auth-login') }}" method="POST">
                @csrf
              <!--<img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
              <br>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus>
                <label for="email">Email</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <br>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
            </form>
            <small class="d-block mt-2">Not Registered? <a href="{{ route("pelaporan-signup") }}">Sign Up</a></small>
        </main>
    </div>
</div>
<br><br>

@endsection