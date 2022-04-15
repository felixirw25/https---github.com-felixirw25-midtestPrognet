@extends('layout_admin.app')

@section('contents')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Keluhan</label>
    <input type="text" class="form-control" id="name" value="{{ $keluhan->judul_keluhan }}" readonly>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" readonly>{{ $keluhan->keluhan_user }}</textarea>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Waktu Keluhan</label>
    <input type="text" class="form-control" id="description" value="{{ $keluhan->waktu_keluhan }}" readonly>
</div>

<form action="{{ route('saveeditlaporan', $keluhan->id)}}" method="POST">
@csrf
@foreach ($formdata as $key=>$value)

@if ($key=='balasan_admin')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Balasan Admin</label>
    <input type="text" class="form-control @error($key) is-invalid @enderror" name="{{ $key }}" id="exampleFormControlInput1" placeholder="Balasan Admin" value="{{ $keluhan->balasan_admin }}" autofocus>
    @error($key)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@endif

@endforeach
<div class="mb-3" id="tombol">
    <button type="submit" class="btn btn-success">Save</button>
    <a type="button" class="btn btn-danger" href="{{ route('laporan-list', $keluhan->id) }}">Back</a>
</div>
</form>
@endsection