<?php
$result = $conn->query("SELECT * FROM jadwal_keberangkatan ORDER BY id_jadwal DESC LIMIT 1");
if($result->num_rows>0){
    $data = $result->fetch_assoc();
    $newID = substr($data['id_jadwal'],2,8);
    //echo $newID."<br>";
    $nilai = $newID + 1;
    //echo $nilai;
    $digit = 8 - (strlen($nilai));
    $newIDJadwal = "JD".substr_replace($newID, $nilai, $digit);
}
else{
    $newIDJadwal = "JD00000001";
}
?>
<div class="container-fluid">
    <div class="col-md-12">
        <h4>
            <div align="center"><i class="fas fa-calendar"></i> Tambah Jadwal Keberangkatan</div>
        </h4>
        
        <form action="?page=proses_tambah_jadwal" method="POST">
            <div class="input-group mb-3 mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">ID JADWAL</span>
                </div>
                <input type="text" name="id_jadwal" class="form-control" value="<?php echo $newIDJadwal; ?>" readonly>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Pilih Bus</span>
                </div>
                <select name="id_bus" class="form-control" required>
                    <option value="">Pilih Bus</option>
                    <?php
                        $sql = $conn->query("SELECT * FROM databus ORDER BY nama_bus");
                        if($sql->num_rows>0){
                            while ($data=$sql->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $data['id_bus']; ?>">
                                    <?php echo $data['nama_bus']." [".$data['kelas']."] [".$data['asal']." - ".$data['tujuan']."]"; ?>
                                </option>
                                <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="input-group mb-5 mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tanggal</span>
                </div>
                <input type="date" name="tanggal" class="form-control" placeholder="Angka" required>
            </div>
            <div class="input-group mb-5 mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">Jam</span>
                </div>
                <input type="time" name="jam" class="form-control" placeholder="Angka" required>
            </div>
            <div class="input-group mb-5 mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">Harga</span>
                </div>
                <input type="number" name="harga" class="form-control" placeholder="Angka" required>
            </div>       
            <div class="input-group">
                <button class="btn btn-danger btn-block mb-5" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
