<?php
   
   include("../class/conn.mysql.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
	  $sql_hash = "SELECT * FROM cliente WHERE username = '$myusername'";
	  $result = mysqli_query($conn,$sql_hash);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  echo "hash: ".var_dump($row);
	  $hash = $row['password'];

	  $verify = password_verify($mypassword, $hash); 
      
      $sql = "SELECT id FROM cliente WHERE username = '$myusername' ";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1 && $verify) {
         $_SESSION['login_user'] = $myusername;
		 $_SESSION['id_user'] = $row['id'];
         
         echo "Bienvenido, $myusername!";
         header("location: ../../index.php");
      }else {
         $error = "Nombre o contraseña incorrecta";
      }
   }
?>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    <?php include("../include/header.php"); ?>
<body>
    <?php include("../include/nav.php"); ?>
    <br>
    <br>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
                <br><br>
				<h3>Inicio de sesión</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action = "" method = "post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name = "username" class="form-control" placeholder="nombre usuario"/>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name = "password" class="form-control" placeholder="clave"/>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Recuerdame  
					</div>
					<div class="form-group">
						<input type="submit" value=" Submit " class="btn float-right login_btn"/>
					</div>
				</form>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php 
                if(isset($error)) { echo $error; }?></div>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
				    ¿Aún no tienes una cuenta?<a href="signup.php">Crear nueva</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Olvidaste tu contraseña?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>