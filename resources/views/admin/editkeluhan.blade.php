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
    @php
        $waktu_keluhan = $keluhan->waktu_keluhan;
        $waktu_keluhan = date_create($waktu_keluhan);
        $waktu_keluhan = date_format($waktu_keluhan, "d F Y h:i:s");
    @endphp
    <input type="text" class="form-control" id="description" value="{{ $waktu_keluhan }}" readonly>
</div>

<form action="{{ route('saveeditlaporan', $keluhan->id)}}" method="POST">
@csrf
@foreach ($formdata as $key=>$value)

@if ($key=='balasan_admin')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Tanggapan</label>
    <input type="text" class="form-control @error($key) is-invalid @enderror" name="{{ $key }}" id="exampleFormControlInput1" placeholder="Balasan Admin" value="{{ $keluhan->balasan_admin }}" autofocus>
    @error($key)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@endif

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Waktu Tanggapan</label>
    @if ($keluhan->waktu_balasan != NULL)
       @php
            $waktu_balasan = $keluhan->waktu_balasan;
            $waktu_balasan = date_create($waktu_balasan);
            $waktu_balasan = date_format($waktu_balasan, "d F Y h:i:s");
        @endphp 
    @else
    @php
        $waktu_balasan = $keluhan->waktu_balasan;
    @endphp 
    @endif
    
    <input type="text" class="form-control" id="description" value="{{ $waktu_balasan }}" readonly>
</div>

<div class="mb-3"><label class="labels">Status</label>
    <input type="text" class="form-control" id="description" value="{{ $keluhan->status }}" readonly>
</div>

@endforeach
<div class="mb-3" id="tombol">
    <button type="submit" class="btn btn-success">Save</button>
    <a type="button" class="btn btn-danger" href="{{ route('laporan-list', $keluhan->id) }}">Back</a>
</div>
</form>
@endsection