<div class="no-gutters">
<?php
$result = $conn->query("INSERT INTO penumpang VALUES('$_POST[id_penumpang]','$_POST[nama_penumpang]','$_POST[telepon]','$_POST[email]','$_POST[no_ktp]')");
if($result){
	?>
	<script type="text/javascript">
		alert("DAFTAR BERHASIL");
		window.location.href="index.php?page=daftar";
	</script>
	<?php
}
else{
	?>
	<script type="text/javascript">
		alert("GAGAL MENYIMPAN DATA PENUMPANG");
		window.location.href="index.php?page=daftar";
	</script>
	<?php
}
?>
<div class="no-gutters">