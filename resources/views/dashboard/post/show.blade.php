@extends('dashboard.layouts.main')

@section('container')
    

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $post->judul }}</h1>
  </div>

<article class="entry entry-single mb-3">

    <div class="container-lg">
      <div class="entry-img mb-3">
        <img src="{{ asset('storage/'.$post->gambar) }}" alt="" class="img-fluid col-lg-10">
      </div>
      <div class="text-break lh-base fs-6" style="max-width: 800px">
       <p>{!! $post->isi !!}</p>
      </div>
    </div>
  </article>

@endsection