<div class="col-md-12">
	<h2><center><i class="fas fa-bus"></i> MANAJEMEN ARMADA BUS</center></h2>
	<a href="?page=tambah_bus" class="btn btn-danger"><i class="fas fa-plus"></i> Tambah</a>
	<hr>
	<table id="table-jadwal-admin" class="table-responsive-md table-hover">
		<thead>
			<tr>
				<th>#</th>
                <th>ID_Bus</th>
                <th>Nama_Bus</th>
				<th>Kelas</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th class="text-center">Jumlah Kursi</th>
            	<th class="text-center">Manage</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$result = $conn->query("SELECT * FROM databus ORDER BY nama_bus ASC");
				if($result->num_rows>0){
					$no = 1;
					while($data = $result->fetch_array()){
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['id_bus']; ?></td>
							<td><?php echo $data['nama_bus']; ?></td>
							<td><?php echo $data['kelas']; ?></td>
							<td><?php echo $data['asal']; ?></td>
							<td><?php echo $data['tujuan']; ?></td>
							<td class="text-center"><?php echo $data['jml_kursi']; ?></td>
							<td class="text-center">
								<a href="?page=edit_bus&id_bus=<?php echo $data['id_bus']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
								<a href="?page=hapus_bus&id_bus=<?php echo $data['id_bus']; ?>" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Hapus</a>
							</td>
						</tr>
						<?php
						$no++;
					}
				}
			?>
		</tbody>
	</table>
	<hr>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#table-jadwal-admin').DataTable();

    });
    
</script>