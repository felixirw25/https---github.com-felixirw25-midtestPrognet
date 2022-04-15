@extends('layout.app')

@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Update Password
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('booking-profile-savepassword') }}">
                            @csrf
                            @foreach ($formdata as $key=>$value)

                            @if ($value[0]=='password')
                    <div class="col-md-6">
                        <input type="{{ $value[0] }}" class="form-control @error($key) is-invalid @enderror" name="{{ $key }}" id="floatingInput" placeholder="{{ $value[1] }}">
                        @error($key)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif
                        @endforeach
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" href="{{route('booking-profile-savepassword')}}">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection