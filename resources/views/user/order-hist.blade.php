@extends('layout/template')

@section('title', 'Order History')

@extends('user/sidebar')

@section('content')
<div class="mt-4">
  <h1>Riwayat Order</h1>
  <div class="container mt-5">
    <form action=" {{ route('findLogs') }} " method="GET" class="form-inline mb-3">
      <label class="my-1 mr-2" for="picker">Tampilkan data dari: </label>
      <select class="custom-select my-1 mr-sm-2" id="picker">
        <option value="30" id="30" selected>30 hari yang lalu</option>
        <option value="90" id="90">90 hari yang lalu</option>
        <option value="0">Custom</option>
      </select>
      <div id="custom" class="row mr-3 ml-3">
        <div class="col">
          <h6>Start date:</h6>
          <input type="date" name="start" id="start" class="form-control">
        </div>
        <div class="col">
          <h6>End date:</h6>
          <input type="date" name="end" id="end" class="form-control">
        </div>
      </div>
      <button type="submit" class="btn btn-primary my-1">Submit</button>
    </form>
    @if($items->isEmpty())
      <h2>Tidak ada history</h2>
    @endif
    <div class="table">
      <table class="table">
        @foreach($items as $item)
        <div class="card mb-4" style="width: auto;">
          <div class="card-body">
            <h5 class="card-title">Pesawat</h5>
            <h6 class="card-subtitle mb-2 text-muted">Order ID: {{$item->id}}</h6>
            <h6 class="card-text"><b>{{$item->departure}} <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z" />
                  <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z" />
                </svg> {{$item->arrival}}</b></h6>
            <div class="row">
              <p class="col md-4">Tanggal keberangkatan: {{ Carbon\Carbon::parse($item->dep_date)->format('d-M-Y') }}</p>
              <p class="col md-4">Jumlah Penumpang: {{ $item->pax }} Penumpang</p>
            </div>
            
            <a href="{{ route('getLogs', ['id' => $item->id]) }}" class="card-link">Detail</a>
          </div>
        </div>
        @endforeach
      </table>
    </div>
  </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
  var element = document.getElementById("ordr");
  element.classList.remove("bg-light");
  element.classList.add("active");

  $(document).ready(function() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = (now.getFullYear() + "-" + month + "-" + day);
    $('#end').val(today);
    
    now.setDate(now.getDate()-30);
    day = ("0" + now.getDate()).slice(-2);
    month = ("0" + (now.getMonth() + 1)).slice(-2);
    today = (now.getFullYear() + "-" + month + "-" + day);
    $('#start').val(today);
  })

  $(function() {
    $('#custom').hide();
    $('#picker').change(function() {
      $('#custom').hide();
      var selected = $(this).val();
      if (selected == "0") {
        $('#custom').show();
      } else if(selected == '90') {
        var dt = new Date();
        dt.setDate(dt.getDate() - 90);
        var date = ("0" + dt.getDate()).slice(-2);
        var month = ("0" + (dt.getMonth() + 1)).slice(-2);
        var past = dt.getFullYear() + "-" + month + "-" + date;
        $('#start').val(past);
      }
    })
  });
</script>
@endsection