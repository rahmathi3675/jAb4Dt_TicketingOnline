<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3><p><center><i class="fas fa-calendar-check"></i> Manajemen Transaksi Pesanan</center></p></h3>
		</div>
		<hr>
		<div class="col-md-12">
			<table id="table-pesanan" class="table table-responsive-lg table-hover">
				<thead>
					<tr class="bg-primary">
					<th>#</th>
				    <th>ID.Pesanan</th>
				    <th>Nama_Pemesan</th>
				    <th>Tgl.Pesan</th>
				    <th>Berangkat</th>
				    <th>ID_Bus</th>
				    <th>No_Kursi</th>
				    <th>Total_Biaya</th>
				    <th>Asal</th>
				    <th>Tujuan</th>
				    <th>Aksi</th>
					</tr>
				</thead>
				<tbody class="text-secondary">
					<?php
					$date = date("Y-m-d H:i:s");
					$query = $conn->query("SELECT * FROM penumpang PN RIGHT JOIN pesanan P ON PN.id_penumpang = P.id_penumpang INNER JOIN detail_pesanan D ON P.id_pesanan = D.id_pesanan LEFT JOIN jadwal_keberangkatan J ON D.id_jadwal = J.id_jadwal LEFT JOIN databus B ON J.id_bus = B.id_bus  WHERE P.status_pesanan = '0'");
					if($query->num_rows == 0){	
						?>
						<tr>
							<td colspan="12" align="center">Tidak ada data!</td>
						</tr>
						<?php	
					}
					else{
						$id_pesanan = '';	
						$no = 1;				
						while($data = $query->fetch_array()){
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['id_pesanan']; ?></td>
								<td><?php echo $data['namapenumpang']; ?></td>
								<td><?php echo $data['tanggal_pesan']; ?></td>
								<td><?php echo $data['waktu_berangkat']; ?></td>
								<td><?php echo $data['id_bus']; ?></td>
								<td class="text-center"><?php echo $data['no_kursi']; ?></td>
								<td class="text-right"><?php echo $data['harga_tiket']; ?></td>
								<td><?php echo $data['asal']; ?></td>
								<td><?php echo $data['tujuan']; ?></td>
								<td><button type="button" class="btn btn-primary" data-id="<?php echo $data['id_pesanan']; ?>">Proses</button></td>
							</tr>
							<?php
						}
						$no++;
						$id_pesanan = $data['id_pesanan'];
					}				
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
	$('#table-pesanan').DataTable();
	$('.btn').on('click',function(){
		var id_pesanan = $(this).attr('data-id');
		//alert(id_pesanan);
		$.ajax({
	    	url: "proses_terima_pesanan.php",
	        type: "POST",
	        data: {id_pesanan: id_pesanan},
	        	success: function(data){
	            	alert('TRANSAKSI '+id_pesanan+' BERHASIL DIKONFIRMASI');
	            	window.location.reload();
				},
	            error: function(data){
	            	alert('TRANSAKSI '+id_pesanan+' GAGAL DIKONFIRMASI');
	            }
		});

	});

});
</script>