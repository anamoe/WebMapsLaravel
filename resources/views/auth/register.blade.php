<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WEBMAPS JALAN</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('public/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('public/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-10">

                        <!-- Nested Row within Card Body -->
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <!-- <img class="rounded-circle" src="{{asset('public/admin/logo2.jpg')}}" width="100"
                                        height="auto" alt=""> -->
                                    <h1 class="h4 text-gray-900 mb-4">DAFTAR PELAPOR</h1>
                                </div>
                                @if(session()->has('error'))
                                <div class="alert alert-danger" role="alert" id="notif">

                                    <span data-notify="icon" class="fa fa-bell"></span>
                                    <span data-notify="title">Gagal</span> <br>
                                    <span data-notify="message">{{session()->get('error')}}</span>
                                </div>
                                @endif
                                <form class="user" action="{{url('register')}}" method="POST" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <input type="text" required class="form-control form-control-user" id="email" name="email" placeholder="Email...">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" required class="form-control form-control-user" id="username" name="username" placeholder="Username...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" required class="form-control form-control-user" id="password" name="password" placeholder="Password...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" required class="form-control form-control-user" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Password...">
                                    </div>
                                    
                                   
                                  
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary"><a>
                                                DAFTAR
                                            </a>
                                        </button>

                                    </div>
                                </form>
                              
                            </div>

                            
                            <div class="row">
                            <div class="col-3">
                            </div>
                                <div class="col-3">
                                    <a href="{{url('login')}}"> <button type="submit" class="btn btn-primary">
                                            LOGIN
                                        </button>
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="{{url('/')}}"> <button type="submit" class="btn btn-primary">
                                            HOME

                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('public/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('public/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script>

$(document).ready(function() {

@if(session()->has('message'))
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: "{{session()->get('message')}}",
})
@endif


});

    </script>


</body>

</html>