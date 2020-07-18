@extends('auth/layout/master')

@section('title', 'Login');

@section('content')

<!-- Begin login form -->
<div class="col-sm-4">
  <div class="shadow">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-3">Log in</h5>
        <h6 class="card-subtitle mb-4">Liburanmu dimulai dari sini.</h6>
        <form action="{{ route('postPassword') }}" method="POST">
          {{ csrf_field() }}
          <input type="text" id="userUnique" name="email" class="form-control mb-3" value="{{$ident}}" readonly>
          <input type="password" id="password" name="password" class="form-control mb-3" placeholder="Your password">
          <div class="d-flex justify-content-center">
            <button class="btn btn-primary btn-lg btn-block rounded" type="submit">Masukkan Saya</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End login form -->

@endsection