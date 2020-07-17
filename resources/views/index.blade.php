@extends('layout/template')

@section('title', 'Welcome')

@section('container')
<div class="container mt-5">
  <div class="container ml-5">
    <h3>Hei, {{$name}}!</h3>
    <h2>Mau Liburan Kemana?</h2>
    <p class="mt-4">Buruan cari tiket pesawatmu disini!</p>
  </div>

</div>
@endsection