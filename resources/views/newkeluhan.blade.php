@extends('layout.app')

@section('contents')
<form action="{{ route('keluhan-save') }}" method="POST" enctype="multipart/form-data">
@csrf
@foreach ($formdata as $key=>$value)

@if ($value[0]=='text')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">{{ $value[1] }}</label>
    <input type="{{ $value[0] }}" class="form-control @error($key) is-invalid @enderror" name="{{ $key }}" id="exampleFormControlInput1" placeholder="{{ $value[1] }}" value="{{ old($key) }}" autofocus>
    @error($key)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@endif

@if ($value[0]=='textarea')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ $value[1] }}</label>
        <textarea class="form-control @error($key) is-invalid @enderror" id="exampleFormControlTextarea1" rows="2" placeholder="{{ $value[1] }}" name="{{ $key }}"></textarea>
        @error($key)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endif

@endforeach
<div class="mb-3" id="tombol">
    <button type="submit" class="btn btn-success">Save</button>
    <a type="button" class="btn btn-danger" href="{{ route('keluhan-list') }}">Back</a>
</div>
</form>
@endsection