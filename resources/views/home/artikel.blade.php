@extends('layouts.navbar')

@section('konten')
    
<div class="mt-0">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="w3-center">
          <h1><strong>{{ $id->judul }}</strong></h1>
        </div>

        <div class="w3-justify">
          <img src="{{ asset('storage/'.$id->gambar) }}" alt="Msc 2021" style="width:100%" class="w3-padding-16">
          <p>{!! $id->isi !!}</p>
        </div>
      </div>
    </div>

</div>


@endsection