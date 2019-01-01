<?php
	$waktu_keberangkatan = $_POST['tanggal']." ".$_POST['jam'];
	//echo $waktu_keberangkatan;
	$result = $conn->query("INSERT INTO jadwal_keberangkatan VALUES('$_POST[id_jadwal]','$_POST[id_bus]','$waktu_keberangkatan','$_POST[harga]')");
	if($result){
		?>
		<script type="text/javascript">
			alert("JADWAL BERHASIL DI TAMBAH");
			window.location.href="index.php?page=data_jadwal";
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			alert("GAGAL MENAMBAHKAN JADWAL");
			window.location.href="index.php?page=data_jadwal";
		</script>
		<?php
	}
?>