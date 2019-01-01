<div class="no-gutters">
<?php
//$date = date("Y-m-d H:i:s");
//echo $date;
$result = $conn->query("SELECT * FROM pesanan ORDER BY id_pesanan DESC LIMIT 1");
if($result->num_rows>0){
    $data = $result->fetch_assoc();
    $newID = substr($data['id_pesanan'],3,7);
    //echo $newID."<br>";
    $nilai = $newID + 1;
    //echo $nilai;
    $digit = 7 - (strlen($nilai));
    $newIDPesanan = "PSN".substr_replace($newID, $nilai, $digit);
}
else{
    $newIDPesanan = "PSN0000001";
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h3>
                <div align="center">Pesan Tiket</div>
            </h3>
        </div>
    </div>

    <form action="?page=proses_pesanan" method="POST" id="myForm">  
        <div class="row">
            <div class="col-md-6">
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ID Pesanan</span>
                    </div>
                    <input type="text" name="id_pesanan" class="form-control" value="<?php echo $newIDPesanan; ?>" readonly>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-6 mt-1">
                <div class="input-group ml-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ID</span>
                    </div>
                    <input id="id_penumpang" type="text" name="id_penumpang" class="form-control" placeholder="Input ID Penumpang" required>
                </div>
            </div>
        </div>

        
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nama</span>
                        </div>
                        <input id="nama_penumpang" type="text" name="nama_penumpang" class="form-control" readonly="">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Telp. </span>
                        </div>
                        <input id="telepon" type="text" name="telepon" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email</span>
                        </div>
                        <input id="email" type="text" name="email" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">No. Ktp</span>
                        </div>
                        <input id="no_ktp" type="text" name="no_ktp" class="form-control" readonly>
                    </div>
                </div>
            </div>
        <div id="data_penumpang">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Kelas</span>
                        </div>
                        <select class="form-control" id="kelas" name="kelas">
                            <option value="">-- Pilih Kelas -- </option>
                                <?php
                                $sql = $conn->query("SELECT DISTINCT kelas FROM databus ORDER BY kelas ASC");
                                while($kelas=$sql->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $kelas['kelas']; ?>"><?php echo $kelas['kelas']; ?></option>
                                    <?php
                                }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Jurusan</span>
                        </div>
                        <select class="form-control" id="id_jurusan" name="id_jurusan" required>
                            <option value="">-- Pilih Kelas -- </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <p>NOTE : Dengan Mengklik Order Pesanan, ID Anda tidak dapat melakukan transaksi setelah menyelesaikan pembayaran pesanan. namun jika sudah melewati waktu expired, anda dapat melakukan order kembali.</p>
                </div>
                <div class="col-md-12 mt-3 mb-5">
                    <div class="input-group">
                        <button id="btn-submit" type="submit" class="btn btn-danger btn-block mt-2">ORDER</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<hr style="border-color: transparent;">
<hr style="border-color: transparent;">
<hr style="border-color: transparent;">
<hr style="border-color: transparent;">
<script type="text/javascript">
    $(document).ready(function(){
        $('#data_penumpang').hide();
        $('#id_jurusan').empty();
        $('#nama_penumpang').val('');
        $('#telepon').val('');
        $('#email').val('');
        $('#no_ktp').val('');
        
        $('#id_penumpang').on('keyup',function(){
            var id_penumpang = $('#id_penumpang').val();
            //alert(id_penumpang);
            $.ajax({
                url: "cari_penumpang.php",
                type: "POST",
                data: {id_penumpang: id_penumpang},
                dataType: "JSON",
                success: function(data){
                    //alert("succes");
                    for(i=0; i<data.penumpang.length; i++){
                        //alert(data.penumpang[i].id_penumpang);

                        //$('#data_penumpang').append('<option value='+data.kategori[i].id_jenis+'>'+data.kategori[i].jenis+' Rp. '+data.kategori[i].harga+'</option>');
                        $('#nama_penumpang').val(data.penumpang[i].namapenumpang);
                        $('#telepon').val(data.penumpang[i].telepon);
                        $('#email').val(data.penumpang[i].email);
                        $('#no_ktp').val(data.penumpang[i].no_ktp);
                        $('#data_penumpang').show();
                    }
                },
                error: function(data){
                    $('#nama_penumpang').val('');
                    $('#telepon').val('');
                    $('#email').val('');
                    $('#no_ktp').val('');
                    //alert("Tidak dapat merespon");
                    $('#data_penumpang').hide();
                    //$('#jenis_kategori').append('<option value=""></option>');
                } 
            });
        });



        $('#kelas').on('change',function(){
            var kelas = $('#kelas').val();
            //alert(kelas);
            $.ajax({
                url: "cari_jurusan.php",
                type: "POST",
                data: {kelas: kelas},
                dataType: "JSON", 
                success: function(data){
                    $('#id_jurusan').empty();
                    //alert("sukses");
                    for(i=0; i<data.kelas.length; i++){
                        //alert(data.kelas[i].id_jadwal);
                        //$('#myTable').append('<tr><td>'+data.temp[i].id_transaksi+'</td><td>'+data.temp[i].nama_kategori+'</td><td>'+data.temp[i].jenis+'</td><td align="right">'+data.temp[i].tarif+'</td><td>'+data.temp[i].tgl_ambil+'</td><td>'+data.temp[i].qty+'</td><td align="right">'+data.temp[i].diskon+' %</td><td><button type="button" class="tombol-hapus" data-id="'+data.temp[i].id_transaksi+'">Hapus</button></td></tr>');

                        $('#id_jurusan').append('<option value="'+data.kelas[i].id_jadwal+'">'+data.kelas[i].asal+' - '+data.kelas[i].tujuan+' - '+data.kelas[i].harga_tiket+'</option>');
                        //total = total + data.temp[i].tarif;
                    }
                },
                error: function(data){
                    //alert("Harap Pilih Kelas Dahulu");
                    $('#id_jurusan').empty();
                    $('#id_jurusan').append('<option value="">Tidak Ada Jurusan<option>');
                } 
            });

        });
  

    });

    
</script>