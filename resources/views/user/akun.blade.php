@extends('layout/template')

@section('title', 'Profile')

@extends('user/sidebar')

@section('content')
<div class="mt-4">
  <div class="container">
    <h1>Detail Akun</h1>
    <p>Atur detail akunmu disini</p>
    <div class="card bg-light mt-4" style="width: 25rem;">
      <div class="card-body">
        <div class="border-bottom mb-2">
          Email:
          <p class="card-text mb-3">{{ $email }}</p>
          Nomor HP:
          <p class="card-text mb-3">{{ $phone_no }}</p>
        </div>

        <a href="{{ url('/user/profile/settings') }}" class="float-right">Pengaturan Akun</a>
      </div>
    </div>
  </div>

</div>

<script type="text/javascript">
  var element = document.getElementById("acc");
  element.classList.remove("bg-light");
  element.classList.add("active");
</script>
@endsection