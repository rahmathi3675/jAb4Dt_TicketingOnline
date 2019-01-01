<?php

	include 'db.php';

	$id_bus = $_GET ['id_bus'];

	$hapus 	= "DELETE FROM databus WHERE id_bus='$id_bus'";
	$query	= mysqli_query($db, $hapus);

	if ($query)
	    {
	    	echo "<strong><center>Data Berhasil Dihapus";
	    	echo "<META HTTP-EQUIV='REFRESH' CONTENT ='1; URL=admin.php?halaman=databus'>";
	    }
	else {
	    	//echo "<strong><center>Data Gagal Diubah";
	    	//echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=admin.php?halaman=edit_bus">';
	    	print"
	    		<script>
	    			alert(\"Data Gagal Diubah!\");
	    			history.back(-1);
	    		</script>";
	    }
	


?>