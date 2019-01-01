<?php 
require("db.php");
session_start();
$date = date("Y-m-d H:i:s");
$pesanan = $conn->query("UPDATE pesanan SET tanggal_bayar = '$date', id_admin = '$_SESSION[id_admin]', status_pesanan = 1 WHERE id_pesanan = '$_POST[id_pesanan]'");
if($pesanan){
	echo "TRANSAKSI BERHASIL DI KONFIRMASI";
}
else{
	echo "TRANSAKSI TIDAK GAGAL DIKONFIRMASI";
}
?>