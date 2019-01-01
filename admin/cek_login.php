<?php
session_start();
require("db.php"); 
$admin = array();
$username = $_POST['username'];
$password = $_POST['password'];
//echo $password;
//$sql = $conn->query("INSERT INTO admin VALUES('ADMIN','Wening','wening','$password')");
$sql = $conn->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
if($sql->num_rows>0){
	$row = $sql->fetch_assoc();
		$_SESSION['user'] = 'admin';
		$_SESSION['id_admin'] = $row['id_admin'];
		$_SESSION['nama_admin'] = $row['nama_admin'];
		//$konsumen[] = $row;
	header('location: index.php');
	//$data['admin']=$konsumen;
}
else{
	?>
	<script type="text/javascript">
		alert("USERNAME / PASSWORD TIDAK VALID");
		window.location.href="index.php";
	</script>
	<?php
}
//echo json_encode($data);
