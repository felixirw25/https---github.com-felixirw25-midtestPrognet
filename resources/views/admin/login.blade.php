@extends('layout_admin.app')

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
            <h1 class="h3 mb-3 fw-normal text-center">Admin Log In</h1>
            <form action="{{ route('admin-auth-login') }}" method="POST">
            @csrf
              <br>
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" autofocus>
                <label for="username">Username</label>
                @error('username')
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
        </main>
    </div>
</div>
<br><br>

@endsection