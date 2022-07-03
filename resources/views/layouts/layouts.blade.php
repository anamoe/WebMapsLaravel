<!-- Template untuk halaman admin-->
<!DOCTYPE html>

<html>

<head>

	<title></title>

	<!-- Javascript Font Awesome Icon -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

	<!-- Font Awesome Icon CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Kode untuk membuat ikon pada tab browser -->
	<link rel="shortcut icon" href="https://img.icons8.com/color/40/000000/radio-tower.png">

	<!-- Kode untuk mengakses css Sweet Alert -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"  >

	<!-- Kode untuk mengakses css Boostrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Kode untuk mengakses javascript Sweet Alert -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

	<!-- Kode untuk mengakses javascript JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Kode untuk mengakses javascript Google Map API -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC68gJT0BtgwM_Mc8jMmC7T4FuTQ6IhISc&callback=initialize"
    async defer></script>

    

	<!-- Kode untuk membuat tampilan web menyesuaikan ukuran device -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Kode untuk membuat kode css layout -->

	<!-- START CSS -->

	<style type="text/css">

		/* Kode CSS untuk mengatur tag body */

		body{

	        /* Mengatur warna Background */
	        background: #104FAD; 

	        /* Mengatur font*/
	        font-family: Segoe UI; 
	        
	    }

	    /* Kode CSS untuk mengatur class sidebar */

	    .sidebar{

	    	/* Mengatur warna Background */
	    	background: #BED1ED;

	    	/* Mengatur ukuran jarak padding */
	    	padding: 20px;

	    	/* Mengatur scroll */
	    	overflow: auto; 

	    	/* Mengatur lengkungan border */
	    	border-radius: 3px;
	    	
	    }

	    /* Kode CSS untuk mengatur class map */

	    .map{

	    	/* Mengatur ukuran jarak padding */
	    	padding: 20px;

	    	/* Mengatur warna background */
	    	background: #BED1ED;

	    	/* Mengatur lengkungan border */
	    	border-radius: 3px;
	    	
	    }
	  	
	    /* Kode CSS untuk mengatur id mapid */

	    #mapid { 

	    	/* Mengatur ukuran tinggi */
	  		height: 500px;
		}
		
		/* Kode CSS untuk mengatur tampilan web jika ukuran layar max 768px */

		@media (max-width: 768px) { 

			/* Kode CSS untuk mengatur class sidebar */

	    	.sidebar{

	    		/* Mengatur ukuran margin atas */
	    		margin-top:20px;  

	    	}

	    	
	    }

	    /* Kode CSS untuk mengatur tampilan web jika ukuran layar max 768px */

	    @media (max-width: 1024px) { 

	    	/* Kode CSS untuk mengatur class sidebar */

	    	.sidebar{

	    		/* Mengatur ukuran margin atas */
	    		margin-top:20px;  

	    	}

	    	
	    }

	    /* Kode CSS untuk mengatur class content */

        .content{

        	/* Mengatur ukuran margin atas */
        	margin-top: 130px;

        }

        /* Kode CSS untuk mengatur class navbar */

        .navbar{

        	/* Mengatur ukuran lebar */
        	width: 100%;

        	/* Mengatur posisi tumpukan/layer elemen */
        	z-index: 100;

        	/* Mengatur posisi element */
        	position: fixed;

        	/* Mengatur warna background */
        	background: #89C4F4;

        	/* Mengatur warna teks */
        	color: #ffffff;
        	
        }

        /* Kode CSS untuk mengatur class navbar-nav */

        .navbar-nav{

        	/* Mengatur warna background */
        	background: #89C4F4;

        	/* Mengatur ukuran lebar */
        	width: 100%;

        	/* Mengatur ukuran padding kanan */
        	padding-right: 50px;

        	/* Mengatur warna teks */
        	color: #fff;
        }

    	/* Kode CSS untuk mengatur class nav-item */

        .nav-item{

        	/* Mengatur ukuran padding kanan */
        	padding-right: 20px;

        }

        /* Kode CSS untuk mengatur class navbar-brand */

        .navbar-brand{

        	/* Mengatur ukuran padding kiri */
        	padding-left: 20px;

        	/* Mengatur warna teks */
        	color: #1366e8;

        	/* Mengatur format teks link */
        	text-decoration: none;
        }

        
        /* Kode CSS untuk mengatur class table */

        .table{

        	/* Mengatur warna background */
        	background: #fafafa;

        	/* Mengatur ukuran padding */
        	padding: 10px;
        }

        /* Kode CSS untuk mengatur class modal-body */

        .modal-body{

        	/* Mengatur Scroll */
        	overflow: auto;
        }

        /* Kode CSS untuk mengatur class invalid-feedback */

        .invalid-feedback{

        	/* Mengatur ukuran teks */
        	font-size: 16px;
        }

	</style>

	<!-- END CSS -->
</head>

