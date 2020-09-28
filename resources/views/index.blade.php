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
            <input type="text" class="dari form-control" name="dep">
          </div>
          <div class="col-sm-3 border-right">
            <p style="color: gray;">Ke</p>
            <input type="text" class="ke form-control" name="arr">
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script type="text/javascript">
  function display() {
    var chckBox = document.getElementById("roundTripChck");
    if (chckBox.checked == true) {
      document.getElementById("return").removeAttribute("disabled");
    } else {
      document.getElementById("return").setAttribute("disabled", "");
    }
  }

  $.noConflict();

  jQuery('.dari').select2({
    placeholder: "Dari",
    ajax: {
      url: '/flight/autocomplete',
      type: 'GET',
      dataType: 'json',
      delay: 250,
      processResults: function(data) {
        return {
          results: jQuery.map(data, function(item){
            console.log(item.name)
            return {
              text: item.name,
              id: item.ICAO
            }
          })
        };
      }
    },
    cache: true
  });

  jQuery('.ke').select2({
    placeholder: "Tujuan",
    ajax: {
      url: '/flight/autocomplete',
      type: 'GET',
      dataType: 'json',
      delay: 250,
      processResults: function(data) {
        return {
          results: jQuery.map(data, function(item){
            console.log(item.name)
            return {
              text: item.name,
              id: item.ICAO
            }
          })
        };
      }
    },
    cache: true
  });
</script>

@endsection