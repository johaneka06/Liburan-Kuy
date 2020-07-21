@extends('layout/template')

@section('title', 'Liburan Kuy - Cari Tiket Liburanmu Disini!')

@section('container')
<div class="container mt-3">
  <!-- Carousel image slider -->
  <div class="d-flex justify-content-center">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style="width: 100%; height: 325px !important">
        <div class="carousel-item active">
          <img class="d-block w-30" src="{{ asset('assets/img/banner1.png') }}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-30" src="{{ asset('assets/img/banner2.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-30" src="..." alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-- End carousel image slider -->
  <div class="shadow-lg p-3 mb-5 mt-5 bg-white" style="border-radius: 25px;">
    <div class="container ml-2">
      <div class="border-bottom">
        <h3>Hei, {{$name}}!</h3>
        <h2>Mau Liburan Kemana?</h2>
        <p class="mt-4">Buruan cari tiket pesawatmu disini!</p>
      </div>
      <input type="checkbox" id="roundTripChck" value="checked" onclick="display()">
      <label for="roundTripChck">Pulang - Pergi</label>
      <form action="flight" method="POST">
        {{ csrf_field() }}
        <div class="row mb-3">
          <div class="col-sm-3 border-right">
            <p style="color: gray;">Dari</p>
            <input type="text" class="form-control" name="dep">
          </div>
          <div class="col-sm-3 border-right">
            <p style="color: gray;">Ke</p>
            <input type="text" class="form-control" name="arr">
          </div>
          <div class="col-sm-2 border-right">
            <p style="color: gray;">Berangkat</p>
            <input type="date" class="form-control" name="depDate">
          </div>
          <div class="col-sm-2 border-right">
            <p style="color: gray;">Pulang</p>
            <input type="date" class="form-control" id="return" name="returnDate" disabled>
          </div>
          <div class="col-sm-2">
            <p style="color: gray;">Penumpang</p>
            <input type="number" class="form-control" name="paxCount" value="1" aria-valuemin="1" aria-valuemax="8">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
      </form>
      
    </div>
  </div>

</div>

<script type="text/javascript">
  function display() {
    var chckBox = document.getElementById("roundTripChck");
    if(chckBox.checked == true) {
      document.getElementById("return").removeAttribute("disabled");
    } else {
      document.getElementById("return").setAttribute("disabled", "");
    }
  }
</script>

@endsection