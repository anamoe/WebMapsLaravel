@extends('layouts.admin_master')

@section('title')
Kelola Data Jalan
@endsection

@section('content')
<div class="container-fluid">

  
    <div class="row">
    
    <a href="{{ url('datajalan') }}" class="btn btn-primary">Kembali</a>
  
    </div>
    <br>
<div class="row">
  <div id="googleMap" style="width:100%;height:400px;"></div>
  </div>

  
</div>

    <div class="modal-dialog" role="document" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Jalan</h5>
               
            </div>
            <div class="modal-body">
                <form action="{{url('update_jalan_acc',$id)}}" method="POST" id="edit" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label>Lat Awal</label>
                        <input type="text" class="form-control" value="{{$data->start_latitude}}" name="start_latitude" readonly id="start_latitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Longitude Awal</label>
                        <input type="text" class="form-control" value="{{$data->start_longitude}}" name="start_longitude" readonly id="start_longitude" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>LAT AKHIR</label>
                        <input type="text" class="form-control" value="{{$data->end_latitude}}" name="end_latitude" readonly id="end_latitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Longitude Akhir</label>
                        <input type="text" class="form-control" name="end_longitude" value="{{$data->end_longitude}}" readonly id="end_longitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Kecepatan KM/JAM</label>
                        <input type="text" class="form-control"  value="{{$data->kecepatan}}"name="kecepatan" readonly id="kecepatan" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Status Jalan</label>
                        <select readonly class="form-control" name="level_jalan" id="level_jalan">
                            <option value="rusak">Rusak</option>
                            <option value="sedang">Sedang</option>
                            <!-- <option value="normal">Normal</option> -->
                        </select>



                    </div>
                    <div class="col-sm-12">
                    <center>
                       
                            <p style="font-size:20px;">Upload Foto Laporan</p></center>
                                <!-- <div class="form-group upimage">
                                    <button type="button" class="btn btn-primary btn-border btn-block"
                                        onclick="document.getElementById('addgambar').click()">
                                        <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                    </button>
                                </div> -->
                                <br>

                                <div class="text-center">
                                <img class="img" id="loadfotoadd" src="{{url('public/foto_laporan/'.$data->foto_laporan)}}" alt="Foto Thumbnail"
                                        style=" height:50%; width:50%;">
                                    <input type="file" onchange="readURLfotoadd(this);" class="d-none"
                                        name="foto_laporan" accept="image/*" id="addgambar"></input>
                                </div>
                            </div>




                </form>
            </div>
        </div>
    </div>



  

@endsection
@section('js')

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDv-h2II7DbFQkpL9pDxNRq3GWXqS5Epts&callback=initialize"
       ></script>
<script>
  var marker;
  var marker2;
  let markersArray = [];
    let polyline = null;
    let map;

    var data = @json($data);

//     taruhMarker2(this,new google.maps.LatLng(  document.getElementById('start_latitude').value, document.getElementById('start_longitude').value));
// taruhMarker1(this, new google.maps.LatLng(  document.getElementById('end_latitude').value, document.getElementById('end_longitude').value));

function taruhMarker(peta, posisiTitik){
    // membuat Marker
    if( marker){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });

    }

    document.getElementById('start_latitude').value = posisiTitik.lat();
    document.getElementById('start_longitude').value = posisiTitik.lng();

   
    //how to set two marker listener

}
function taruhMarker2(peta, posisiTitik){
    // membuat Marker
    if( marker2){
      // pindahkan marker
      marker2.setPosition(posisiTitik);
    
    } else {
      // buat marker baru
      marker2 = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
      
    }

    document.getElementById('end_latitude').value = posisiTitik.lat();
    document.getElementById('end_longitude').value = posisiTitik.lng();
    
    //how to set two marker listener

 

}


  
  
function initialize() {
    var lineposition1;
    var lineposition2;
    
    // if(document.getElementById('start_latitude').value!='' && document.getElementById('start_longitude').value!=''){
    // lineposition1=  new google.maps.LatLng(  document.getElementById('start_latitude').value, document.getElementById('start_longitude').value);
    // lineposition2= new google.maps.LatLng(  document.getElementById('end_latitude').value, document.getElementById('end_longitude').value);
    // drawLine()
    // }
  var propertiPeta = {
    center:new google.maps.LatLng(data.start_latitude, data.start_longitude),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  //set reponse two click listener 
  lineposition1 = new google.maps.LatLng(data.start_latitude, data.start_longitude);
  lineposition2 = new google.maps.LatLng(data.end_latitude, data.end_longitude);
  taruhMarker(peta, lineposition1);
  taruhMarker2(peta, lineposition2);
  drawLine()
  



  var bentukjalan;

  function drawLine(){
    var jalan = [
        lineposition1,
        lineposition2
  ];
    if(bentukjalan) {
       bentukjalan.setPath(jalan);
   } else {
    bentukjalan = new google.maps.Polyline({
    path: jalan,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });
  bentukjalan.setMap(peta);
   }
   
   


  }
  

}

// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>
<script type="text/javascript">
       document.getElementById('level_jalan').value = "{{$data->level_jalan}}";
    $(document).ready(function() {

        @if(session()->has('message'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{session()->get('message')}}",
        })
        @endif


    });

    function edit() {


        if ($('#start_latitude').val() == "") {
            $('#start_latitude').addClass('is-invalid')
        }
        if ($('#start_longitude').val() == "") {
            $('#start_longitude').addClass('is-invalid')
        }
        if ($('#end_latitude').val() == "") {
            $('#end_latitude').addClass('is-invalid')
        }
        if ($('#end_longitude').val() == "") {
            $('#end_longitude').addClass('is-invalid')
        }
        if ($('#level_jalan').val() == "") {
            $('#level_jalan').addClass('is-invalid')
        }
        if ($('#kecepatan').val() == "") {
            $('#kecepatan').addClass('is-invalid')
        }
        if ($('#start_latitude').val() != "" && $('#start_longitude').val() != "" && $('#end_latitude').val() != "" && $('#end_longitude').val() != "" && $('#level_jalan').val() != "" && $('#kecepatan').val() != "") {
            $('#edit').submit();
        }



    }

    
</script>
  
@endsection
