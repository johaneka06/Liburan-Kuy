@section('container')
<div class="container">
  <div class="d-flex mt-4" id="wrapper">
    <div class="border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-center mt-4 mb-5">
        <h3>{{ $name }}</h3>
      </div>
      <div class="list-group list-group-flush text-center">
        <a href="{{ url('user/profile') }}" class="list-group-item list-group-item-action bg-light" id="acc">Akun</a>
        <a href="{{ url('user/history') }}" class="list-group-item list-group-item-action bg-light" id="ordr">Order History</a>
        <a href="{{ url('user/point') }}" class="list-group-item list-group-item-action bg-light" id="point">Poin Liburan</a>
        <a href="{{ url('user/profile-list') }}" class="list-group-item list-group-item-action bg-light" id="profile">Profile Management</a>
      </div>
    </div>

    <div class="container-fluid ml-3">
      @yield('content')
    </div>
  </div>
</div>
@endsection