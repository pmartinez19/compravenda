<?php
//signup page
include("../class/conn.mysql.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    $sql_user = "SELECT * FROM cliente WHERE username = '" . $_POST["username"] . "'";
    $sql_user = "SELECT * FROM cliente WHERE username = ? ";
    $stmt = $conn->prepare($sql_user);
    $stmt->bind_param("s", $_POST["username"]);
    $result_user = $stmt->execute();
    $result_user = $stmt->get_result();
    $row = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result_user);

    if ($count >= 1) {
        echo "Username already exists";
    } else {
        $myusername = mysqli_real_escape_string($conn,$_POST['username']);
        $mypassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $myemail = mysqli_real_escape_string($conn,$_POST['email']);
        $myname = mysqli_real_escape_string($conn,$_POST['fname']);
        $myphone = mysqli_real_escape_string($conn,$_POST['phone']);
        $myaddress = mysqli_real_escape_string($conn,$_POST['address']);
        $mycity = mysqli_real_escape_string($conn,$_POST['city']);
        $mystate = mysqli_real_escape_string($conn,$_POST['state']);
        $myzip = mysqli_real_escape_string($conn,$_POST['zip']);
        
        $sql = "INSERT into cliente (username, nombre, password, direccion, telefono, email, ciudad, pais, zip) VALUES (? , ?, ?, ?, ?, ?, ?, ?, ?)";  
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $myusername, $myusername ,$mypassword, $myaddress, $myphone, $myemail, $mycity, $mystate, $myzip);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        //header("location: ../../index.php");
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("../include/header.php"); ?>

    <body>
        <?php include("../include/nav.php"); ?>
        <br><br>
        <?php
        $actual_link = $_SERVER['PHP_SELF'];
        echo $actual_link;
        ?>
            <script>
                function validateForm() {
                    if (document.forms["formulario"]["username"].value == "") {
                        alert("Username must be filled out");
                        return false;
                    }
                    if ( document.forms["formulario"]["password"].value == "") {
                        if ( document.forms["formulario"]["cpassword"].value == ""){
                            alert("Confirmación clave necesaria");
                            return false;
                        }
                        else{
                            if ( document.forms["formulario"]["password"].value != document.forms["formulario"]["cpassword"].value){
                                alert("Las claves no coinciden");
                                return false;
                            }
                        }
                        alert("Password must be filled out");
                        return false;
                    }
                    if (document.forms["formulario"]["email"].value == "") {
                        alert("Email must be filled out");
                        return false;
                    }
                    if (document.forms["formulario"]["fname"].value == "") {
                        alert("Name must be filled out");
                        return false;
                    }
                    if (document.forms["formulario"]["phone"].value == "" ){
                        let phone = document.forms["formulario"]["phone"].value.paserInt();
                        if (isNaN(document.forms["formulario"]["phone"].value) || document.forms["formulario"]["phone"].value.length != 9)
                            {
                        alert("Número de teléfono inválido" + typeof document.forms["formulario"]["phone"].value)	
                        return false;
                        }
                    }
                    if (document.forms["formulario"]["address"].value == "") {
                        alert("Address must be filled out");
                        return false;
                    }
                    if (document.forms["formulario"]["city"].value == "") {
                        alert("City must be filled out");
                        return false;
                    }
                    if (document.forms["formulario"]["state"].value == "") {
                        alert("State must be filled out");
                        return false;
                    }
                    if (x = document.forms["formulario"]["zip"].value == "") {
                        alert("Zip must be filled out");
                        return false;
                    }else{
                        document.forms["formulario"].submit();
                    }
                }

            </script>
            <form  method="post" action="" name="formulario">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" placeholder="Nombre usuario" name="username" type="text" id= "username" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Nombre Completo</label>
                        <input class="form-control" placeholder="Nombre Completo" name="fname" type="text" id = "Nombre" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" placeholder="ejemplo@email.com" name="email" type="email" id="email" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="password">Clave</label>
                        <input class="form-control" placeholder="AlR12#-.Ytre1_" name="password" type="password" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="Confirmation">Confirmar Clave</label>
                        <input class="form-control" placeholder="Confirmar clave" name="cpassword" type="password" id="Confirmation" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input class="form-control" placeholder="Número de telefono" name="phone" type="text" id = "telefono" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input class="form-control" placeholder="Calle falsa 1234, escalera A, planta 3, puerta 4" name="address" id = "address" type="text" value="" required >
                    </div>
                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input class="form-control" placeholder="Ciutat Vella" name="city" id = "city" type="text" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="state">País</label>
                        <input class="form-control" placeholder="Andorra" name="state" id = "state" type="text" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">Codigo Postal</label>
                        <input class="form-control" placeholder="08562" name="zip" id = "zip" type="text" value="" required>
                    </div>
                   
                <input type="submit" name="submit" id= "submit" class="btn btn-lg btn-success btn-block" value="Sign Up" onclick="validateForm()">
            </form>
           



    </body>

</html>