@extends('layout/template')

@section('title', 'Profile')

@extends('user/sidebar')

@section('content')
<div class="mt-4">
  <h1>Title Goes Here</h1>
  <p>Content goes here</p>
</div>

<script type="text/javascript">
  var element = document.getElementById("acc");
  element.classList.remove("bg-light");
  element.classList.add("active");
</script>
@endsection