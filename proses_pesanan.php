<div class="no-gutters">
<?php
$id_penumpang = $_POST['id_penumpang'];
$id_pesanan = $_POST['id_pesanan'];
$id_jadwal = $_POST['id_jurusan'];
$kelas = $_POST['kelas'];
$tanggal_pesan = date("Y-m-d H:i:s");
$tanggal_selisih = date_add(date_create($tanggal_pesan), date_interval_create_from_date_string('90 minutes'));
$tanggal_expired = date_format($tanggal_selisih, "Y-m-d H:i:s");
//echo $tanggal_pesan." ".date_format($tanggal_expired, "Y-m-d H:i:s");

/* MENCARI PESANANAN BELUM TERKONFIRMASI DAN MASIH BERLAKU DURASI PESANANNYA */ 
$cari_pesanan = $conn->query("SELECT * FROM pesanan P INNER JOIN detail_pesanan D ON P.id_pesanan = D.id_pesanan WHERE P.id_penumpang = '$id_penumpang' AND P.status_pesanan = '0'");
$cari_temp = $conn->query("SELECT * FROM pesanan P INNER JOIN temp T ON P.id_pesanan = T.id_pesanan WHERE P.id_penumpang = '$id_penumpang' AND P.status_pesanan = '0'");
$cek = $cari_pesanan->num_rows + $cari_temp->num_rows;
//echo $cek;
if($cek >= 2){
	if($cari_pesanan->num_rows>0){
		$data = $cari_pesanan->fetch_assoc();
		$id_pesanan = $data['id_pesanan'];
	}
	elseif($cari_temp->num_rows>0){
		$data = $cari_temp->fetch_assoc();
		$id_pesanan = $data['id_pesanan'];
	}
	?>
	<script type="text/javascript">
		alert("MOHON SELESAIKAN PEMBAYARAN ANDA SEBELUMNYA\nPEMESANAN MAKSIMAL ADALAH 2 KURSI\nTRANSAKSI AKAN HANGUS DALAM 90 MENIT\nJIKA TIDAK MELAKUKAN PEMBAYARAN.");
		//window.location.href="index.php";
	</script>	
	<?php
}
elseif($cek >= 1){
	$data = $cari_temp->fetch_assoc();
	$id_pesanan = $data['id_pesanan'];
	?>
	<script type="text/javascript">
		alert("ID Anda Sudah Memesan 1 Kursi Sebelumnya,\nTransaksi Sebelumnya akan di akumulasi.\nID Pesanan :  <?php echo $id_pesanan; ?>");
		//window.location.href="index.php";
	</script>	
	<?php
	//echo $id_pesanan;
}
else{
	$sql = $conn->query("INSERT INTO pesanan VALUES('$id_pesanan','$id_penumpang','','$tanggal_pesan','$tanggal_expired','','0')");
	if($sql){
		/*?>
		<script type="text/javascript">
			alert('DATA PESANAN DIBUAT');
		</script>	
		<?php
		*/
	}
	else{
		/*?>
		<script type="text/javascript">
			alert('DATA PESANAN SUDAH ADA SILAHKAN PILIH SEAT');
		</script>	
		<?php
		*/
	}
}
//echo $id_pesanan;
//echo $id_penumpang.$id_jadwal.$id_pesanan;
?>
<h4 class="text-center mt-3">PILIH KURSI BUS</h4>

<?php

if($kelas == "Bisnis" OR $kelas == "Ekonomi"){
	$jumlah_kursi = 79;
}
if($kelas == "Eksekutif"){
	$jumlah_kursi = 63;
}
//echo $jumlah_kursi;
?>
<style type="text/css">
	#table-layout table tr td{
		padding: 0px;
		margin: 0px;
	}
