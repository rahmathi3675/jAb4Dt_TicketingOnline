<?php
require("db.php"); 
$date = date("Y-m-d H:i:s");
$kelas = array();
$sql = "SELECT * FROM jadwal_keberangkatan J LEFT JOIN databus B ON J.id_bus = B.id_bus WHERE J.waktu_berangkat > '$date' AND B.kelas = '$_POST[kelas]'";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $temp[] = $row;
    }
    $data['kelas']=$temp;
    //$kategori['pesan']=$_POST['id_kategori'];
echo json_encode($data);