<?php 
include "db.php";
//CEK BOOKING > 3 kali
$total = 0;
$date = date("Y-m-d H:i:s");

//cek di tabel detail
$cek_detail_pesanan = $conn->query("SELECT * FROM detail_pesanan D LEFT JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE P.id_pesanan = '$_POST[id_pesanan]' AND P.tanggal_expired < '$date' AND P.status_pesanan = '0'");
if($cek_detail_pesanan->num_rows >0){
	$total = $total + $cek_detail_pesanan->num_rows;
}
//cek di tabel temp
$cek_temp = $conn->query("SELECT * FROM temp T LEFT JOIN pesanan P ON T.id_pesanan = P.id_pesanan WHERE P.id_pesanan = '$_POST[id_pesanan]' AND P.status_pesanan = '0'");
if($cek_temp->num_rows >0){
	$total = $total + $cek_temp->num_rows;
}


if($total >= 2){
	echo "MAKSIMAL BOOKING 2 KURSI";
}
else{
	$sql = $conn->query("SELECT * FROM temp WHERE id_pesanan = '$_POST[id_pesanan]' AND id_jadwal = '$_POST[id_jadwal]' AND no_kursi = '$_POST[no_kursi]'");
	if($sql->num_rows>0){
		echo "HARAP REFRESH BROWSER ANDA\nKURSI TELAH DI PESAN PIHAK LAIN";
	}
	else{
		$result = $conn->query("INSERT INTO temp(id_pesanan,id_jadwal,no_kursi) VALUES('$_POST[id_pesanan]','$_POST[id_jadwal]','$_POST[no_kursi]')");
		if($result){
			//$data['notif'] = "SUKSES";
			echo "SUKSES BOOKING KURSI";
		}
		else{
			//$data['notif'] = "GAGAL";
			echo "GAGAL BOOKING KURSI";
		}
	}
}