<body>
	
	<!-- Start Container  -->

	<div class="container-fluid">

		<!-- Start Row Navbar -->

		<div class="row">

			<!-- Start Navbar -->



			<!-- End Navbar -->

		</div>

		<!-- End Row Navbar -->
		
		<!-- Start Row Content -->
		<div class="row content">

			<!-- Start Colomn 1 -->
			<div class="col-lg-6 ">

				<!-- Start Map Tampil -->

				<!-- Start Container Map -->
				<div class="map">

					<!-- Judul -->
					<h4>Lokasi Tower</h4>

					<!-- Map -->
				 	<div id="mapTampil" style="width: 100%; height: 500px; border-radius: 3px;"></div>
			 	</div>

			 	<!-- End Container Map -->

			    <script type="text/javascript">

			        //Membuat array untuk simpat data dari database
			        var array = [];
			    </script>
			    
			    <!-- Start Mengambil data dari tabel tower -->
			 

			    <!-- End Mengambil data dari tabel tower -->

			    <!-- Start Map Javascript -->
			    <script>

			        //Fungsi Buat Map
			        function initialize() {

				        //==========================Start Map Tampil=====================================

				        //titik bounds/batas
				        var bounds = new google.maps.LatLngBounds();

				        //Properti peta
				        var propertiPeta = {
				        	//posisi tampilan map
				            center:new google.maps.LatLng(-8.2493419,113.7516165),

				            //ukuran zoom map
				            zoom:9,

				            //type map
				            mapTypeId:google.maps.MapTypeId.ROADMAP
				        };

				        //Membuat Peta
				        var peta = new google.maps.Map(document.getElementById("mapTampil"), propertiPeta);
				          
				        //Kotak Marker
				        var infoWindow = new google.maps.InfoWindow(), marker, i;
				        
				        // Start Perulangan ambil data tabel
				        for (var i = 0; i < array.length; i++) {

				            // membuat posisi titik Marker
				            var position = new google.maps.LatLng(array[i][0],array[i][1]);

				            //titik batas 
				            bounds.extend(position);

				            //membuat marker
				            var marker= new google.maps.Marker({

				                //mengatur posisi marker
				                position: position,

				                //mengatur map yang digunakan
				                map: peta,

				                //mengatur ikon marker
				                icon : {
				                	url : 'https://img.icons8.com/color/40/000000/radio-tower.png',
				                	labelOrigin: new google.maps.Point(20, 50)

				            	},
				            	//mengatur label
				                label : {
				                	text : array[i][2],
				                	fontWeight : 'bold',
				                	fontSize: '12px'
				                }
				            });

				            // Tambah kotak ke marker    
				            google.maps.event.addListener(marker, 'click', (function(marker, i) {

				                return function() {

				                	//Tempat isi kotak marker
				                    @yield('content_marker')

				                    //Mengatur kotak isi
				                    infoWindow.setContent(infoWindowContent);

				                    //Mengatur kotak ke map
				                    infoWindow.open(peta, marker);
				                }

				            })(marker, i));

				        }

				        // End Perulangan ambil data tabel

				        // Hilangkan kotak ketika diklik marker
				        var boundsListener = google.maps.event.addListener((peta), 'bounds_changed', function(event) {

				        		// Hilangkan listener
				                google.maps.event.removeListener(boundsListener);

				        });

				        //Start batas wilayah

				        //Array titik koordinat batas wilayah

				        var dataKoordinat =	[[-8.23811,113.3193],[-8.21135,113.33682],[-8.20602,113.35185],[-8.19729,113.35863],[-8.18516,113.36816],[-8.18059,113.36951],[-8.1706,113.36743],[-8.15943,113.37838],[-8.14082,113.37118],[-8.13288,113.3762],[-8.12291,113.36784],[-8.10988,113.37441],[-8.09412,113.37411],[-8.07961,113.36733],[-8.0787,113.35781],[-8.05655,113.34743],[-8.03815,113.35215],[-8.03121,113.35625],[-8.02631,113.36447],[-8.01958,113.37817],[-8.0044,113.38495],[-8.00213,113.39449],[-8.00665,113.4047],[-8.01094,113.42994],[-8.02305,113.44557],[-8.01788,113.44926],[-8.02632,113.46532],[-8.02423,113.47536],[-8.02079,113.47373],[-8.00234,113.48146],[-8.00334,113.49348],[-8.00094,113.50206],[-8.00634,113.50618],[-8.01169,113.52953],[-8.00616,113.53984],[-7.99928,113.54911],[-7.99103,113.56044],[-7.98142,113.56353],[-7.98134,113.57538],[-7.98261,113.58517],[-7.97679,113.59685],[-7.98014,113.60371],[-7.98822,113.60921],[-7.98575,113.61917],[-7.97993,113.62157],[-7.97905,113.62861],[-7.97488,113.63076],[-7.97138,113.63634],[-7.97435,113.64218],[-7.96802,113.65265],[-7.96781,113.67068],[-7.99335,113.67493],[-8.00733,113.68536],[-8.01179,113.69511],[-8.01353,113.71584],[-8.03809,113.73533],[-8.04763,113.74295],[-8.0626,113.74919],[-8.04903,113.74857],[-8.04021,113.77473],[-8.05287,113.80452],[-8.0477,113.80974],[-8.04662,113.81907],[-8.04581,113.84598],[-8.03854,113.85813],[-8.02039,113.84419],[-8.02215,113.85134],[-8.0171,113.85576],[-8.02633,113.8636],[-8.0274,113.87144],[-8.02751,113.8837],[-8.01402,113.88771],[-8.02405,113.91432],[-8.03475,113.932],[-8.04665,113.94487],[-8.05566,113.97328],[-8.07206,113.99779],[-8.08982,114.0168],[-8.10546,114.02109],[-8.10852,114.03491],[-8.11438,114.04094],[-8.1216,114.04354],[-8.12776,114.04441],[-8.13256,114.04253],[-8.14066,114.03524],[-8.1396,114.02644],[-8.14127,114.01971],[-8.15254,114.01031],[-8.16245,114.00023],[-8.17063,114.00017],[-8.18765,113.98706],[-8.20161,113.96983],[-8.20383,113.95418],[-8.21819,113.96454],[-8.223,113.96767],[-8.23627,113.96271],[-8.24275,113.96393],[-8.25205,113.95406],[-8.26407,113.94899],[-8.27167,113.93603],[-8.28199,113.92925],[-8.29889,113.92736],[-8.3158,113.9241],[-8.32811,113.93904],[-8.33499,113.95878],[-8.34289,113.9665],[-8.3518,113.9732],[-8.36081,113.97062],[-8.36879,113.96221],[-8.3839,113.96307],[-8.39142,113.95625],[-8.40369,113.9611],[-8.40676,113.93829],[-8.42886,113.93127],[-8.44315,113.90623],[-8.42651,113.901],[-8.42397,113.88808],[-8.42278,113.87448],[-8.42041,113.86569],[-8.42414,113.86101],[-8.42958,113.85713],[-8.43909,113.85599],[-8.44385,113.85029],[-8.4551,113.8389],[-8.46703,113.8337],[-8.48168,113.83639],[-8.49124,113.84286],[-8.49443,113.8398],[-8.50757,113.8496],[-8.52342,113.86283],[-8.53215,113.8601],[-8.53612,113.85119],[-8.5462,113.84468],[-8.55158,113.84074],[-8.55291,113.83637],[-8.55221,113.83337],[-8.54791,113.83501],[-8.5443,113.8339],[-8.53932,113.83348],[-8.53615,113.83773],[-8.52982,113.83608],[-8.52688,113.82791],[-8.54239,113.82655],[-8.54593,113.81608],[-8.55999,113.81797],[-8.56133,113.8106],[-8.55843,113.81],[-8.55766,113.80523],[-8.54568,113.80562],[-8.54649,113.80994],[-8.54215,113.81073],[-8.53828,113.81216],[-8.52666,113.77373],[-8.56567,113.73666],[-8.54493,113.679],[-8.51117,113.53561],[-8.52575,113.2716],[-8.49094,113.23641],[-8.45341,113.25478],[-8.30739,113.30403],[-8.29756,113.31287],[-8.26614,113.32226],[-8.25654,113.32387],[-8.23811,113.3193]];

				        //array untuk posisi titik koordinat
				        var garis = [];

				        //perulangan menyimpan posisi titik koordinat
				        for (var i = 0; i < dataKoordinat.length; i++) {

				        	//proses menyimpan posisi
				        	garis[i] = new google.maps.LatLng(dataKoordinat[i][0],dataKoordinat[i][1]);
				        }

				        //membuat garis batas 1
				        var poly = new google.maps.Polyline({

							path:garis,
							strokeColor:"#ff0000",
							strokeOpacity:0.8,
							strokeWeight:2,
							
							  
						});

				        //membuat garis batas 2
						var poly2 = new google.maps.Polyline({


							path:garis,
							strokeColor:"#ff0000",
							strokeOpacity:0.8,
							strokeWeight:2
						
						});

						//Mengatur garis satu pada Map Tampil

						poly.setMap(peta);

						//End batas wilayah

				        //==========================End Map Tampil=====================================


				        //==========================Start Map Input=====================================

				        //Tempat isi Map Input
				        @yield('mapInput')

				        //==========================End Map Input=====================================

			        }
			    </script>

			    <!-- End Map Javascript -->


			    <!-- End Map Tampil -->

			</div>

			<!-- End Colomn 1 -->


			<!-- Start Colomn 2 -->

			<div class="col-lg-6 sidebar">

				<!-- Tempat isi sidebar -->
				@yield('sidebar')

			</div>

			<!-- End Colomn 2 -->
			
		</div>

		<!-- End Row Content -->

	</div>
	<!-- End Container  -->

	<!-- Javascript Boostrap  -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>