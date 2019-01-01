<?php
	$result = $conn->query("UPDATE databus SET nama_bus = '$_POST[nama_bus]',
		kelas = '$_POST[kelas]',
		asal = '$_POST[asal]',
		tujuan = '$_POST[tujuan]',
		jml_kursi = '$_POST[jml_kursi]' WHERE id_bus = '$_POST[id_bus]'");
	if($result){
    	?>
		<script type="text/javascript">
			//alert("DATA BUS BERHASIL DI UPDATE");
			window.location.href="index.php?page=databus";
		</script>
		<?php
    }
	else {
    	?>
		<script type="text/javascript">
			alert("DATA BUS GAGAL DI UPDATE");
			window.location.href="index.php?page=databus";
		</script>
		<?php
    }
?>