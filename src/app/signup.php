<?php
//signup page
include("../class/conn.mysql.php");
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("../include/header.php"); ?>

    <body>
        <?php include("../include/nav.php"); ?>
        <br><br>
        <?php
        $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        echo $actual_link;
        ?>
        
            <form  method="post" action="">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" placeholder="Nombre usuario" name="username" type="text" id= "username" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Nombre Completo</label>
                        <input class="form-control" placeholder="Nombre Completo" name="fname" type="text" id = "Nombre" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" placeholder="ejemplo@email.com" name="email" type="email" id="email" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Clave</label>
                        <input class="form-control" placeholder="AlR12#-.Ytre1_" name="password" type="password" value="">
                    </div>
                    <div class="form-group">
                        <label for="Confirmation">Confirmar Clave</label>
                        <input class="form-control" placeholder="Confirmar clave" name="cpassword" type="password" id="Confirmation" value="">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input class="form-control" placeholder="Número de telefono" name="phone" type="text" id = "telefono" value="">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input class="form-control" placeholder="Calle falsa 1234, escalera A, planta 3, puerta 4" name="address" id = "address" type="text" value="">
                    </div>
                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input class="form-control" placeholder="Ciutat Vella" name="city" id = "city" type="text" value="">
                    </div>
                    <div class="form-group">
                        <label for="state">País</label>
                        <input class="form-control" placeholder="Andorra" name="state" id = "state" type="text" value="">
                    </div>
                    <div class="form-group">
                        <label for="zip">Codigo Postal</label>
                        <input class="form-control" placeholder="08562" name="zip" id = "zip" type="text" value="">
                    </div>
                    
                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Sign Up">
            </form>
           



    </body>

</html>