@extends('layouts.admin_master')

@section('title')
Kelola Data Jalan
@endsection

@section('content')
<div class="container-fluid">

  
    <div class="row">
    
    <a href="{{ url('create-laporan') }}" class="btn btn-primary">Reset</a>
  
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
                <form action="{{url('pelapor-datajalan')}}" method="POST" id="tambah" enctype="multipart/form-data">
                    @csrf

             
                  
                        <input type="hidden" class="form-control" name="start_latitude" id="start_latitude2" placeholder=" " >    
                        <input type="hidden" class="form-control" name="start_longitude" id="start_longitude2" placeholder="">              
                        <input type="hidden" class="form-control" name="end_latitude" id="end_latitude2" placeholder=" ">     
                        <input type="hidden" class="form-control" name="end_longitude" id="end_longitude2" placeholder=" ">
           
                    <div class="form-group">
                        <label>Latitude Awal</label>
                        <input type="text" class="form-control"  id="start_latitude" placeholder=" "disabled >
                    </div>
                    <div class="form-group">
                        <label>Longitude Awal</label>
                        <input type="text" class="form-control"  id="start_longitude" placeholder=""disabled>
                    </div>
                    <div class="form-group">
                        <label>Latitude Akhir</label>
                        <input type="text" class="form-control" id="end_latitude" placeholder=" "disabled>
                    </div>
                    <div class="form-group">
                        <label>Longitude Akhir</label>
                        <input type="text" class="form-control"  id="end_longitude" placeholder=" " disabled>
                    </div>
                    
                  
                    <div class="form-group">
                        <label>Status Jalan</label>
                        <select class="form-control" name="level_jalan" id="level_jalan">
                            <option value="rusak parah">Rusak Parah</option>
                            <option value="rusak sedang">Rusak Sedang</option>
                   
                        </select>


                        <div class="form-group">
                        <label>Kecepatan KM/JAM</label>
                        <input type="text" class="form-control" name="kecepatan" id="kecepatan" placeholder=" ">
                    </div>
                    </div>
                    <div class="col-sm-12">
                        <center>
                            <p style="font-size:20px;">Upload Foto Laporan</p></center>
                                <div class="form-group upimage">
                                    <button type="button" class="btn btn-primary btn-border btn-block"
                                        onclick="document.getElementById('addgambar').click()">
                                        <i class="fa fa-camera" aria-hidden="true" style="font-size: 50px;"></i>
                                    </button>
                                </div>
                                <br>

                                <div class="text-center">
                                    <img class="img" id="loadfotoadd" src="" alt="Foto Thumbnail"
                                        style=" height:50%; width:50%;">
                                    <input type="file" onchange="readURLfotoadd(this);" class="d-none"
                                        name="foto_laporan" accept="image/*" id="addgambar"></input>
                                </div>
                            </div>
                       


                    <div class="form-group">
                        <input hidden type="number" class="form-control" name="id_status_barang" id="id_status_barang" value="4">
                    </div>
                    <div class="text-right">
                        <button type="button" onclick="tambah()" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



  

@endsection
@section('js')

<script>
    $('#level_jalan').on('change', function() {

        var pilih = $(this).find('option:selected').val();
        console.log(pilih)

        if (pilih == 'rusak parah') {

            document.getElementById('kecepatan').value = "20";
    
        } else {
            document.getElementById('kecepatan').value = "40";
        }


    });
</script>
<script type="text/javascript">

    d
    function readURLfotoadd(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#loadfotoadd')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



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

    }

    document.getElementById('start_latitude').value = posisiTitik.lat();
    document.getElementById('start_longitude').value = posisiTitik.lng();
    document.getElementById('start_latitude2').value = posisiTitik.lat();
    document.getElementById('start_longitude2').value = posisiTitik.lng();
   
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
    
    document.getElementById('end_latitude2').value = posisiTitik.lat();
    document.getElementById('end_longitude2').value = posisiTitik.lng();
    
    //how to set two marker listener
    
 

}
  
  
function initialize() {
    var lineposition1;
    var lineposition2;
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
     
    lineposition2 = event.latLng;
      taruhMarker2(this, event.latLng);
      drawLine()
    }else{
        lineposition1 = event.latLng;
        taruhMarker(this, event.latLng);
   

        
        
    }


  });


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

    function edit(id, start_latitude, start_longitude, end_latitude, end_longitude, kecepatan, level_jalan) {

        $("#edits #start_latitude").val(start_latitude)
        $("#edits #start_longitude").val(start_longitude)
        $("#edits #end_latitude").val(end_latitude)
        $("#edits #end_longitude").val(end_longitude)
        $("#edits #kecepatan").val(kecepatan)
        $("#edits #level_jalan").val(level_jalan).trigger("change");
        $("#edits").attr("action", "{{url('datajalan')}}" + "/" + id)
        $('#editData').modal('show');


    }

    function hapus(id) {

        $("#deleteForm").attr("action", "{{url('datajalan')}}" + "/" + id)
        $("#deleteData").modal("show")
    }
</script>
  
@endsection
