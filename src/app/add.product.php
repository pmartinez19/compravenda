<?php include '../class/conn.mysql.php'; ?>
<!DOCTYPE html>
<html lang="en">
 <?php include '../include/header.php'; ?>
<body>
    <?php include '../include/nav.php'; 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $output_dir = "../fotos";
    $RandomNum = time();
    $ImageName = str_replace(' ','-',strtolower($_FILES['foto_1']['name'][0]));
    $ImageType = $_FILES['foto_1']['type'][0];

    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.','',$ImageExt);
    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;
                    
    move_uploaded_file($_FILES["foto_1"]["tmp_name"][0],$output_dir."/".$NewImageName );
    move_uploaded_file($_FILES["foto_2"]["tmp_name"][0],$output_dir."/".$NewImageName."_2" );
    move_uploaded_file($_FILES["foto_3"]["tmp_name"][0],$output_dir."/".$NewImageName."_3" );
        $sql = "INSERT INTO `producto` (`id`, `cliente_id`, `nombre`, `valor`, `data`, `foto_1`, `foto_2`, `foto_3`, `descripcion`, `categoria`, `visitas`) VALUES (NULL, ?, ?, ?, current_timestamp(), ?, ?, ?, ?, ?, 0)";
        $cliente_id = $_SESSION['id_user'];
        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        
        $foto_1 = $NewImageName;
        $foto_2 = $NewImageName."_2";
        $foto_3 = $NewImageName."_3";
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $stmt = $conn->prepare($sql);
        echo $conn->error;
        echo var_dump($stmt);
        $stmt->bind_param('ssssssss', $cliente_id, $nombre, $valor, $foto_1, $foto_2, $foto_3, $descripcion, $categoria);

        $stmt->execute();
        $conn->close();
        header("Location: home.php");
}
    ?>
        
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Añadir nuevo producto</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="add.product.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name">Nombre</label>
                        <input type="text" class="form-control" id="product_name" name="nombre" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="product_description" name="descripcion" rows="3"></textarea required>
                    </div>
                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="text" class="form-control" id="product_price" name="valor" placeholder="Product Price" required>
                    </div>
                    <select class="form-control" name="categoria" required>
                        <option value="Electrodomestico">Electrodomestico</option>
                        <option value="Menaje">Menaje</option>
                        <option value="Motor">Motor</option>
                    <div class="form-group">
                        <label for="foto_1">Foto 1</label>
                        <input type="file" class="form-control-file" id="foto_1" name="foto_1[]" required>
                    </div>
                    <div class="form-group">
                        <label for="foto_2">Foto 2</label>
                        <input type="file" class="form-control-file" id="foto_1" name="foto_2[]">
                    </div>
                    <div class="form-group">
                        <label for="foto_3">Foto 3</label>
                        <input type="file" class="form-control-file" id="foto_1" name="foto_3[]" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>    
</body>
</html>