<?php 

	$konek = mysqli_connect("127.0.0.1", "bwid1177_pemetaanjalanrusak", "pemetaanjalanrusak", "bwid1177_pemetaanjalanrusak");

	$start_latitude = $_GET['start_latitude'];
	$start_longitude = $_GET['start_longitude'];
	$end_latitude = $_GET['end_latitude'];
	$end_longitude = $_GET['end_longitude'];
	$total = $_GET['total'];
	$kecepatan1 = 20;
	$kecepatan2 = 40;
	$status_verifikasi = "belum";
	
	if($total >= "13000"){
		$level_jalan = "Rusak";
		mysqli_query($konek, "ALTER TABLE data_jalans AUTO_INCREMENT=1");
		$simpan = mysqli_query($konek, "insert into data_jalans(start_latitude,start_longitude,end_latitude,end_longitude,level_jalan,kecepatan,status_verifikasi,total)values('$start_latitude','$start_longitude','$end_latitude','$end_longitude','$level_jalan','$kecepatan1','$status_verifikasi','$total')");
		if($simpan){
			echo "Berhasil";
		}else{
			echo "Gagal";
		}
	}elseif ($total >= "7000"){
		$level_jalan = "Sedang";
		mysqli_query($konek, "ALTER TABLE data_jalans AUTO_INCREMENT=1");
		$simpan = mysqli_query($konek, "insert into data_jalans(start_latitude,start_longitude,end_latitude,end_longitude,level_jalan,kecepatan,status_verifikasi,total)values('$start_latitude','$start_longitude','$end_latitude','$end_longitude','$level_jalan','$kecepatan2','$status_verifikasi','$total')");
		if($simpan){
			echo "Berhasil";
		}else{
			echo "Gagal";
		}
	}

?>