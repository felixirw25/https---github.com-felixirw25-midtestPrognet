@extends('layout_admin.app')

@section('contents')
<div class="mb-3" id="tombol">
    <a type="button" class="btn btn-danger" href="{{ route('laporan-list') }}">Back</a>
</div>

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

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Tanggapan</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" readonly>{{ $keluhan->balasan_admin }}</textarea>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Waktu Tanggapan</label>
    <input type="text" class="form-control" id="description" value="{{ $keluhan->waktu_balasan }}" readonly>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Status</label>
    <input type="text" class="form-control" id="description" value="{{ $keluhan->status }}" readonly>
</div>
@endsection