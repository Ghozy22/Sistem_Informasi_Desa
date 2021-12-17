@extends('dashboard.layouts.main')

@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">POST NEWS</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif


@if (session()->has('hapus'))
<div class="alert alert-success" role="alert">
  {{ session('hapus') }}
</div>
@endif

@if (session()->has('edit'))
<div class="alert alert-success" role="alert">
  {{ session('edit') }}
</div>
@endif

<div class="table-responsive">
    <a href="/dashboard/post/create" class="btn btn-primary mb 3">Tambahkan Postingan</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Judul</th>
          <th scope="col">Penulis</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $hasil)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $hasil->judul }}</td>
          <td>{{ $hasil->penulis }}</td>
          <td>
              <a href="/dashboard/post/{{ $hasil->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
              <a href="/dashboard/post/{{ $hasil->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/post/{{ $hasil->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Anda akan menghapus postingan?')"><span data-feather="x-circle"></span></button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection