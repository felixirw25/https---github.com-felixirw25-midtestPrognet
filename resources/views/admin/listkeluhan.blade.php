@extends('layout_admin.app')

@section('contents')
<div class="container">
<table class="table">
    <thead class="text-center">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Keluhan</th>
        <th scope="col">Tanggapan</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="text-center">
      @php
        $i = 1;
      @endphp
        @foreach ($keluhans as $keluhan)
        @if ($keluhan->is_delete==0)
        <tr>
          <td>
            {{ $i }}
            @php
              $i += 1;
            @endphp
          </td>
          <td>{{ $keluhan->users->nama}}</td>
          <td>{{ $keluhan->judul_keluhan }}</td>
          <td>{{ $keluhan->balasan_admin }}</td>
          <td>{{ $keluhan->status }}</td>
          <td>
            <form action="{{ route('deletelaporan', $keluhan->id) }}" method="POST" onsubmit="return confirm('Delete this data?')"> <!--klo ada bnyk parameter buat dlm array-->
              @csrf
              <div class="btn-group" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-success" href="{{ route('detaillaporan', $keluhan->id)  }}">Details</a>
                <a type="button" class="btn btn-warning" href="{{ route('editlaporan', $keluhan->id) }}">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
              </div>
            </form>
          </td>
        </tr>
        @endif
        @endforeach
    </tbody>
  </table>
</div>
@endsection