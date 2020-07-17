<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Register</title>
</head>

<body>
  <!-- Begin header area -->
  <div class="container">
    <div class="d-flex justify-content-center mt-4">
      <a href="/" class="btn align-center">
        <h1 class="text-center">Liburan Kuy!</h1>
      </a>
    </div>
    <!-- End Header -->

    <!-- Begin body area -->
    <div class="row mt-5">
      <!-- Begin Benefit section-->
      <div class="col-sm-7 d-flex justify-content-center">
        <div class="card" style="max-width: 25rem;">
          <div class="card-body">
            <h5>Gabung dan rasakan kemudahannya</h5>
            <!-- First item -->
            <div class="row mt-4 mb-2">
              <div class="col-sm-3">
                <img src="{{asset('assets/img/coin.png')}}" style="max-width: 120%;">
              </div>
              <div class="col-sm-9">
                <h5 class="card-title">Point Liburan</h5>
                <p class="card-text">Dapatkan dan kumpulkan poinnya lalu tukarkan sebagai diskon.</p>
              </div>
            </div>
            <!-- End first item -->
            <hr />
            <!-- Second item -->
            <div class="row mt-4 mb-2">
              <div class="col-sm-3">
                <img src="{{asset('assets/img/profile.png')}}" style="max-width: 120%;">
              </div>
              <div class="col-sm-9">
                <h5 class="card-title">Profile Management</h5>
                <p class="card-text">Pesan cukup dengan satu klik untuk isi detail penumpang</p>
              </div>
            </div>
            <!-- end second item -->
          </div>
        </div>
      </div>
      <!-- End Benefit section -->

      <!-- Begin register form -->
      <div class="col-sm-4">
        <div class="shadow">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-3">Register</h5>
              <h6 class="card-subtitle mb-4">Daftar dan rasakan kemudahannya.</h6>
              <form action="{{ route('register') }}" method="POST">
                {{ csrf_field() }}
                <input type="text" id="email" name="email" class="form-control mb-2" placeholder="Email">
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
      <!-- End login form -->
    </div>
    <!-- End body area -->

  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>