<!DOCTYPE html>
<html lang="en">

<head>
<style>




/* #content {
 background-color: blue;
 
} */


</style>

    @include('layouts.admin_head')
    <link rel="apple-touch-icon" sizes="76x76" class="rounded-circle" href="{{asset('')}}">
    <link rel="icon" type="image/png" class="rounded-circle" href="{{asset('')}}">
    <!-- Custom fonts for this template-->
    <link href="{{asset('public/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <!-- <link href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <!-- Custom styles for this template-->
    <link href="{{asset('public/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    <!-- <link rel="stylesheet" href="{{asset('public/admin/plugins/select2/css/select2.min.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('public/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>

<body id="page-top">
 

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
     
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
          
                <!-- End of Topbar -->

                <!-- Begin Page Content -->


                <!-- Page Heading -->
                @yield('content')


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('public/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('public/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('public/admin/js/sb-admin-2.min.js')}}"></script>

  
    <script src="{{asset('public/vendor/sweetalert/sweetalert.all.js')}}"></script>

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <!-- <script src="{{asset('public/admin/plugins/select2/js/select2.full.min.js')}}"></script> -->
   <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });

    </script>


    @yield('js')
    

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.js" integrity="sha512-MNW6IbpNuZZ2VH9ngFhzh6cUt8L/0rSVa60F8L22K1H72ro4Ki3M/816eSDLnhICu7vwH/+/yb8oB3BtBLhMsA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
