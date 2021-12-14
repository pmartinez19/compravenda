<?php include_once '../class/conn.mysql.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include("../include/header.php"); ?>
<body>
    <?php include("../include/nav.php");
    $sql = "SELECT * FROM producto where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $sql = "Update producto set visitas = visitas + 1 where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $conn->close();


    ?>
    <table>
        <tr>
            <td>
                <img src="../fotos/<?php echo $row['foto_1']; ?>" alt="<?php echo $row['nombre']; ?>" width="200" height="200">
            </td>
            <td>
                <img src="../fotos/<?php echo $row['foto_2']; ?>" alt="<?php echo $row['nombre']; ?>" width="200" height="200">
            </td>
            <td>
                <img src="../fotos/<?php echo $row['foto_3']; ?>" alt="<?php echo $row['nombre']; ?>" width="200" height="200">
            <td>
                <h1><?php echo $row['nombre']; ?></h1>
                <p><?php echo $row['descripcion']; ?></p>
                <p>Precio: <?php echo $row['valor']; ?></p>
                <p>Publicado: <?php echo $row['data']; ?></p>
                <p>Categoria: <?php echo $row['categoria']; ?></p>
                <p>Visitas: <?php echo $row['visitas']; ?></p>
            </td>
        </tr>
    </table>
</body>
</html>