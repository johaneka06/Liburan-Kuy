@extends('auth/layout/master')

@section('title', 'Login')

@section('content')

<!-- Begin register form -->
<div class="col-sm-4">
  <div class="shadow">
    <div class="card">
      <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <h5 class="card-title mb-3">Register</h5>
        <h6 class="card-subtitle mb-4">Daftar dan rasakan kemudahannya.</h6>
        <form action="{{ route('postRegister') }}" method="POST">
          {{ csrf_field() }}
          <input type="email" id="email" name="email" class="form-control mb-2" placeholder="Email">
          <input type="text" id="fName" name="fName" class="form-control mb-2" placeholder="Nama Depan">
          <div class="from-group mb-2">
            <input type="text" id="lName" name="lName" class="form-control" aria-describedby="lnameHelp" placeholder="Nama Belakang">
            <small id="lnameHelp" class="form-text text-muted">Jika nama belakang tidak ada, isi dengan nama depan</small>
          </div>
          <input type="text" id="nomorHp" name="nomorHp" class="form-control mb-2" placeholder="Nomor HP">
          <div class="form-group mb-3">
            <input type="password" id="password" name="password" class="form-control" aria-describedby="passwdHelp" placeholder="Password">
            <small id="passwdHelp" class="form-text text-muted">Isi dengan 8-64 karakter</small>
          </div>

          <div class="d-flex justify-content-center">
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block rounded" aria-describedby="buttonInfo" type="submit">Buat Akun</button>
              <small id="buttonInfo" class="form-text text-muted">Dengan membuat akun, anda menyetujui <a href="">Kebijakan Privasi</a> dan <a href="">Syarat Ketentuan</a> kami.</small>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End register form -->

@endsection