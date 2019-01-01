<?php 
    include "db.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
    <script src="../assets/js/jquery-3.3.1.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/DataTables-1.10.19/media/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="../assets/DataTables-1.10.19/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="../assets/DataTables-1.10.19/media/js/jquery.dataTables.min.js"></script>
</head>
<body class="bg-light">

<div class="no-gutters bg-light"> 
    <div container-fluid>
        <div class="row">
            <div class="col-md-12">
            <h5></h5>
            <h2 style="text-align: center;" class="bg-light text-dark"><i class="fas fa-bus"></i> PO. SINAR JAYA CIBITUNG</h2>
            <h6 style="text-align: center;" class="bg-light text-dark">Jl. Sepanjang Raya Narogong , Rawa Lumbu Bekasi No.12</h6>
        </div> 
    </div>
</div>

<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i> Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
            if(isset($_SESSION['user'])){
                include "menu.php";
            }
            else{
                ?>
                <script type="text/javascript">
                    alert("HARAP LOGIN UNTUK AKSES HALAMAN ADMIN");
         
                </script>
                <?php
            }
        ?>
         
</nav>
<div class="container-fluid" style="margin-top:30px">
  <div class="row">
    <?php 
        include "home.php";
    ?>
  </div>
</div>  


</div>
</body>
</html> 
