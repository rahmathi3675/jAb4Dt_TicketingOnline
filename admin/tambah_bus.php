<?php
$result = $conn->query("SELECT * FROM databus ORDER BY id_bus DESC LIMIT 1");
if($result->num_rows>0){
    $data = $result->fetch_assoc();
    $newID = substr($data['id_bus'],3,7);
    //echo $newID."<br>";
    $nilai = $newID + 1;
    //echo $nilai;
    $digit = 7 - (strlen($nilai));
    $newIDBus = "BUS".substr_replace($newID, $nilai, $digit);
}
else{
    $newIDBus = "BUS0000001";
}
?>
<div class="container-fluid">
    <div class="col-md-12">
        <h3>
            <div align="center">Tambah Armada Bus Baru</div>
        </h3>
        
        <form action="?page=proses_tambah_bus" method="POST">
            <div class="input-group mb-5 mt-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">ID Bus</span>
                </div>
                <input type="text" name="id_bus" class="form-control" value="<?php echo $newIDBus; ?>" readonly>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nama Bus</span>
                </div>
                <input type="text" name="nama_bus" class="form-control" placeholder="Input Nama Bus" required>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Kelas</span>
                </div>
                <select id="kelas" name="kelas" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Eksekutif">Eksekutif</option>
                </select>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Kota Asal</span>
                </div>
                <input type="text" name="asal" class="form-control" placeholder="Nama Kota Tujuan" required>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Kota Tujuan</span>
                </div>
                <input type="text" name="tujuan" class="form-control" placeholder="Nama Kota Tujuan" required>
            </div>
            <div class="input-group mb-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">Kapasitas Kursi</span>
                </div>
                <input id="jml_kursi" type="number" name="jml_kursi" class="form-control" placeholder="Angka" readonly>
            </div>       
            <div class="input-group">
                <button class="btn btn-danger btn-block mb-5" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#kelas').on('keyup',function(){
            var kelas = $('#kelas').val();
            //alert(kelas);
            if(kelas == 'Eksekutif'){
                $('#jml_kursi').val('63');
            }
            else if(kelas == 'Bisnis'){
                $('#jml_kursi').val('79');   
            }
            else if(kelas == 'Ekonomi'){
                $('#jml_kursi').val('79');   
            }
            else{
                $('#jml_kursi').val('0');   
            }
        });
    });
</script>


