@extends('layout/template')

@section('title', 'Poin Liburan')

@extends('user/sidebar')

@section('content')
<div class="mt-4">
  <h1>Poin Liburan</h1>
  <p>Nikmati berbagai keuntungan dengan menggunakan poin liburanmu.</p>
</div>

<script type="text/javascript">
  var element = document.getElementById("point");
  element.classList.remove("bg-light");
  element.classList.add("active");
</script>
@endsection