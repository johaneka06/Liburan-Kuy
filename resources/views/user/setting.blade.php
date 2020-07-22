@extends('layout/template')

@section('title', 'Profile')

@extends('user/sidebar')

@section('content')
<div class="mt-4">
  <div class="container">
    <h1>Detail Akun</h1>
    <p>Atur detail akunmu disini</p>
    <div class="card bg-light mt-4">
      <div class="card-body">
        <div class="border-bottom mb-2">
          <div id="accordion">
            <div class="card">
              <!-- Item #1 -->
              @include('sweetalert::alert')
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Email dan Nomor HP
                  </button>
                </h5>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <div class="container">
                    <div class="mb-2">
                      Email:
                      <p class="card-text"> {{ $email }}</p>
                    </div>
                    <div class="mb-2">
                      Nomor HP:
                      <p class="card-text"> {{ $phone_no }} <a href="#" class="ml-3" data-toggle="modal" data-target="#changeModal">ubah</a> </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Nomor HP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('putPhoneNo') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                      <div class="mb-2">
                        <label for="old">Nomor HP Lama: </label>
                        <input type="text" id="old" name="oldPhoneNo" class="form-control" value="{{ $phone_no }}" readonly>
                      </div>
                      <div class="mb-2">
                        <label for="old">Nomor HP Baru: </label>
                        <input type="text" id="new" name="newPhoneNo" class="form-control">
                      </div>
                      <div class="mb-2">
                        <label for="old">Konfirmasi Nomor HP: </label>
                        <input type="text" id="conf" name="confPhoneNo" class="form-control">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End Modal -->

            <!-- End item #1 -->

            <!-- Item #2 -->
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Kata Sandi dan Keamanan
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  <div class="container">
                    <form action="{{ route('putPassword') }}" method="POST">
                      {{ csrf_field() }}
                      <div class="form-group mx-sm-3 mb-2">
                        <input type="password" class="form-control mb-2" style="width: 20rem;" id="inputPassword2" name="old" placeholder="Password saat ini">
                        <input type="password" class="form-control mb-4" style="width: 20rem;" id="passwordBaru" name="new" placeholder="Password baru">
                      </div>
                      <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End item #2 -->

            <!-- Item #3 -->
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Data Akun
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  <div class="container">
                    <h5>Perbaharui Nama Akun</h5>
                    <form action="{{ route('putData') }}" method="POST">
                      {{ csrf_field() }}
                      <div class="form-group mb-2">
                        <label for="oldF">Nama depan sekarang:</label>
                        <input type="text" class="form-control mb-4" style="width: 20rem;" id="oldF" name="oldF" value="{{ $oldFirstName }}" disabled>
                        <label for="oldF">Nama belakang sekarang:</label>
                        <input type="text" class="form-control mb-4" style="width: 20rem;" id="oldF" name="oldF" value="{{ $oldLastName }}" disabled>
                        <label for="oldF">Nama depan baru:</label>
                        <input type="text" class="form-control mb-4" style="width: 20rem;" id="fName" name="fName" placeholder="First Name">
                        <label for="oldF">Nama belakang baru:</label>
                        <input type="text" class="form-control mb-4" style="width: 20rem;" id="lName" name="lName" placeholder="Last Name">
                      </div>
                      <button type="submit" class="btn btn-primary">Perbaharui</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End item #3 -->
          </div>
        </div>

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