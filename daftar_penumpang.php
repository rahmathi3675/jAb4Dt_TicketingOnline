<?php
$result = $conn->query("SELECT * FROM penumpang ORDER BY id_penumpang DESC LIMIT 1");
if($result->num_rows>0){
    $data = $result->fetch_assoc();
    $newID = substr($data['id_penumpang'],3,7);
    //echo $newID."<br>";
    $nilai = $newID + 1;
    //echo $nilai;
    $digit = 7 - (strlen($nilai));
    $newIDPenumpang = "CST".substr_replace($newID, $nilai, $digit);
}
else{
    $newIDPenumpang = "CST0000001";
}
?>
<div class="container-fluid">
    <div class="col-md-12 mt-5">
        <h3>
            <div align="center">Pesan Tiket</div>
        </h3>
        
        <form action="?page=proses_daftar_penumpang" method="POST">
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">ID Bus</span>
                </div>
                <input type="text" name="id_penumpang" class="form-control" value="<?php echo $newIDPenumpang; ?>" readonly>
            </div>
            <div class="input-group mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nama</span>
                </div>
                <input type="text" name="nama_penumpang" class="form-control" placeholder="Nama Pemesan/Penumpang" required>
            </div>
            <div class="input-group mt-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">Telp. </span>
                </div>
                <input type="text" name="telepon" class="form-control" placeholder="Telepon .." required>
            </div>
            <div class="input-group mt-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                </div>
                <input type="text" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="input-group mt-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">KTP</span>
                </div>
                <input type="number" name="no_ktp" class="form-control" placeholder="No KTP" required>
            </div>
            
            <div class="input-group">
                <button type="submit" class="btn btn-danger btn-block mt-2" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>