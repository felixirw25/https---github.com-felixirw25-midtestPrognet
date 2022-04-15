@extends('layout.app')

@section('contents')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-login">
            <h1 class="h3 mb-3 fw-normal text-center">Sign Up</h1>
                <form action="{{ route('pelaporan-simpan-tamu') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach ($formdata as $key=>$value)
                    
                    @if ($value[0]=='select')
                        <div class="form-floating">
                            <select type="{{ $key }}"  name="{{ $key }}" class="form-select @error($key) is-invalid @enderror" aria-label="Default select example">
                                <option selected disabled><label for="floatingInput">{{ $value[1] }}</label></option>
                                @foreach ($value[2] as $index=>$value)
                                    <option value="{{ $value }}">{{ $value }}<br></option> 
                                @endforeach
                            </select>
                            @error($key)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    @if ($value[0]=='text')
                    <div class="form-floating">
                        <input type="{{ $value[0] }}" class="form-control @error($key) is-invalid @enderror" name="{{ $key }}" id="floatingInput" placeholder="{{ $value[1] }}" value="{{ old($key) }}">
                        <label for="floatingInput">{{ $value[1] }}</label>
                        @error($key)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif
                
                    @if ($value[0]=='password')
                    <div class="form-floating">
                        <input type="{{ $value[0] }}" class="form-control @error($key) is-invalid @enderror" name="{{ $key }}" id="floatingInput" placeholder="{{ $value[1] }}">
                        <label for="floatingInput">{{ $value[1] }}</label>
                        @error($key)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif
                    
                    @endforeach
                    <small class="d-block mt-2">Already Registered? <a href="{{ route("pelaporan-login") }}">Log In</a></small>
                    <div class="mt-3 mb-5" id="tombol">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
@endsection