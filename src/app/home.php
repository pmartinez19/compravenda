<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../include/header.php';?>
</head>
<body>
<?php 
require_once '../class/conn.mysql.php';
include_once '../include/nav.php';
if($conn){
  echo "<h1>Home</h1>";
  
  $sql = "SELECT * FROM producto";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    echo '<table class="table">';
    echo  '<thead>';
    echo  '  <tr>';
    echo  '    <th scope="col">#</th>';
    echo  '    <th scope="col">Producto</th>';
    echo  '    <th scope="col">Precio</th>';
    echo  '    <th scope="col">Vendedor</th>';
    echo  '  </tr>';
    echo  '</thead>';
    echo '<tbody>';
  
  
    while($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '   <th scope="row">'.$row['id'].'</th>';
      echo '   <td>'.$row['nombre'].'</td>';
      echo '   <td>'.$row['valor'].'</td>';
      echo '   <td>'.$row['cliente_id'].'</td>';
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