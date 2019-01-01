<?php
/*
	include "db.php";

	$username  = $_POST["username"];
	// encrypt password dengan md5 password
	$password  = md5($_POST["password"]);

	$query     ="SELECT * FROM admin WHERE username='$username' AND password='$password'";

	$login     = mysqli_query($db,$query)or die(mysqli_error($db));
	$jlhrecord = mysqli_num_rows($login);

	$data      = mysqli_fetch_array($login,MYSQLI_BOTH);

	$username  = $data['username'];
	$level  = $data['level'];

	if ($jlhrecord > 0){

		session_start();
		$_SESSION['username']  = $username;
		$_SESSION['password']  = $password;
		$_SESSION['id']        = session_id();
		
		header('location:../mimin/admin.php'); 

	}
	else{
	
		print"
			<script>
				alert(\"Username atau Password Anda Salah!\");
				history.back(-1);
			</script>";
	} 
*/


?>

<div class="col-md-12 text-center">
    <form action="cek_login.php" id="form" name="admin" method="post">
    <div class="row justify-content-center" style="margin-top: 60px;">
		<div class="col-md-3">
			
			<h4>L O G I N - A D M I N</h4>
			<br>
			<div class="input-group">
	            <input id="username" class="form-control" type="text" name="username" placeholder="Username" required>
	            <span style="padding: 10px;"><i class="fas fa-user"></i></span>
	        </div>
	        <br>
	        <div class="input-group">
	        	
	            <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
	            <span style="padding: 10px;"><i class="fas fa-lock"></i></span>
	        </div>
	        <br>
	        <button id="submit" class='btn btn-danger btn-block' type="submit">Login</button>
	    </div>
	</div>
	</form>
</div>

<script type="text/javascript">
	$('#submit').on('click',function(){
		/*
		var password = $('#password').val();
		var username = $('#username').val();
		if(password == "" && username == ""){
			alert("password kosong");
		}
		else{
			$(document).on('submit',submit());
			/*
			$.ajax({
	                url: "cek_login.php",
	                type: "POST",
	                data: {username: username, password: password},
	                dataType: "JSON",
	                success: function(data){
	                	
	                		alert('WELCOME ' + data.admin[0].id_admin);

	                },
	                error: function(){
	                	alert("gagal");
	                }
	        });
	       	
		}
		*/
	});
</script>