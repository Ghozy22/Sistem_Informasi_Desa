@extends('layouts.navbar')

@section('konten')
    
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-signin">
            <h1 class="h3 mb-5 fw-normal mt-4 text-center">Silahkan Daftar!</h1>
            <form action="/register" method="POST">
                @csrf
              <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                <label for="name">Username</label>
                @error('name')  
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Email" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')  
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating mb-5">
                <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password" required ">
                <label for="password">Password</label>
                @error('password')  
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
              <small class="d-block mt-3 text-center">Sudah ada akun? <a href="/login">Login</a></small>
            </form>
          </main>
    </div>
</div>

@endsection