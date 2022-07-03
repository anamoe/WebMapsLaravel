@extends('layouts.admin_master')

@section('title')
Kelola Data Jalan
@endsection

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="col-md-12 pt-1">
        <div class="card">
            <div class="card-header">
                <div class="text-right">
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData">
                        <span class="fas fa-plus"> Tambah</span>
                    </button> -->
                    <a href="{{url('createmaps')}}" class="btn btn-primary" >
                        <span class="fas fa-plus"> Tambah</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="myTable">

                                <thead>
                                    <th style="text-align:center;">No.</th>
                                    <th style="text-align:center;">Lat Awal</th>
                                    <th style="text-align:center;">Lat AKhir</th>
                                    <th style="text-align:center;">Long Awal</th>
                                    <th style="text-align:center;">Long Akhir</th>
                                    <th style="text-align:center;">Status</th>
                                    <th style="text-align:center;">Aksi</th>

                                </thead>

                                <tbody>
                                    @foreach($jalan as $j)

                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">{{$j->start_latitude}}</td>
                                        <td class="text-center">{{$j->end_latitude}}</td>
                                        <td class="text-center">{{$j->start_longitude}}</td>
                                        <td class="text-center">{{$j->end_longitude}}</td>
                                        <td class="text-center">{{$j->level_jalan}}</td>
                                        <td class="text-center">

                                            <!-- <a href="{{url('datajalan',$j->id)}}" data-toggle="modal" data-target="#editData" onclick="edit('{{$j->id}}','{{$j->start_latitude}}','{{$j->end_latitude}}','{{$j->start_longitude}}',
                                            '{{$j->end_longitude}}','{{$j->kecepatan}}','{{$j->level_jalan}}')" class="btn btn-sm btn-warning mb-1" data-placement="bottom" title="Edit" style="color: white;"><i class="fa fa-edit"></i></a>
                                         -->
                                         <a href="{{url('datajalan',$j->id)}}"  class="btn btn-sm btn-warning mb-1" data-placement="bottom" title="Edit" style="color: white;"><i class="fa fa-edit"></i></a>
                                            
                                            <a href="#" data-toggle="modal" data-target="#deleteData" onclick="hapus('{{$j->id}}')" class="btn btn-sm btn-danger" data-placement="bottom" title="Hapus" style="color: white;">
                                                <i class="fa fa-trash"></i></a>
                                        </td>


                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('datajalan')}}" method="POST" id="tambah" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Lat Awal</label>
                        <input type="text" class="form-control" name="start_latitude" id="start_latitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Lat Akhir</label>
                        <input type="text" class="form-control" name="start_longitude" id="start_longitude" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Longitude Awal</label>
                        <input type="text" class="form-control" name="end_latitude" id="end_latitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Longitude Akhir</label>
                        <input type="text" class="form-control" name="end_longitude" id="end_longitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Kecepatan KM/JAM</label>
                        <input type="text" class="form-control" name="kecepatan" id="kecepatan" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Status Jalan</label>
                        <select class="form-control" name="level_jalan" id="level_jalan">
                            <option value="rusak">Rusak</option>
                            <option value="sedang">Sedang</option>
                            <option value="normal">Normal</option>
                        </select>



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
</div>





<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Jalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="edits" enctype="multipart/form-data">
                    @method("patch")
                    @csrf
                    <div class="form-group">
                        <label>Lat Awal</label>
                        <input type="text" class="form-control" name="start_latitude" id="start_latitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Lat Akhir</label>
                        <input type="text" class="form-control" name="start_longitude" id="start_longitude" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Longitude Awal</label>
                        <input type="text" class="form-control" name="end_latitude" id="end_latitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Longitude Akhir</label>
                        <input type="text" class="form-control" name="end_longitude" id="end_longitude" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label>Kecepatan KM/JAM</label>
                        <input type="text" class="form-control" name="kecepatan" id="kecepatan" placeholder=" ">
                    </div>

                    <div class="form-group">
                        <label>Status Jalan</label>
                        <select class="form-control" name="level_jalan" id="level_jalan">
                            <option value="rusak">Rusak</option>
                            <option value="sedang">Sedang</option>
                            <option value="normal">Normal</option>
                        </select>

                    </div>

                    <div class="text-right">

                        <button type="button" class="btn btn-primary" onclick="document.getElementById('edits').submit()">Perbaharui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteData" role="dialog" aria-labelledby="editpaket" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="deleteForm" method="post">
                    @method("delete")
                    @csrf
                </form>
                <span>Apakah Anda Mau menghapus <span class="map"></span> ?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteForm').submit()">Hapus</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
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