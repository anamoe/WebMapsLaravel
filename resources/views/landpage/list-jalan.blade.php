@extends('landpage.landpage_master')

@section('title')
History Data Jalan
@endsection

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
     
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="col-md-12 pt-1">
        <div class="card">
            <div class="card-header">
                <div class="text-right">
      
                    <a href="{{url('')}}" class="btn btn-primary" >
                        <span class=""> Kembali Dashboard</span>
                    </a>
                </div>
            </div>
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
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
                                    <th style="text-align:center;">Lihat Maps</th>
                              

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

                                      
                                        <a href="{{url('list-jalan',$j->id)}}" class="btn btn-sm btn-primary mb-1" data-placement="bottom" title="Edit" style="color: white;"><i class="fas fa-map-marker-alt"></i></a>

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


@endsection

