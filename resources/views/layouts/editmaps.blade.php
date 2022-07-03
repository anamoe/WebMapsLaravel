@extends('layouts.admin_master')

@section('title')
Kelola Data Jalan
@endsection

@section('content')
<div class="container-fluid">

  
    <div class="row">
    
    <a href="{{ url('createmaps') }}" class="btn btn-primary">Reset</a>
  
    </div>
    <br>
<div class="row">
  <div id="googleMap" style="width:100%;height:400px;"></div>
  </div>

  
</div>

    <div class="modal-dialog" role="document" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jalan</h5>
               
            </div>
            <div class="modal-body">
                <form action="{{url('datajalan',$id)}}" method="POST" id="edit" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label>Lat Awal</label>
                        <input type="text" class="form-control" value="{{$data->start_latitude}}" name="start_latitude" id="start_latitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Longitude Awal</label>
                        <input type="text" class="form-control" value="{{$data->start_longitude}}" name="start_longitude" id="start_longitude" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>LAT AKHIR</label>
                        <input type="text" class="form-control" value="{{$data->end_latitude}}" name="end_latitude" id="end_latitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Longitude Akhir</label>
                        <input type="text" class="form-control" name="end_longitude" value="{{$data->end_longitude}}" id="end_longitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Kecepatan KM/JAM</label>
                        <input type="text" class="form-control"  value="{{$data->kecepatan}}"name="kecepatan" id="kecepatan" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Status Jalan</label>
                        <select class="form-control" name="level_jalan" id="level_jalan">
                            <option value="rusak">Rusak</option>
                            <option value="sedang">Sedang</option>
                            <!-- <option value="normal">Normal</option> -->
                        </select>



                    </div>


                    <div class="form-group">
                        <input hidden type="number" class="form-control" name="id_status_barang" id="id_status_barang" value="4">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
    //   marker.addListener('position_changed', function() {
    //     drawPolyline();
    //   });

    //   //store the marker object drawn in global array
    //   markersArray.push(marker);
    }
    console.log(posisiTitik)

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
 
  var propertiPeta = {
    center:new google.maps.LatLng(-8.478316, 114.335231),
    zoom:9,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  //set reponse two click listener 
  
  
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    if(marker){
     
    
      taruhMarker2(this, event.latLng);
    }else{
        taruhMarker(this, event.latLng);
     
        
    }
    drawPolyline();


  });

  function drawPolyline() {
      let markersPositionArray = [];
      // obtain latlng of all markers on map
      markersArray.forEach(function(e) {
        markersPositionArray.push(e.getPosition()
        );
        console.log(markersPositionArray+'data');
      }
      );

      // check if there is already polyline drawn on map
      // remove the polyline from map before we draw new one
      if (polyline !== null) {
        polyline.setMap(null);
      }

      // draw new polyline at markers' position
      polyline = new google.maps.Polyline({
        map: map,
        path: markersPositionArray,
        strokeOpacity: 0.4
      });
    }

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>
<script type="text/javascript">
    $(document).ready(function() {

        @if(session()->has('message'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{session()->get('message')}}",
        })
        @endif


    });

    function tambah() {


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
            $('#tambah').submit();
        }



    }

    
</script>
  
@endsection
