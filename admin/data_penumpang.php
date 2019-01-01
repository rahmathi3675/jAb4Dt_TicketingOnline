<div class="col-md-12">
	<h4><center><i class="fas fa-user-friends"></i></i> MANAJEMEN DATA PENUMPANG</center></h4>
	
	<table id="table-jadwal-admin" class="table-responsive-md table-hover">
		<thead>
			<tr>
				<th>#</th>
                <th>ID Penumpang</th>
                <th>Nama Penumpang</th>
				<th>Telepon</th>
                <th>Email</th>
                <th>Manage</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$result = $conn->query("SELECT * FROM penumpang ORDER BY namapenumpang ASC");
				if($result->num_rows>0){
					$no = 1;
					while($data = $result->fetch_array()){
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['id_penumpang']; ?></td>
							<td><?php echo $data['namapenumpang']; ?></td>
							<td><?php echo $data['telepon']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td>
								<a href="?page=edit_penumpang&id_penumpang=<?php echo $data['id_penumpang']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
								<!--
								<a href="?page=proses_hapus_penumpang&id_penumpang=<?php echo $data['id_penumpang']; ?>" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Hapus</a>
								-->
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