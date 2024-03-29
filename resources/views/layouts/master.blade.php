<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemetaan Jalan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <!-- <link rel="stylesheet" href="{{asset('public/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> -->
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('public/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('public/template/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/template/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <script src="{{asset('public/template/plugins/splash/js-splash-2.0.min.js')}}"></script>
    <script src="{{asset('public/template/plugins/jquery/jquery.min.js')}}"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.js" integrity="sha512-MNW6IbpNuZZ2VH9ngFhzh6cUt8L/0rSVa60F8L22K1H72ro4Ki3M/816eSDLnhICu7vwH/+/yb8oB3BtBLhMsA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        #map {
            height: 600px;

        }
    </style>
</head>

<body class="hold-transition layout-fixed mx-auto">

    <!-- Splash -->
    <!-- <script id="rendered-js">
        var splash = new Splash({
            background: 'rgba(255,255,255,.9)'
        });
        var custom_node = document.createElement("div");

        var text = document.createElement("strong");
        text.innerText = "Web Masp Jalan";

        var img = document.createElement("img");
        img.src = "https://s3.amazonaws.com/cdn.wp.m4ecnet/wp-content/uploads/2018/06/05041237/GitHub-logo-2-imagen.jpg";
        Object.assign(img.style, {
            // img.src = "https://s3.amazonaws.com/cdn.wp.m4ecnet/wp-content/uploads/2018/06/05041237/GitHub-logo-2-imagen.jpg";
            width: '100px',
            height: '100px',
            'border-radius': '50%'
        });


        custom_node.appendChild(img);
        custom_node.appendChild(text);

        splash.fromCustomNode(custom_node, 2000, {
            color: 'red',
            'font-family': 'fantasy'
        });
    </script> -->


    <!-- /Splash -->
    <div class="wrapper mx-auto">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrappers">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">

                            <h1 class="m-0 text-center">Pemetaan Jalan Rusak </h1>

                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content mx-auto  text-center">
                <div class="container-fluid mx-auto">
                    <!-- Small boxes (Stat box) -->
                    <div class="row mx-auto">
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h4>Update Data Terbaru</h4>

                                    <p>{{$data_baru->created_at}}</p>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h4>Jumlah Jalan Rusak</h4>
                                    <p>{{$titik_total}} Titik Lokasi</p>
                                </div>
                            </div>
                        </div>


                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">



                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">

                            <div class="row">
                                <div class="col-sm-3">

                                </div>
                                <div class="col-sm-3">
                                    <form action="{{url('/')}}" method="get">

                                        <div class="form-group ml-1" style="display:inline-block">

                                            <select name="status" type="text" class="form-control">

                                                <option value="" selected disabled>Pilih Level Jalan</option>
                                                <option value="" @if($status=='' ) {{'selected="selected"'}} @endif>
                                                    Semua</option>
                                                <option value="rusak sedang" @if($status=='rusak sedang' ) {{'selected="selected"'}} @endif>Rusak Sedang</option>
                                                <option value="rusak parah" @if($status=='rusak parah' ) {{'selected="selected"'}} @endif>Rusak Parah</option>

                                            </select>

                                        </div>

                                    </form>
                                </div>
                                <div class="col-sm-2">

                                    <a class="btn btn-primary" href="{{url('list-jalan')}}" title="">Riwayat Data Jalan</a>
                                </div>
                                <div class="col-sm-1">
                                    @if(auth()->check())
                                <a class="btn btn-primary" href="{{url('datajalan')}}" title="">Admin</a>
                                <br><br>
                                @else
                                <a class="btn btn-primary" href="{{url('login')}}" title="">Login</a>
                                @endif
                                </div>
                            </div>
                            <br>




                            <div class="col-md-12 col-xs-12 map">
                                <div id="map" style="border-radius: 15px;" class="shadow"></div>

                            </div>
                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">


                        </section>
                        <!-- right col -->
                    </div>

                </div><!-- /.container-fluid -->

            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer text-center">
            <strong>Copyright &copy; 2022 <a href="#">Pemetaan Jalan</a></strong>


        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <script src="{{asset('public/template/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- <script src="{{asset('public/template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->

    <!-- AdminLTE App -->
    <script src="{{asset('public/template/dist/js/adminlte.js')}}"></script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDv-h2II7DbFQkpL9pDxNRq3GWXqS5Epts&callback=initialize"
        type="text/javascript"></script>
    <!-- AIzaSyATLas4hCAqv4Cyyt_CxYvzUS66vTOt6ds -->

    <script>
    var geocoder;
    var map;
    var z;

    $("select[name='status']").change(function() {
        initialize()
    });

    function initialize() {
        var array = [];
        var dataKoordinat = [];
        var dataKoordinat2 = [];

        var array2 = [];
        var bounds = new google.maps.LatLngBounds();
        var map = new google.maps.Map(
            document.getElementById("map"), {
                center: new google.maps.LatLng(-8.478316, 114.335231),
                zoom: 11,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });


        var lineSymbol = {
            path: 'M 0,-1 0,1',
            strokeOpacity: 1,
            strokeWeight: 6,
            scale: 3
        };

        var color = ["#26ff00", "#998500", "#FF0000"];
        var icons = [
            [{
                icon: lineSymbol,
                offset: '40%',
                repeat: '15px'
            }],
            [{
                icon: lineSymbol,
                offset: '20%',
                repeat: '15px'
            }],
            [{
                icon: lineSymbol,
                offset: '10%',
                repeat: '10px'
            }]
        ];


        axios.get("{{url('/')}}/?status=" + $("select[name='status']").val())
            .then(res => {
              

                res.data.forEach(data => {
                    if (data.level_jalan == "rusak parah") {
                        array.push([data.kecepatan+'    KM/JAM', data.start_latitude, data.start_longitude, data.foto_laporan]);
                        dataKoordinat.push([data.start_latitude, data.start_longitude, data
                            .end_latitude, data.end_longitude
                        ]);
                    } else {
                        array2.push([data.kecepatan+'   KM/JAM', data.start_latitude, data.start_longitude, data.foto_laporan]);
                        dataKoordinat2.push([data.start_latitude, data.start_longitude, data
                            .end_latitude, data.end_longitude 
                        ]);
                    }
                    console.log(dataKoordinat);
                    for (var i = 0; i < array2.length; i++) {

                        var position = new google.maps.LatLng(array2[i][1], array2[i][2]);

                        bounds.extend(position);

                        var marker = new google.maps.Marker({

                        });

                        var infoWindow = new google.maps.InfoWindow({
                            content: '<div class="content "><p>' +
                                '<h6>kec:' + array2[i][0] + '</h6>' +
                                '</p></div>'+
                                '<img height="40"  style="margin:0 auto; display:block;" src="public/foto_laporan/' + array2[i][3] + '"/><br/>' ,
                                
                            position: new google.maps.LatLng(array2[i][1], array2[i][2])
                        });

                        infoWindow.open(map, marker);
                    }


                    for (var i = 0; i < array.length; i++) {

                        var position = new google.maps.LatLng(array[i][1], array[i][2]);

                        bounds.extend(position);

                        var marker = new google.maps.Marker({});


                        var infoWindow = new google.maps.InfoWindow({
                            content: '<div class="content "><p>' +
                                '<h6>kec:' + array[i][0] + '</h6>' +
                                '</p></div>'+
                                '<img height="40s" style="margin:0 auto; display:block;" src="public/foto_laporan/' + array[i][3] + '"/><br/>' ,

                            position: new google.maps.LatLng(array[i][1], array[i][2])
                        });


                        infoWindow.open(map, marker);

                    }



                    for (var i = 0; i < dataKoordinat.length; i++) {
                        var ic = i % 2 == 0 ? icons[2] : icons[2]
                        var sc = i % 2 == 0 ? color[2] : color[2]
                        var line = new google.maps.Polyline({

                            path: [new google.maps.LatLng(dataKoordinat[i][0], dataKoordinat[i][
                                    1
                                ]),
                                new google.maps.LatLng(dataKoordinat[i][2], dataKoordinat[i]
                                    [3])
                            ],
                            strokeOpacity: 0,
                            icons: ic,
                            strokeColor: sc,
                            map: map
                        });
                    }

                    for (var i2 = 0; i2 < dataKoordinat2.length; i2++) {
                        var ic2 = i2 % 2 == 0 ? icons[2] : icons[2]
                        var sc2 = i2 % 2 == 0 ? color[1] : color[1]
                        var line2 = new google.maps.Polyline({

                            path: [new google.maps.LatLng(dataKoordinat2[i2][0], dataKoordinat2[
                                    i2][1]),
                                new google.maps.LatLng(dataKoordinat2[i2][2],
                                    dataKoordinat2[i2][3])
                            ],
                            strokeOpacity: 0,
                            icons: ic2,
                            strokeColor: sc2,
                            map: map
                        });
                    }


                })

            })


    }
    google.maps.event.addDomListener(window, "load", initialize);
    </script>

</body>

</html>