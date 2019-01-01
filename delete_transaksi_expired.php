<?php 
require("db.php"); 
$date = date("Y-m-d H:i:s");
$pesanan = $conn->query("SELECT * FROM pesanan WHERE tanggal_expired < '$date' AND status_pesanan = '0'");
if($pesanan->num_rows>0){
	while ($data=$pesanan->fetch_assoc()) {
		$delete_temp = $conn->query("DELETE FROM temp WHERE id_pesanan = '$data[id_pesanan]'");
		$delete_detail = $conn->query("DELETE FROM detail_pesanan WHERE id_pesanan = '$data[id_pesanan]'");
		$delete_pesanan = $conn->query("DELETE FROM pesanan WHERE id_pesanan = '$data[id_pesanan]'");
	}
	echo "TRANSAKSI EXPIRED DITEMUKAN";
}
else{
	echo 'TRANSAKSI EXPIRED TIDAK DI TEMUKAN';
}
?>
