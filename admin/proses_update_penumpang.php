<?php

	$result = $conn->query("UPDATE penumpang SET namapenumpang='$_POST[nama_penumpang]', telepon='$_POST[telepon]', email='$_POST[email]' WHERE id_penumpang = '$_POST[id_penumpang]'");
	if($result){
    	?>
		<script type="text/javascript">
			alert("DATA PENUMPANG BERHASIL DI UPDATE");
			window.location.href="index.php?page=data_penumpang";
		</script>
		<?php
    }
	else {
    	?>
		<script type="text/javascript">
			alert("DATA PENUMPANG GAGAL DI UPDATE");
			window.location.href="index.php?page=data_penumpang";
		</script>
		<?php
    }
?>