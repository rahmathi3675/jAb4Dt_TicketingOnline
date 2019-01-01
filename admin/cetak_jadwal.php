<div class="col-md-12">
<center>
<div class="container-fluid mt-5">
	<h6>Terimakasih Sudah Menggunakan Layanan Tiket Online</h6>
	<h4>PO SINAR JAYA CIBITUNG</h4>
	<hr style="border-color: transparent;">
	<h7>Preparing pdf . . .
	<div class="col-md-3">
  		<div class="progress">
    		<div id="pr" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
    		</div>
  		</div>
	</div>
	</h7>
	<hr style="border-color: transparent;">
	<h7 id="link">
		<a href="../pdf/cetak_jadwal.php">Manual Link</a>		
	</h7>
</div>
</center>
</div>
<script type="text/javascript">
	//alert('a');
	$(document).ready(function(){
		$('#link').hide();
		var time = 0;
		//alert("A");

		var elem = document.getElementById("pr");

    	var width = 0;
    	var id = setInterval(frame, 100);
    	function frame() {
	        if (width >= 100) {
	            clearInterval(id);
	            window.location.href="../pdf/cetak_jadwal.php";
	            $('#link').fadeIn();
	        } else {
	            width++;
	            elem.style.width = width + '%';
	            elem.innerHTML = width * 1 + '%';
	        }
    	}
    });
</script>