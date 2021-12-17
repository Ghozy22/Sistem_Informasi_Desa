@extends('dashboard.layouts.main')

@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Postingan</h1>
  </div>


  <div class="col-lg-7">
      <form method="POST" action="/dashboard/post/{{ $post->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" name="judul" class="form-control @error('judul')is-invalid @enderror" id="judul" placeholder="Judul" value="{{ old('judul', $post->judul) }}" autofocus>
          @error('judul')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="isi">Konten</label>
          <input id="isi" type="hidden" name="isi" value="{{ old('isi', $post->isi) }}">
          <trix-editor input="isi"></trix-editor>
          @error('isi')
              <p class="text-danger">{{ $message }}</p>
          @enderror
          <div class="form-group mt-3">
            <input type="hidden" name="gbrLama" value="{{ $post->gambar }}">
            <label for="gambar" class="form-label">Upload Gambar</label>
            @if ($post->gambar)
            <img src="{{ asset('storage/'. $post->gambar) }}" class="tampil img-fluid mb-2 col-lg-9 d-block">
            @else
            <img class="tampil img-fluid mb-2 col-lg-9">
            @endif
            <input name="gambar" class="form-control @error('gambar')is-invalid @enderror" type="file" id="gambar" onchange="tampilGbr()">
            @error('gambar')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        <div class="form-group mt-3">
          <label for="penulis">Penulis</label>
          <input type="text" name="penulis" class="form-control @error('penulis')is-invalid @enderror" id="penulis" placeholder="penulis" value="{{ old('penulis', $post->penulis) }}">
          @error('penulis')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
        </div>
        <button class="btn btn-primary mt-4">Update</button>
      </form>
  </div>

  <script>

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })

    function tampilGbr(){

    const img = document.querySelector('#gambar');
    const tampilImg = document.querySelector('.tampil');

    tampilImg.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(img.files[0]);

    oFReader.onload = function(OFREvent){
      tampilImg.src = OFREvent.target.result;
    }
  }

  </script>

@endsection