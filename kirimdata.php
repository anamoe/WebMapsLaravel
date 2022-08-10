<?php 

	$konek = mysqli_connect("127.0.0.1", "bwid1177_pemetaanjalanrusak", "pemetaanjalanrusak", "bwid1177_pemetaanjalanrusak");

	$start_latitude = $_GET['start_latitude'];
	$start_longitude = $_GET['start_longitude'];
	$end_latitude = $_GET['end_latitude'];
	$end_longitude = $_GET['end_longitude'];
	$level_jalan = $_GET['level_jalan'];
	$kecepatan = $_GET['kecepatan'];
	$status_verifikasi = $_GET['status_verifikasi'];

		mysqli_query($konek, "ALTER TABLE data_jalans AUTO_INCREMENT=1");

	$simpan = mysqli_query($konek, "insert into data_jalans(start_latitude,start_longitude,end_latitude,end_longitude,level_jalan,kecepatan,status_verifikasi)values('$start_latitude','$start_longitude','$end_latitude','$end_longitude','$level_jalan','$kecepatan','$status_verifikasi')");

	if($simpan)
		echo "Berhasil";
	else
		echo "Gagal";

?>