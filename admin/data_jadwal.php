<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		<h3><p><center><i class="fas fa-calendar-check"></i> Manajemen Jadwal Keberangkatan Bus</center></p></h3>
</div>
<div class="container-fluid">
	
	<div class="col-md-12">
		<a href="?page=tambah_jadwal" class="btn btn-danger mb-4"><i class="fas fa-plus"></i> Tambah</a>
		<table id="table-jadwal" class="table table-responsive-md table-hover">
			<thead>
				<tr>
				<th>#</th>
			    <th>ID Bus</th>
				<th>Kelas</th>
			    <th>Asal</th>
			    <th>Tujuan</th>
			    <th>Id Keberangkatan</th>
			    <th>Waktu Keberangkatan</th>
			    <th>Harga Tiket</th>
			    <th>Jumlah Kursi</th>
				<th>Manage_Jadwal</th>
				</tr>
			</thead>
			<tbody class="text-secondary">
				<?php
				$date = date("Y-m-d H:i:s");
				$query = $conn->query("SELECT * FROM jadwal_keberangkatan J LEFT JOIN databus B ON J.id_bus = B.id_bus WHERE J.waktu_berangkat >= '$date'");
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
							<td><?php echo $data['kelas']; ?></td>
							<td><?php echo $data['asal']; ?></td>
							<td><?php echo $data['tujuan']; ?></td>
							<td><?php echo $data['id_jadwal']; ?></td>
							<td class="text-center"><?php echo $data['waktu_berangkat']; ?></td>
							<td><?php echo $data['harga_tiket']; ?></td>
							<td class="text-center">
								<?php 
									$sql = $conn->query("SELECT COUNT(no_kursi) AS kursi_terisi FROM detail_pesanan WHERE id_jadwal = '$data[id_jadwal]'");
									if($sql->num_rows >0){
										$data1 = $sql->fetch_assoc();
										$total_kursi = $data1['kursi_terisi'];
									}
									else{
										$total_kursi = 0;
									}

									$sisa_kursi =  $data['jml_kursi'] -$total_kursi;
									echo $sisa_kursi.' / '.$data['jml_kursi'];
								?>
							</td>

							<td>
								<form action="?page=layout" method="POST" style="float: left; margin: 0px; padding: 0px;">
									<input type="hidden" name="id_jurusan" value="<?php echo $data['id_jadwal']; ?>">
									<input type="hidden" name="kelas" value="<?php echo $data['kelas']; ?>">
									<button type="submit" class="btn btn-primary active"><i class="fas fa-eye"></i> View</button>
								</form>
								
								<a href="?page=proses_hapus_jadwal&id_jadwal=<?php echo $data['id_jadwal']; ?>" class="btn btn-primary text-light ml-1"><i class="fas fa-trash"></i> Delete</a>
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
	<hr>
</div>
<script type="text/javascript">
$(document).ready(function () {
	$('#table-jadwal').DataTable();
});
</script>