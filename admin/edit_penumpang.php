<?php
$result = $conn->query("SELECT * FROM penumpang WHERE id_penumpang = '$_GET[id_penumpang]'");
if($result->num_rows>0){
    $data = $result->fetch_assoc();
}
?>
<div class="container-fluid">
    <div class="col-md-12">
        <h3>
            <div align="center"> EDIT DATA PENUMPANG</div>
        </h3>
        
        <form action="?page=proses_update_penumpang" method="POST">
            <div class="input-group mb-5 mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">ID Penumpang</span>
                </div>
                <input type="text" name="id_penumpang" class="form-control" value="<?php echo $data['id_penumpang']; ?>" readonly>
            </div>
            <div class="input-group mb-5 mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nama</span>
                </div>
                <input type="text" name="nama_penumpang" class="form-control" required value="<?php echo $data['namapenumpang']; ?>">
            </div>
            <div class="input-group mb-5 mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">Telepon</span>
                </div>
                <input type="text" name="telepon" class="form-control" required value="<?php echo $data['telepon']; ?>">
            </div>
            <div class="input-group mb-5 mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                </div>
                <input type="text" name="email" class="form-control" required value="<?php echo $data['email']; ?>">
            </div>
            <div class="input-group">
                <button class="btn btn-danger btn-block mb-5" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
