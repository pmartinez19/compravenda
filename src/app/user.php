<?php 
require_once '../class/conn.mysql.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../include/header.php'; ?>
<body>
    <?php include '../include/nav.php';
    
if($conn){
echo "<h1> Bienvenido ".$_SESSION['login_user']."</h1>";
?>
    <form >
        <select name = "order_property" class="form-select" aria-label="Default select example">
            <option value ="" >Orden por id</option>
            <option  value="data">Orden por fecha</option>
            <option  value="valor">Orden por precio </option>
        </select>
        <select name="order_type"  class="form-select" >
            <option value ="asc">Orden Ascendente</option>
            <option value="desc">Orden Descendente</option>
        </select>
        <input type="submit" value="Ordenar">
    </form>

<?php

echo var_dump($_GET);
echo "<br>";

if(isset($_GET['order_property'])){
    if($_GET['order_property'] == 'data'){
        $order_property = 'data';
    }else if($_GET['order_property'] == 'valor'){
        $order_property = 'valor';
    }
    else{
        $order_property = 'id';
    }
}
else{
    $order_property = 'id';
}
if(isset($_GET['order_type'])){
    if($_GET['order_type'] == 'asc'){
        $order_type = 'asc';
    }else{
        $order_type = 'desc';
    }
}else{
    $order_type = 'desc';
}

$sql = "SELECT * FROM producto where cliente_id = '".$_SESSION['id_user']."'";
$sql .= " ORDER BY ".$order_property." ".$order_type;

echo var_dump($sql);
$result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<table class="table">';
        echo  '<thead>';
        echo  '  <tr>';
        echo  '    <th scope="col">Id producto</th>';
        echo  '    <th scope="col">Producto</th>';
        echo  '    <th scope="col">Precio</th>';
        echo  '    <th scope="col">Descripción</th>';
        echo  '    <th scope="col">fecha</th>';
        echo  '    <th scope="col">foto</th>';
        echo  '    <th scope="col">foto</th>';
        echo  '    <th scope="col">foto</th>';
        echo  '    <th scope="col">visitas</th>';
        echo  '  </tr>';
        echo  '</thead>';
        echo '<tbody>';


        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '   <th scope="row">'.$row['id'].'</th>';
            echo '   <td>'.$row['nombre'].'</td>';
            echo '   <td>'.$row['valor'].'</td>';
            echo '   <td>'.$row['descripcion'].'</td>';
            echo '   <td>'.$row['data'].'</td>';
            echo '   <td><img src= "'.$row['foto_1'].'"></td>';
            echo '   <td><img src= "'.$row['foto_2'].'"></td>';
            echo '   <td><img src= "'.$row['foto_3'].'"></td>';
            echo '   <td>'.$row['visitas'].'</td>';
            echo '</tr>';
        } 
        echo '</tbody>';
        echo '</table>';

        } else {
        echo "0 results";
        }
        $conn->close();
    }
else{ echo "Connection error db";
}

?> 
</body>
</html>
