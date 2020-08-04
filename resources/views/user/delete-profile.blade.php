@extends('layout/template')

@section('title', 'Edit Profile')

@extends('user/sidebar')

@section('content')
<div class="mt-4">
  <div class="container mt-4">
    <form action="{{ route('deleteProfile', ['id' => $deleted->id]) }}" method="POST">
      {{ csrf_field() }}
      <h1>Konfirmasi Hapus Profil</h1>
      <p class="mb-4">Apakah anda yakin ingin menghapus profil:</p>
      <h4 class="mb-3">Nama: {{$deleted->name." ".$deleted->last_name}}</h4>
      <h4 class="mb-3">Email: {{$deleted->email}}</h4>
      <h4 class="mb-5">Nomor HP: {{$deleted->phone_no}}</h4>
      <button type="submit" class="btn btn-danger" >Hapus</a>
      <button type="button" onclick="location.href = '/user/manage-profile';" class="btn btn-primary ml-3">Batal</a>
    </form>
    

  </div>
</div>
@endsection