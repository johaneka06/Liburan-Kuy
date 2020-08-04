@extends('layout/template')

@section('title', 'Edit Profile')

@extends('user/sidebar')

@section('content')
<div class="mt-4">
  <h1>Edit profile untuk: {{$profile -> name." ".$profile->last_name}}</h1>
  <p>Edit properti profile seperti nama depan, nama belakang, email, dan nomor telefon penumpang terkait.</p>
  <div class="card mt-4">
    <h5 class="card-header">Profile: {{$profile -> name." ".$profile->last_name}}</h5>
    <div class="card-body">
      <form action="{{ route('putProfileUpdate', ['id' => $profile->id ]) }}" method="POST">
        {{ csrf_field() }}
        <label for="first">Nama Depan:</label>
        <input type="text" class="form-control mb-2" style="max-width: 25rem" name="first" id="first" value="{{$profile -> name}}">
        <label for="last">Nama Belakang:</label>
        <input type="text" class="form-control mb-2" style="max-width: 25rem" name="last" id="last" value="{{$profile -> last_name}}">
        <label for="hp">Nomor Telefon:</label>
        <input type="text" class="form-control mb-2" style="max-width: 25rem" name="hp" id="hp" value="{{$profile -> phone_no}}">
        <label for="email">Email:</label>
        <input type="text" class="form-control mb-2" style="max-width: 25rem" name="email" id="email" value="{{$profile -> email}}">
        <button type="submit" class="btn btn-primary mt-3">Ubah</button>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  var element = document.getElementById("profile");
  element.classList.remove("bg-light");
  element.classList.add("active");
</script>
@endsection