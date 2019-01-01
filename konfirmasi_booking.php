<?php 
$result = $conn->query("INSERT INTO detail_pesanan SELECT * FROM temp WHERE id_pesanan = '$_POST[id_pesanan]'");
if($result){
    $result_delete = $conn->query("DELETE FROM temp WHERE id_pesanan = '$_POST[id_pesanan]'");
    if($result_delete){
        //$pdf->Cell(10,10,'SUSKES MUTASI',1,1);
    }
    else{
        //$pdf->Cell(10,10,'GAGAl MUTASI',1,1);
    }
}
else{
        //$pdf->Cell(10,10,'GAGAl INSERT',1,1);
}
?>
<div class="no-gutters">
<center>
<div class="container-fluid mt-5">
	<h6>Terimakasih Sudah Menggunakan Layanan Tiket Online</h6>
	<h4>PO SINAR JAYA CIBITUNG</h4>
	<h7>Halaman Dimuat Dalam
		<h3 id="detik"></h3>
		<h5>Detik</h5>
	</h7>
	<h7 id="link">Link Manual <u>
		<a href="pdf/cetak_pemesanan.php?id_pesanan=<?php echo $_POST['id_pesanan']; ?>&id_penumpang=<?php echo $_POST['id_penumpang']; ?>";>Click Here</a></u>
	</h7>
</div>
</center>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var time = 10;
		$('#link').hide();
		setTimeout(function(){
			
			
			window.location.href="pdf/cetak_pemesanan.php?id_pesanan=<?php echo $_POST['id_pesanan']; ?>&id_penumpang=<?php echo $_POST['id_penumpang']; ?>";
		}, 10000);

		setInterval(function(){
			if(time >0){
				time--;
				$('#detik').empty();
				$('#detik').append(time);
			}
			else{
				$('#detik').empty();
				$('#detik').append('Thank You');
				$('#link').fadeIn();
			}
		},1000);
	});
</script>