</style>
<hr style="border-color: transparent;">
<center>
<div class="container-fluid">
	<div id="table-layout">
		<table class="table table-responsive">
		<?php 
		/*
		|	STEP - MEMBUAT DESIGN LAYOUT EKSEKUTIF
		|	LOGIKA PROGRAM : 
		|	1. PENGECEKAN KURSI DI TABEL PESANAN - DETAIL_PESANAN  - STATUS_PESANAN (PEWARNAAN & DISABLED)
		|	2. PENGECEKAN KURSI DI TABEL TEMP (PEWARNAAN & DISABLED)
		|	3. PEMBUATAN TOMBOL KURSI 
		*/
		if($kelas == "Eksekutif"){
			$baris = 'A';
			$kolom = 1;
			$i = 1;
			?>
			<tr>
			<?php
			for($i = 1; $i <= $jumlah_kursi; $i++){
				if($kolom == 1 AND $baris == 'A' AND $i <= 16){
					$no_kursi = $baris.$i;
					$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
					if($sql->num_rows>0){
						?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
					}
					else{
						$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{
							?><td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							if($i == 16){
								$baris = 'B';
								$kolom = 1;
							}
						}
					}
				}
			}
			?>
			</tr><tr>
			<?php
			$i = 1;
			for($i = 1; $i <= $jumlah_kursi; $i++){
				if($kolom == 1 AND $baris == 'B' AND $i <= 16){
					$no_kursi = $baris.$i;
					$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
					if($sql->num_rows>0){
						?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
					}
					else{
						$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{
							?><td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							if($i == 16){
								$baris = 'C';
								$kolom = 1;
							}
						}
					}
				}
			}
			?>
			</tr><tr>
			<?php
			$i = 1;
			for($i = 1; $i <= $jumlah_kursi; $i++){
				if($kolom == 1 AND $baris == 'C' AND $i <= 16){
					$no_kursi = $baris.$i;
					$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
					if($sql->num_rows>0){
						?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
					}
					else{
						$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{
							if($i < 16){
								?><td></td><?php
							}
							if($i == 16){
								?><td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
								$baris = 'D';
								$kolom = 1;
							}
						}
					}
				}
			}
			?>
			</tr><tr>
			<?php
			$i = 1;
			for($i = 1; $i <= $jumlah_kursi; $i++){
				if($kolom == 1 AND $baris == 'D' AND $i <= 16){
					$no_kursi = $baris.$i;
					$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
					if($sql->num_rows>0){
						?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
					}
					else{
						$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{
							if($i <= 14){
								?><td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							}
							if($i == 15){
								?><td></td><?php
							}
							if($i == 16){
								?><td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
								$baris = 'E';
								$kolom = 1;
							}
						}
					}
				}
			}
			?>
			</tr><tr>
			<?php
			$i = 1;
			for($i = 1; $i <= $jumlah_kursi; $i++){
				if($kolom == 1 AND $baris == 'E' AND $i <= 16){
					$no_kursi = $baris.$i;
					$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
					if($sql->num_rows>0){
						?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
					}
					else{
						$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{
							if($i <= 14){
								?><td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							}
							if($i == 15){
								?><td></td><?php
							}
							if($i == 16){
								?><td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
								$baris = 'E';
								$kolom = 1;
							}
						}
					}
				}
			}
			?>
			</tr>
			<?php
		}

		/*
		|	STEP - MEMBUAT DESIGN LAYOUT EKONOMI & BISINIS
		|	LOGIKA PROGRAM : 
		|	1. PENGECEKAN KURSI DI TABEL PESANAN - DETAIL_PESANAN  - STATUS_PESANAN (PEWARNAAN & DISABLED)
		|	2. PENGECEKAN KURSI DI TABEL TEMP (PEWARNAAN & DISABLED)
		|	3. PEMBUATAN TOMBOL KURSI 
		*/
		if($kelas == "Bisnis" OR $kelas == "Ekonomi"){
			$baris = 'A';
			$kolom = 1;
			$i = 1;
			?>
			<tr>
			<?php
			for($i = 1; $i <= $jumlah_kursi; $i++){
				if($kolom == 1 AND $baris == 'A' AND $i <= 16){
					$no_kursi = $baris.$i;
					$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
					if($sql->num_rows>0){
						?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
					}
					else{
						$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{
							?><td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							if($i == 16){
								$baris = 'B';
								$kolom = 1;
							}
						}
					}
				}
			}
			?>
			</tr><tr>
			<?php
			$i = 1;
			for($i = 1; $i <= $jumlah_kursi; $i++){
				if($kolom = 1 AND $baris = 'B' AND $i <= 16){
					$no_kursi = $baris.$i;
					$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
					if($sql->num_rows>0){
						?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
					}
					else{
						$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{ ?>
							<td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td>
							<?php
							if($i == 16){
								$baris = 'C';
								$kolom = 1;
							}
						}
					}
				}
			}
			?>
			</tr><tr>
			<?php
			$i = 1;
			for($i = 1; $i <= $jumlah_kursi; $i++){
				if($kolom = 1 AND $baris = 'C' AND $i <= 16){
					$no_kursi = $baris.$i;
					$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
					if($sql->num_rows>0){
						?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
					}
					else{
						$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{ ?>
							<td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td>
							<?php
							if($i == 16){
								$baris = 'D';
								$kolom = 1;
							}
						}
					}
				}
			}
			?>
			</tr><tr>
			<?php
			$i = 1;
			for($i = 1; $i <= $jumlah_kursi; $i++){
				if($kolom = 1 AND $baris = 'D' AND $i <= 16){
					if($i <16){
						?><td></td><?php
					}
					if($i == 16){
						$no_kursi = $baris.$i;
						$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{
							$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
							if($sql->num_rows>0){
								?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							}
							else{ ?>
								<td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td>
								<?php
								$baris = 'E';
								$kolom = 1;
							}
						}
					}
				}
			}
			?>
			</tr><tr>
			<?php
			$i = 1;
			for($i = 1; $i <= $jumlah_kursi; $i++){
				if($kolom = 1 AND $baris = 'E' AND $i <= 16){
					if($i <15){
						$no_kursi = $baris.$i;
						$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{
							$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
							if($sql->num_rows>0){
								?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							}
							else{
								?><td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							}
						}
					}
					if($i == 15){
						$no_kursi = $baris.$i;
						?><td></td><?php
					}
					if($i == 16){
						$no_kursi = $baris.$i;
						$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{
							$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
							if($sql->num_rows>0){
								?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							}
							else{
								?>
								<td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td>
								<?php
								$baris = 'F';
								$kolom = 1;
							}
						}
					}
				}
			}
			?>
			</tr><tr>
			<?php
			$i = 1;
			for($i = 1; $i <= $jumlah_kursi; $i++){
				if($kolom = 1 AND $baris = 'F' AND $i <= 16){
					if($i <15){
						$no_kursi = $baris.$i;
						$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{
							$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
							if($sql->num_rows>0){
								?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							}
							else{
								?><td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							}
						}
					}
					if($i == 15){
						$no_kursi = $baris.$i;
						?><td></td><?php
					}
					if($i == 16){
						$no_kursi = $baris.$i;
						$sql = $conn->query("SELECT * FROM detail_pesanan D INNER JOIN pesanan P ON D.id_pesanan = P.id_pesanan WHERE D.id_jadwal = '$id_jadwal' AND D.no_kursi = '$no_kursi'");
						if($sql->num_rows>0){
							?><td><button class="btn btn-warning disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
						}
						else{
							$sql = $conn->query("SELECT * FROM temp WHERE id_jadwal = '$id_jadwal' AND no_kursi = '$no_kursi'");
							if($sql->num_rows>0){
								?><td><button class="btn disabled" disabled data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td><?php
							}
							else{
								?>
								<td><button class="btn btn-primary active" data-id="<?php echo $no_kursi; ?>"><?php echo $baris.$i; ?></button></td>
								<?php
							}
						}
					}
				}
			}
		}
		?>
		</tr>
		</table>
		<hr style="border-color: transparent;">
	</div>
	<div class="container-fluid">
			<form action="?page=konfirmasi_booking" method="post">
				<div class="input-group">
					<input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan; ?>">
					<input type="hidden" name="id_penumpang" value="<?php echo $id_penumpang; ?>">
			        <button id="submit" type="submit" class="btn-primary btn-lg btn-block active">PRINT ORDER</button>
				</div>
			</form>
		</div>
