<?php
// including the database connection file
include_once("conn.mysql.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
    $nombre = "";
    $descripcion = "";
    $valor = "";
    $categoria = "";

    if(isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
    }
    if(isset($_POST['descripcion'])){
        $descripcion = $_POST['descripcion'];
    }
    if(isset($_POST['valor'])){
        $valor = $_POST['valor'];
    }
    if(isset($_POST['categoria'])){
        $categoria = $_POST['categoria'];
    }
    if($nombre == "" && $descripcion == "" && $valor == "" && $categoria == ""){
        echo "Faltan datos";
        header("Location: ../app/user.php");
    }else{
        
	// update producto

		$sql = "UPDATE product SET nombre=:nombre, valor=:valor, descripcion= :descripcion , categoria=:categoria WHERE cliente_id=:cliente_id and id=:id";
		$query = $dbConn->prepare($sql);
		
        //obligatorio
		$query->bindparam(':id', $id);
        $query->bindparam(':cliente_id', $_SESSION['id_user']);

        //opcionales todos, obligatorio 1
		$nombre == "" ? $query->bindparam(':nombre', "nombre") : $query->bindparam(':nombre', $nombre);
        $descripcion == "" ? $query->bindparam(':descripcion', "descripcion") : $query->bindparam(':descripcion', $descripcion);
        $valor == "" ? $query->bindparam(':valor', "valor") : $query->bindparam(':valor', $valor);
        $categoria == "" ? $query->bindparam(':categoria', "categoria") : $query->bindparam(':categoria', $categoria);

            try{
                $query->execute();
                echo "<script>alert('Producto actualizado correctamente');</script>";
                $dbConn = null;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
		
		
		
	}

?>
