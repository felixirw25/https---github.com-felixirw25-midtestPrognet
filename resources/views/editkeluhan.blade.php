@extends('layout.app')

@section('contents')
<form action="{{ route('keluhan-saveedit', $keluhan->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@foreach ($formdata as $key=>$value)

@if ($key=='judul_keluhan')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Keluhan</label>
    <input type="text" class="form-control @error($key) is-invalid @enderror" name="{{ $key }}" id="exampleFormControlInput1" placeholder="{{ $key }}" value="{{ $keluhan->judul_keluhan }}" autofocus>
    @error($key)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@endif

@if ($key=='keluhan_user')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
        <textarea class="form-control @error($key) is-invalid @enderror" id="exampleFormControlTextarea1" rows="2" placeholder="{{ $key }}" name="{{ $key }}">{{ $keluhan->keluhan_user }}</textarea>
        @error($key)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endif

@endforeach
<div class="mb-3" id="tombol">
    <button type="submit" class="btn btn-success">Save</button>
    <a type="button" class="btn btn-danger" href="{{ route('keluhan-list', $keluhan->id) }}">Back</a>
</div>
</form>
@endsection