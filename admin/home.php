<?php
if(isset($_SESSION['user'])){
	if($_SESSION['user'] == "admin"){
		if(!isset($_GET['page'])){
			header('Location: index.php?page=data_jadwal');
		}
		else{
			$page = $_GET['page'];
		
			if($page=="beranda"){
				include("home.php");
			}
			else if($page=="databus"){
				include("databus.php");
			}
			else if($page=="tambah_bus"){
				include "tambah_bus.php";
			}
			else if($page=="proses_tambah_bus"){
				include("proses_tambah_bus.php");
			}
			else if($page=="edit_bus"){
				include "edit_bus.php";
			}
			else if($page=="proses_update_bus"){
				include("proses_update_bus.php");
			}
			else if($page=="data_jadwal"){
				include("data_jadwal.php");
			}
			else if($page=="tambah_jadwal"){
				include("tambah_jadwal.php");
			}
			else if($page=="proses_tambah_jadwal"){
				include("proses_tambah_jadwal.php");
			}
			else if($page=="proses_hapus_jadwal"){
				include("proses_hapus_jadwal.php");
			}
			else if($page=="data_penumpang"){
				include("data_penumpang.php");
			}
			else if($page=="edit_penumpang"){
				include("edit_penumpang.php");
			}
			else if($page=="proses_hapus_penumpang"){
				include "proses_hapus_penumpang.php";
			}
			else if($page=="proses_update_penumpang"){
				include "proses_update_penumpang.php";
			}
			else if($page=="hapus_bus"){
				include "proses_hapus_bus.php";
			}
			else if($page=="data_transaksi"){
				include "data_transaksi.php";
			}
			else if($page=="layout"){
				include "cek_layout.php";
			}
			else if($page=="cetak_jadwal"){
				include "cetak_jadwal.php";
			}
			else if($page=="cetak_pesanan"){
				include "cetak_pesanan.php";
			}
			else if($page=="cetak_data_bus"){
				include "cetak_data_bus.php";
			}
			else if($page=="logout"){
				session_unset();
				session_destroy();
				header('Location: index.php');
			}
			else{
				header('Location: index.php?page=data_jadwal');
			}
		}
	}
	else{
		include "login.php";
	}
}
else{
	include "login.php";
}
?>
