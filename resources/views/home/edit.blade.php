@extends('layouts.navbar')

@section('konten')

<div class="container">
    <div class="mt-5">

        <div class="col-lg-7">
            <form method="POST" action="/home/bio/{{ $bio->id }}" class="mb-5">
                @method('put')
              @csrf
              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control @error('judul')is-invalid @enderror" id="judul" placeholder="Judul" value="{{ old('judul', $bio->judul) }}" autofocus>
                @error('judul')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group mt-3">
                <label for="isi">Konten</label>
                <input id="isi" type="hidden" name="isi" value="{{ old('isi', $bio->isi) }}">
                <trix-editor input="isi"></trix-editor>
                @error('isi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group mt-3">
                <label for="penulis">Penulis</label>
                <input type="text" name="penulis" class="form-control @error('penulis')is-invalid @enderror" id="penulis" placeholder="penulis" value="{{ old('penulis', $bio->penulis) }}">
                @error('penulis')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <button class="btn btn-primary mt-4">Edit</button>
            </form>
        </div>
    
    </div>
</div>


@endsection