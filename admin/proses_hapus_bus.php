<?php
if(isset($_GET['id_bus'])){
	$date = date("Y-m-d H:i:s");
	$sql = $conn->query("SELECT * FROM jadwal_keberangkatan WHERE id_bus = '$_GET[id_bus]' AND waktu_berangkat >= '$date'");
	if($sql->num_rows>0){
		?>
			<script type="text/javascript">
				alert("BUS SEDANG OPERASI, TIDAK DAPAT MENGHAPUS DATA BUS");
				window.location.href="index.php?page=databus";
			</script>
		<?php
	}
	else{
		$delete = $conn->query("DELETE FROM jadwal_keberangkatan WHERE id_bus = '$_GET[id_bus]'");
		$result = $conn->query("DELETE FROM databus WHERE id_bus = '$_GET[id_bus]'");
		if($result){
			?>
			<script type="text/javascript">
				//alert("DATA BUS BERHASIL DIHAPUS");
				window.location.href="index.php?page=databus";
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert("GAGAL MENGHAPUS DATA BUS");
				window.location.href="index.php?page=databus";
			</script>
			<?php
		}
		
	}
}
else{
	header('Location: index.php');
}