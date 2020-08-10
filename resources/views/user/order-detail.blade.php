@extends('layout/template')

@section('title', 'Order History')

@extends('user/sidebar')

@section('content')

<div class="mt-4">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3>{{$departure->city}} <small>({{$departure->code}})</small> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z" />
            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z" />
          </svg> {{$arrival->city}} <small>({{$arrival->code}})</small></h3>
        <h6 class="mt-3">Order ID: {{$item->id}}</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h4>Total Pembayaran: </h4>
          </div>
          <div class="col">
            <h4 class="float-right" style="color: rgb(10, 0, 200);">IDR. {{number_format($item->total_price)}}</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-5">
      <div class="card-header">
        <div class="border-bottom">
          <small>Kode booking:</small>
          <h3 class="mb-3"><b>{{$item->booking_code}}</b></h3>
        </div>
        <div class="mt-2">
          <h6>{{$item->airline}}</h6>
          <div class="row mt-3">
            <div class="col-sm-3">
              {{$departure->schedule}} WIB
              <br>
              {{$departure->city}}
            </div>
            <div class="col-sm-2">
              <svg width="3.5em" height="3.5em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z" />
                <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z" />
              </svg>
            </div>
            <div class="col-sm-3">
              {{$arrival->schedule}} WIB
              <br>
              {{$arrival->city}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="accordion mt-3" id="accordionExample">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              <h4><b>Penumpang</b></h4>
            </button>
          </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <div class="container">
              @foreach(array_combine($data->passengersFName, $data->passengerLName) as $fname=>$lname)
              <h5>{{$loop->iteration.". ".$fname." ".$lname}}</h5>
              @endforeach
            </div>

          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="headingTwo">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <h4><b>Atur Pesanan</b></h4>
            </button>
          </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">
            Item 2
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<br><br><br>
<script type="text/javascript">
  var element = document.getElementById("ordr");
  element.classList.remove("bg-light");
  element.classList.add("active");
</script>
@endsection