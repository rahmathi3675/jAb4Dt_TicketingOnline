<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		<h1><p><center>Jadwal Bus</center></p></h1>
</div>
<div class="container-fluid mb-5">
	<div class="col-md-12">
		<table id="table-jadwal" class="table-responsive-md text-size-8">
			<thead>
				<tr>
				<th>No</th>
			    <th>ID Bus</th>
			    <th>Nama Bus</th>
				<th>Kelas</th>
			    <th>Asal</th>
			    <th>Tujuan</th>
			    <th>Id Keberangkatan</th>
			    <th>Waktu Keberangkatan</th>
			    <th>Harga Tiket</th>
			    <th>Jumlah Kursi</th>
			    <th>Dipesan</th>
			    <th>Diproses</th>
				<th>Status_Jadwal</th>
				</tr>
			</thead>
			<tbody class="text-dark">
				<?php
				include 'db.php';
				$date = date("Y-m-d H:i:s");
				$query = $conn->query("SELECT * FROM databus B LEFT JOIN jadwal_keberangkatan J ON B.id_bus = J.id_bus WHERE J.waktu_berangkat > '$date'");
				if($query->num_rows == 0){	
					?>
					<tr>
						<td colspan="12" align="center">Tidak ada data!</td>
					</tr>
					<?php	
				}
				else{	
					$no = 1;				
					while($data = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data[1]; ?></td>
							<td><?php echo $data['nama_bus']; ?></td>
							<td><?php echo $data['kelas']; ?></td>
							<td><?php echo $data['asal']; ?></td>
							<td><?php echo $data['tujuan']; ?></td>
							<td><?php echo $data['id_jadwal']; ?></td>
							<td><?php echo $data['waktu_berangkat']; ?></td>
							<td><?php echo'Rp.' . number_format( $data['harga_tiket'], 0 , '' , '.' ) . ',-'?></td>
							<td class="text-center"><?php echo $data['jml_kursi']; ?></td>
							<td class="text-center">
								<?php 
									$sql = $conn->query("SELECT COUNT(no_kursi) AS kursi_terisi FROM detail_pesanan WHERE id_jadwal = '$data[id_jadwal]'");
									if($sql->num_rows >0){
										$terisi = $sql->fetch_assoc();
										$dipesan = $terisi['kursi_terisi'];
									}
									else{
										$dipesan = 0;
									}
									echo $dipesan;
								?>
							</td>
							<td class="text-center">
								<?php 
									$sql = $conn->query("SELECT COUNT(no_kursi) AS kursi_terisi FROM temp WHERE id_jadwal = '$data[id_jadwal]'");
									if($sql->num_rows >0){
										$terisi = $sql->fetch_assoc();
										$diproses = $terisi['kursi_terisi'];
									}
									else{
										$diproses = 0;
									}
									echo $diproses;
								?>
							</td>
							<td class="text-center">
								<form action="?page=layout" method="POST" style="float: left; margin: 0px; padding: 0px;">
									<input type="hidden" name="id_jurusan" value="<?php echo $data['id_jadwal']; ?>">
									<input type="hidden" name="kelas" value="<?php echo $data['kelas']; ?>">
									<button type="submit" class="btn btn-primary active"><i class="fas fa-eye"></i></button>
								</form>
								<?php
								$kursi_terisi = $data['jml_kursi'] - $dipesan - $diproses;
								if($kursi_terisi > 0){
									?>
									<button type="button" class="btn btn-primary active"><i class="fas fa-check"></i></button>
									<?php
								}
								else{
									?>
									<button type="button" class="btn btn-danger disable"><i class="fas fa-exclamation-triangle"></i></button>
									<?php
								}
								?>
							</td>
						</tr>
						<?php
						$no++;
					}
				}				
				?>
			</tbody>
		</table>
	</div>
</div>
<h1 class="mb-5 mt-5 text-light">1</h1>