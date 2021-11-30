<?php 
require_once '../class/conn.php';
require_once '../class/crud.php';
include_once '../include/header.php';
include_once '../include/nav.php';
if(isset($conn)){
    $conn -> close();
};
$conn = new crud();
$statment = $conn-> selectAllData("producto");

$result = $statment->fetch(PDO::FETCH_ASSOC);
var_dump($result);

?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>