<?php
if(isset($_GET['id_jadwal'])){
	$date = date("Y-m-d H:i:s");
	/*
	|	PENGECEKAN TRANSAKSI TERKAIT DENGAN TABEL JADWAL
	|	JIKA TIDAK ADA DATA TERKAIT , JADWAL DAPAT DIHAPUS	
	*/

	$sql_detail = $conn->query("SELECT * FROM jadwal_keberangkatan J INNER JOIN detail_pesanan D ON J.id_jadwal = D.id_jadwal WHERE J.id_jadwal = '$_GET[id_jadwal]' AND J.waktu_berangkat >= '$date'");
	$sql_temp =  $conn->query("SELECT * FROM jadwal_keberangkatan J INNER JOIN temp T ON J.id_jadwal = T.id_jadwal WHERE J.id_jadwal = '$_GET[id_jadwal]' AND J.waktu_berangkat >= '$date'");
	$detail = $sql_detail->num_rows;
	$temp = $sql_temp->num_rows;
	//echo $detail.$temp;
	
	$operasi = $detail + $temp;
	if($operasi > 0){ ?>
			<script type="text/javascript">
				alert("SEDANG JADWAL OPERASI, TIDAK DAPAT MENGHAPUS DATA JADWAL");
				window.location.href="index.php?page=data_jadwal";
			</script> <?php
	} 
	else{
		$result = $conn->query("DELETE FROM jadwal_keberangkatan WHERE id_jadwal = '$_GET[id_jadwal]'");
		if($result){
			?>
			<script type="text/javascript">
				alert("JADWAL OPERASI BERHASIL DIHAPUS");
				window.location.href="index.php?page=data_jadwal";
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert("GAGAL MENGHAPUS DATA BUS");
				window.location.href="index.php?page=data_jadwal";
			</script>
			<?php
		}	
	}
}
else{
	header('Location: index.php?page=data_jadwal');
}