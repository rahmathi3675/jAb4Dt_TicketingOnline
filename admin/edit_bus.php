<?php
$result = $conn->query("SELECT * FROM databus WHERE id_bus = '$_GET[id_bus]'");
if($result->num_rows>0){
    $data = $result->fetch_assoc();
}
else{
    ?>
	<script type="text/javascript">
		alert("LOAD DATA BUS GAGAL");
		window.location.href="index.php?page=databus";
	</script>
	<?php
}
?>
<div class="container-fluid">
    <div class="col-md-12">
        <h3>
            <div align="center">Tambah Armada Bus Baru</div>
        </h3>
        
        <form action="?page=proses_update_bus" method="POST">
            <div class="input-group mb-5 mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">ID Bus</span>
                </div>
                <input type="text" name="id_bus" class="form-control" value="<?php echo $_GET['id_bus']; ?>" readonly>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nama Bus</span>
                </div>
                <input type="text" name="nama_bus" class="form-control" placeholder="Input Nama Bus" value="<?php echo $data['nama_bus']; ?>" required>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Kelas</span>
                </div>
                <select name="kelas" class="form-control" required>
                    <option selected value="<?php echo $data['kelas']; ?>"><?php echo $data['kelas']; ?></option>
                    <option value="Ekonimi">Ekonomi</option>
                    <option value="Bisnis">Bisnis</option>
                </select>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Kota Asal</span>
                </div>
                <input type="text" name="asal" class="form-control" placeholder="Nama Kota Tujuan" value="<?php echo $data['asal']; ?>" required>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Kota Tujuan</span>
                </div>
                <input type="text" name="tujuan" class="form-control" placeholder="Nama Kota Tujuan" value="<?php echo $data['tujuan']; ?>" required>
            </div>
            <div class="input-group mb-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">Kapasitas Kursi</span>
                </div>
                <input type="number" name="jml_kursi" class="form-control" placeholder="Angka" readonly value="<?php echo $data['jml_kursi']; ?>">
            </div>       
            <div class="input-group">
            	<input type="hidden" name="id_bus" value="<?php echo $_GET['id_bus']; ?>">
                <button class="btn btn-danger btn-block mb-5" type="submit">UPDATE</button>
            </div>
        </form>
    </div>
</div>
