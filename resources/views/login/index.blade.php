@extends('layouts.navbar')

@section('konten')

<div class="row justify-content-center">
    <div class="col-lg-5">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <main class="form-signin">
            <h1 class="h3 mb-5 fw-normal mt-4 text-center">Silahkan Login!</h1>
            <form action="{{ url('/login') }}" method="POST">
                @csrf
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating mb-5">
                <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password">
                <label for="password">Password</label>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
              <small class="d-block mt-3 text-center">Belum ada akun? <a href="/register">Register</a></small>
            </form>
          </main>
    </div>
</div>

@endsection