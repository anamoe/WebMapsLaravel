<?php 
 	
 	$host = "127.0.0.1";
 	$user = "bwid1177_pemetaanjalanrusak";
 	$pass = "pemetaanjalanrusak";
 	$db = "bwid1177_pemetaanjalanrusak";

 	define('DBPATH',$host);
 	define('DBUSER',$user);
 	define('DBPASS',$pass);
 	define('DBNAME',$db);

 	$mysqli = new mysqli($host,$user,$pass,$db);

 	if($mysqli->connect_errno){
 		echo "Failed to connect MySQL: " . $mysqli->connect_error;
 	}

 	$data = json_decode(file_get_contents('php://input'),true); 	

 	switch ($_GET['data']) {
 		default:
 			echo "NOT FOUND";
 			break;
 		case 'insert':
 			header('Content-Type: application/json');
 			$total = $data['total'];
 			$start_latitude = $data['start_latitude'];
			$start_longitude = $data['start_longitude'];
			$end_latitude = $data['end_latitude'];
			$end_longitude = $data['end_longitude'];
 			if ($total >= '13000'){
 				$level_jalan = 'rusak';
 				$kecepatan = '20';
				$status_verifikasi = 'belum';
 				$sql = 'INSERT INTO 'data_jalans' ('start_latitude','start_longitude','end_latitude','end_longitude','level_jalan','kecepatan','status_verifikasi') VALUES ("' . $start_latitude . '","' . $start_longitude . '","' . $end_latitude . '","' . $end_longitude . '","' . $level_jalan . '","' . $kecepatan . '","' . $status_verifikasi . '");';
 				$result = mysqli_query($mysqli, $sql);
 				if($result){
 					echo '{"status":"succes","massage":"Data Added"}';
 				}else{
 					echo '{"status":"failed","massage":' . mysqli_error($mysqli) . '}';
 				}
 			}elseif ($total >= '7000'){
 				$level_jalan = 'sedang';
 				$kecepatan = '40';
				$status_verifikasi = 'belum';
 				$sql = 'INSERT INTO 'data_jalans' ('start_latitude','start_longitude','end_latitude','end_longitude','level_jalan','kecepatan','status_verifikasi') VALUES ("' . $start_latitude . '","' . $start_longitude . '","' . $end_latitude . '","' . $end_longitude . '","' . $level_jalan . '","' . $kecepatan . '","' . $status_verifikasi . '");';
 				$result = mysqli_query($mysqli, $sql);
 				if($result){
 					echo '{"status":"succes","massage":"Data Added"}';
 				}else{
 					echo '{"status":"failed","massage":' . mysqli_error($mysqli) . '}';
 				}
 			}
 			break;
 	}

 ?>