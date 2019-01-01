<?php
$id_jadwal = $_POST['id_jurusan'];
$kelas = $_POST['kelas'];

if($kelas == "Bisnis" OR $kelas == "Ekonomi"){
	$jumlah_kursi = 79;
}
if($kelas == "Eksekutif"){
	$jumlah_kursi = 63;
}
?>
<style type="text/css">
	#table-layout table tr td{
		padding: 0px;
		margin: 0px;
	}
</style>
<div class="container-fluid mt-5">
<center>
	<h4><i class="fas fa-tv"></i> LAYOUT KURSI PESANAN</h4>
	<hr>
<div class="container-fluid">
	<div id="table-layout">
		<table class="table table-responsive" align="center">
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
	</div>
	<a href="?page=jadwal" class="btn btn-dark active"><i class="fas fa-chevron-circle-left"></i> Back to Menu</a>
</div>
<center>
</div>

