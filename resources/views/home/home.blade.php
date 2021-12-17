@extends('layouts.navbar')

@section('konten')
    
<div class="mt-0">
  <div class="w3-content" style="max-width:2000px;margin-top:-15px">

    <!-- Automatic Slideshow Images -->

    @foreach ($data as $ss)
    <div class="mySlides w3-display-container w3-center">
      <img src="{{ asset('storage/'.$ss->gambar) }}" style="width:100%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
        <h3>{{ $ss->judul }}</h3>  
      </div>
    </div>
    @endforeach
    
  
    <!-- The Band Section -->
    <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="bio">

      @if (session()->has('edit'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div style="margin-left: 22px">{{ session('edit') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <h2 class="w3-wide">{{ $bio[0]->judul }}</h2>
      <p class="w3-opacity"><i>{{ $bio[0]->penulis }}</i></p>
      <p class="w3-justify">{!! $bio[0]->isi !!}</p>

    @auth
      @if(auth()->user()->level == 1)
        @if ($bio[0])
        <a href="/home/bio/{{ $bio[0]->id }}/edit" class="btn btn-warning">Edit</a>
        <a href="#" class="btn btn-danger">Hapus</a>
        @else
        <a href="/home/bio" class="btn btn-success">Post Bio</a>
        @endif
      @endif   
    @endauth
    
    </div>
  
    <!-- The Tour Section -->
    <div class="w3-black" id="articles">
      <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
        <h2 class="w3-wide w3-center">Berita</h2>
        <div class="w3-row-padding w3-padding-32  style="margin:0 -16px">
          @foreach ($data as $hasil)
          <div class="mb-5 mt-5">
            <img src="{{ asset('storage/'.$hasil->gambar) }}" alt="New York" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>{{ $hasil->judul }}</b></p>
              <p>{!! Str::limit($hasil->isi, 280) !!}</p>
              <a href="/home/baca/{{ $hasil->id }}"><button class="w3-button w3-black w3-margin-bottom">Baca selengkapnya</button></a>
            </div>
          </div>
          @endforeach
      </div>
    </div>
  </div>
</div>


@endsection