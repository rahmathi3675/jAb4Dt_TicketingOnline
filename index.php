<?php 
include 'db.php';

?>
<!DOCTYPE html>
<html>
<head>
	<!-- untuk title tab broser -->
	<title>Bus Ticketing</title>
  	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="assets/css/bootstrap.css">
  	<script src="assets/js/jquery-3.3.1.js"></script>
  	<script src="assets/js/popper.min.js"></script>
  	<script src="assets/js/bootstrap.min.js"></script>
  	<script src="assets/js/popper.min.js"></script>
	<link rel="stylesheet" href="assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/DataTables-1.10.19/media/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="assets/DataTables-1.10.19/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="assets/DataTables-1.10.19/media/js/jquery.dataTables.min.js"></script>
  	  	<script type="text/javascript">
    $(document).ready(function () {
        $('#tombol').on('click',function(){
        	alert('tes');
        });
			
		$('#table-jadwal').DataTable();
        //DataTable();
    	});
	</script>
  	  <style>
		  /* Make the image fully responsive */
		  .carousel-inner img {
		      width: 100%;
		      height: 50%;
		  }
		  .bnt-custom{

		  }
	  </style>
</head>
<body>


<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" class="img-fluid" href="index.php"><i class="fas fa-home"></i> Dashboard</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    	<span class="navbar-toggler-icon"></span>
	</button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    	<ul class="navbar-nav">
        	<li class="nav-item">
				<a class="nav-link" href="index.php?page=jadwal"><i class="fas fa-calendar-alt"></i> Jadwal Bus</a></li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?page=cara"><i class="fas fa-search"></i> Cara Pemesanan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?page=booking"><i class="fas fa-shopping-cart"></i> Booking Tiket</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?page=daftar"><i class="fas fa-user-plus"></i> Daftar</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?page=tentang"><i class="fas fa-info"></i> Tentang Kami</a>
			</li>
		</ul>
	</div>
</nav>

	<?php

	if(isset($_GET['page'])){
		$page=$_GET['page'];
		if($page=="tentang"){
			include 'tentangkami.php';
		}
		else if($page=="jadwal"){
			include 'jadwal.php';
		}
		else if($page=="cara"){
			include 'cara_beli.php';
		}
		else if($page=="booking"){
			include 'order.php';
		}
		else if($page=="daftar"){
			include 'daftar_penumpang.php';
		}
		else if($page=="proses_daftar_penumpang"){
			include 'proses_daftar_penumpang.php';
		}
		else if($page=="proses_pesanan"){
			include 'proses_pesanan.php';
		}
		else if($page == "konfirmasi_booking") {
			include 'konfirmasi_booking.php';
		}
		else if($page == "layout") {
			include 'layout.php';
		}

	}
	else{
		include 'welcome.php';
	}
	?>


<div class="no-gutters mt-5">
<nav style="text-align: center;" class="navbar navbar-expand-md bg-dark navbar-dark fixed-bottom">
		<div class="container-fluid">
			<div class="col-md-12">
			<p align="center">
				<div class="bg-dark text-light">Copyright &copy; <?php echo date("Y"); ?>
				<a class="bg-dark text-blue" href="index.php">  Bus Ticketing 2018  </a> 
				Designed by Wening Ambarsari</div>
			</p>
		</div>
		</div>
	</nav>
</div>
</body>
</html>
<script type="text/javascript">
	setInterval(function(){
		$.ajax({
			url: "delete_transaksi_expired.php",
		    success: function(data){
		        //alert(data);
			},
		    error: function(data){
		    	//alert(data);
		    }
		});
	}, 5000);
</script>
