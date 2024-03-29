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
                    <a href="{{url('createmaps')}}" class="btn btn-primary">
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
                                    <th style="text-align:center;">Long Awal</th>
                                    <th style="text-align:center;">Lat AKhir</th>
                                    <th style="text-align:center;">Long Akhir</th>
                                    <th style="text-align:center;">Level Jalan</th>
                                    <th style="text-align:center;">Status</th>
                                    <th style="text-align:center;">Nama</th>
                                    <th style="text-align:center;">Alasan</th>
                                    <th style="text-align:center;">Aksi</th>

                                </thead>

                                <tbody>
                                    @foreach($jalan as $j)

                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center"> {{ Str::limit($j->start_latitude, 5) }}</td>
                                        <td class="text-center">{{ Str::limit($j->start_longitude, 5)}}</td>
                                        <td class="text-center">{{ Str::limit($j->end_latitude, 5)}}</td>
                                        <td class="text-center">{{ Str::limit($j->end_longitude, 5)}}</td>
                                        <td class="text-center">{{$j->level_jalan}}</td>
                                        <td class="text-center">{{$j->status_verifikasi}}</td>
                                        <td class="text-center">{{$j->username}}</td>
                                        <td class="text-center">{{$j->alasan_ditolak}}</td>
                                        <td class="text-center">

                                        <a href="{{url('datajalan-detail',$j->id)}}" class="btn btn-sm btn-success mb-1" data-placement="bottom" title="Edit" style="color: white;"><i class="fas fa-map-marker-alt"></i></a>
                                            <a href="{{url('datajalan',$j->id)}}" class="btn btn-sm btn-warning mb-1" data-placement="bottom" title="Edit" style="color: white;"><i class="fa fa-edit"></i></a>

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

   
    function hapus(id) {

        $("#deleteForm").attr("action", "{{url('datajalan')}}" + "/" + id)
        $("#deleteData").modal("show")
    }
</script>

@endsection