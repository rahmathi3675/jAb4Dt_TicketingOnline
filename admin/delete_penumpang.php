<?php

	include 'db.php';

	$id_penumpang = $_GET ['id_penumpang'];

	$hapus 	= "DELETE FROM penumpang WHERE id_penumpang='$id_penumpang'";
	$query	= mysqli_query($db, $hapus);

	if ($query)
	    {
	    	echo "<strong><center>Data Berhasil Dihapus";
	    	echo "<META HTTP-EQUIV='REFRESH' CONTENT ='1; URL=admin.php?halaman=datapenumpang'>";
	    }
	else {
	    	//echo "<strong><center>Data Gagal Diubah";
	    	//echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=admin.php?halaman=delete_penumpang">';
	    	print"
	    		<script>
	    			alert(\"Data Gagal Diubah!\");
	    			history.back(-1);
	    		</script>";
	    }
	


?>