<?php
/*if(isset($_GET['id_penumpang'])){
	$cek_pesanan = $conn->query("SELECT * FROM penumpang P INNER JOIN pesanan T ON P.id_penumpang = T.id_penumpang WHERE T.status_pesanan = '1' AND T.id_penumpang = '$_GET[id_penumpang]'");
	if($cek_pesanan->num_rows>0){
		?>
		<script type="text/javascript">
			alert("GAGAL MENGHAPUS DATA PENUMPANG\nPENUMPANG MEMILIKI TRANSAKSI");
			window.location.href="index.php?page=data_penumpang";
		</script>
		<?php
	}
	else{
		$delete = 0;
		$gagal = 0;
		$date = date("Y-m-d H:i:s");
		$sql = $conn->query("SELECT * FROM penumpang P INNER JOIN pesanan T ON P.id_penumpang = T.id_penumpang WHERE T.status_pesanan = '0' AND T.id_penumpang = '$_GET[id_penumpang]'");
		if($sql->num_rows>0){
			
			while ($pesanan = $sql->fetch_assoc()) {
				// MENCARI DATA DI TABEL DETAIL PESANAN 
				$hapus = $conn->query("DELETE FROM detail_pesanan WHERE id_pesanan = '$pesanan[id_pesanan]'");
				if($hapus){
					$delete++; 
				}
				else{
					$gagal++;	
				}
			}

			if($gagal < 1){
				$hapus_penumpang = $conn->query("DELETE FROM penumpang WHERE id_penumpang = '$_GET[id_penumpang]'");
				if($hapus_penumpang){
					?>
					<script type="text/javascript">
						alert("RECORD DETAIL PESANAN DI HAPUS \nID PENUMPANG BERHASIL DIHAPUS");
						window.location.href="index.php?page=data_penumpang";
					</script>
					<?php
				}
			}else{
				?>
				<script type="text/javascript">
					alert("RECORD DETAIL PESANAN GAGAL HAPUS KESELURUHAN \PENGHAPUSAN ID PENUMPANG DIBATALKAN");
					window.location.href="index.php?page=data_penumpang";
				</script>
				<?php
			}
		}
		else{
			$hapus = $conn->query("DELETE FROM penumpang WHERE id_penumpang = '$_GET[id_penumpang]'");
			if($hapus){
				?>
				<script type="text/javascript">
					alert("PENGHAPUSAN ID PENUMPANG BERHASIL");
					window.location.href="index.php?page=data_penumpang";
				</script>
				<?php
			}
			else{
				?>
				<script type="text/javascript">
					alert("GAGAL MENGHAPUS DATA PENUMPANG");
					window.location.href="index.php?page=data_penumpang";
				</script>
				<?php	
			}
		}


		
	}
}
else{
	header('Location: index.php');
}*/