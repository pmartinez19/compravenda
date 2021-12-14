<?php 
require_once '../class/conn.mysql.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../include/header.php'; ?>
<body>
    <?php include '../include/nav.php';
    
if($conn){
echo "<h1> Bienvenidos a Compravende</h1>";
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
        Categoria: <select name = "filtro_categoria" class="form-select" aria-label="Default select example">
            <option value ="" >Todas</option>
            <?php
            $sql = "SELECT distinct categoria FROM producto where categoria NOT LIKE ''";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["categoria"]."'>".$row["categoria"]."</option>";
                }
            }
            ?> 
        </select>
        Precio máximo: <input name = "max_price" > 
        Precio mínimo: <input name = "min_price" >  <br>

        <input type="submit" value="Ordenar">

    </form>
    
<?php

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

$sql = "SELECT * FROM producto";
$where ="" ;
$bind ="";
if(isset($_GET['filtro_categoria']) && $_GET['filtro_categoria'] != ''){
    $where = " where categoria = ?";
    $bind = "s";
}
if(isset($_GET['max_price']) && $_GET['max_price'] != ''){
  $bind = $bind."d";
    if($where == ""){
        $where = " where valor <= ? ";
    }
    else{
      $where = $where." and valor <= ?";
    }
}
if(isset($_GET['min_price']) && $_GET['min_price'] != ''){
  $bind = $bind."d";
    if($where == ""){
        $where = " where valor >= ?";
    }else{
    $where = $where." and valor >= ?";
    }
}
if($where != ""){
    $sql = $sql.$where;
}
$sql .= " ORDER BY ".$order_property." ".$order_type;
$stmt = $conn->prepare($sql);
if(strlen($bind) == 1){
    if(isset($_GET['min_price']) && $_GET['min_price'] != ''){
        $stmt->bind_param($bind,$_GET['min_price']);
    }else if(isset($_GET['max_price']) && $_GET['max_price'] != ''){

        $stmt->bind_param($bind,$_GET['max_price']);
    }else{
        $stmt->bind_param($bind,$_GET['filtro_categoria']);
    }
}
else if(strlen($bind) == 2){
    if(isset($_GET['min_price']) && $_GET['min_price'] != '' && isset($_GET['max_price']) && $_GET['max_price'] != ''){
        $stmt->bind_param($bind,$_GET['max_price'],$_GET['min_price']);
    }else if(isset($_GET['min_price']) && $_GET['min_price'] != '' && !isset($_GET['categoria']) && $_GET['categoria'] == ''){
        $stmt->bind_param($bind,$_GET['filtro_categoria'],$_GET['min_price']);
    }
    else if(isset($_GET['max_price']) && $_GET['max_price'] != '' && !isset($_GET['categoria'])){
        $stmt->bind_param($bind,$_GET['filtro_categoria'],$_GET['max_price']);
    }
}
else if(strlen($bind) == 3){
    $stmt->bind_param($bind,$_GET['filtro_categoria'],$_GET['min_price'],$_GET['max_price']);
}
$result = $stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

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
        echo  '    <th scope="col">ver</th>';
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
            echo '   <td><img src= "../fotos/'.$row['foto_1'].'"></td>';
            echo '   <td><img src= "../fotos/'.$row['foto_2'].'"></td>';
            echo '   <td><img src= "../fotos/'.$row['foto_3'].'"></td>';
            echo '   <td>'.$row['visitas'].'</td>';
            echo  '    <td scope="col"><a href="producto.php?id='.$row['id'].'">Producto </td>';
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