</div>
</center>
<hr style="border-color: transparent;">
<hr style="border-color: transparent;">
<hr style="border-color: transparent;">
<hr style="border-color: transparent;">
<hr style="border-color: transparent;">
<hr style="border-color: transparent;">


</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#table-layout').hide();
		$('.btn').on('click',function(){
			var no_kursi = $(this).attr('data-id');
			var id_pesanan = '<?php echo $id_pesanan; ?>';
			var id_jadwal = '<?php echo $id_jadwal; ?>';
			var id_penumpang = '<?php echo $id_penumpang; ?>';
			/*
			alert(no_kursi);
			alert(id_pesanan);
			alert(id_jadwal);
			*/
			$.ajax({
	                url: "tambah_temp.php",
	                type: "POST",
	                data: {id_pesanan: id_pesanan, no_kursi: no_kursi, id_jadwal: id_jadwal, id_penumpang: id_penumpang},
	                success: function(data){
	                	alert(data);
	                	//getTable();
	                	 var booking = 1;              
	                },
	                error: function(data){
	                	alert(data);
	                }
	        });
	        window.location.reload();
		});

		var cek = '<?php echo $cek; ?>';
		if(cek >= 2){
			$('#table-layout').hide();
			$('#submit').show();
		}
		else{
			$('#table-layout').fadeIn();
		}
	});
</script>