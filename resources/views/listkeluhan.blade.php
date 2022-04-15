@extends('layout.app')

@section('contents')
<a type="button" class="btn btn-primary" href="{{ route('keluhan-new') }}">Buat Laporan</a>
<table class="table">
    <thead class="text-center">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Keluhan</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Waktu Keluhan</th>
        <th scope="col">Tanggapan</th>
        <th scope="col">Waktu Tanggapan</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($keluhans as $keluhan)
        @if ($keluhan->user_id==\Auth::user()->id && $keluhan->is_delete==0)
        <tr>
          <td>{{ $loop->iteration}}</td>
          <td>{{ $keluhan->judul_keluhan }}</td>
          <td>{{ Str::limit($keluhan->keluhan_user), 100 }}</td>
          <td>{{ $keluhan->waktu_keluhan }}</td>
          <td>{{ Str::limit($keluhan->balasan_admin), 100 }}</td>
          <td>{{ $keluhan->waktu_balasan }}</td>
          <td>
            <form action="{{ route('keluhan-delete', $keluhan->id) }}" method="POST" onsubmit="return confirm('Delete this data?')"> <!--klo ada bnyk parameter buat dlm array-->
              @csrf
              <div class="btn-group" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-success" href="{{ route('keluhan-detail', $keluhan->id)  }}">Details</a>
                <a type="button" class="btn btn-warning" href="{{ route('keluhan-edit', $keluhan->id) }}">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
              </div>
            </form>
          </td>
        </tr>
        @endif
        @endforeach
    </tbody>
  </table>
@endsection