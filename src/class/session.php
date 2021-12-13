<?php
   include('conn.mysql.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select nombre from cliente where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:localhost/compravende/src/app/login.php");
      die();
   }
   else{
        echo "Bienvenido: ".$_SESSION['login_user'];
   }