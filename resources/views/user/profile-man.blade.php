@extends('layout/template')

@section('title', 'Profile Management')

@extends('user/sidebar')

@section('content')
<div class="mt-4">
  <h1>Manajemen Profil</h1>
  <p>Atur profil masing - masing penumpang disini.</p>
  <div class="card bg-light mt-4">
    <div class="card-header bg-light">
      <a href="#" data-toggle="modal" data-target="#insertProfile" class="btn btn-primary float-right">Tambah</a>
    </div>
    <div class="card-body">
    <!-- If there's error while validation -->
    @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div><br />
              @endif
              <!-- End if validation -->
      <div class="border-bottom mb-2">
        <table class="table">
          <thead class="thead">
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="profile_list">
            @foreach($profiles as $data)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $data->name }}</td>
              <td>{{ $data->last_name }}</td>
              <td>
                <a href="{{ route('readProfile', ['id' => $data->id]) }}" class="badge badge-success">Edit</a>
                <a href="{{ route('fetchProfile', ['id' => $data->id]) }}" class="badge badge-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- Modal for insert profile -->
        <div class="modal fade" id="insertProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Profil Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('postProfile') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="container">
                    <label for="first">Nama Depan:</label>
                    <input type="text" class="form-control mb-2" id="first" name="first">
                    <label for="last">Nama Belakang:</label>
                    <input type="text" class="form-control mb-2" id="last" name="last">
                    <label for="phone">Nomor Telefon:</label>
                    <input type="text" class="form-control mb-2" id="phone" name="phone">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control mb-2" id="email" name="email">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End modal for insert profile -->
      </div>
    </div>
  </div>

  <script type="text/javascript">
    var element = document.getElementById("profile");
    element.classList.remove("bg-light");
    element.classList.add("active");
  </script>
  @endsection