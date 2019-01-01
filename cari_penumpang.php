<?php
require("db.php"); 
$penumpang = array();
$sql = "SELECT * FROM penumpang WHERE id_penumpang = '$_POST[id_penumpang]'";
$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$a[] = $row;
	}
	$data['penumpang']=$a;
	//$kategori['pesan']=$_POST['id_kategori'];

echo json_encode($data);