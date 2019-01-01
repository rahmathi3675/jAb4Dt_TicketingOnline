<?php

$result = $conn->query("INSERT INTO databus (id_bus,nama_bus,kelas,asal,tujuan,jml_kursi) VALUES('$_POST[id_bus]','$_POST[nama_bus]','$_POST[kelas]','$_POST[asal]','$_POST[tujuan]','$_POST[jml_kursi]')");
if($result){
	?>
	<script type="text/javascript">
		//alert("DATA BUS BERHASIL SIMPAN");
		window.location.href="index.php?page=databus";
	</script>
	<?php
}
else{
	?>
	<script type="text/javascript">
		alert("GAGAL MENYIMPAN DATA BUS");
		window.location.href="index.php?page=databus";
	</script>
	<?php
}
?>