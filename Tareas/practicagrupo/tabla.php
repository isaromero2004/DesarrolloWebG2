<?php
include("conexion.php");
$sql="SELECT  a.id,a.nombre,a.fotografia,a.apellido,a.CU,a.sexo,c.carrera FROM alumnos a inner JOIN carrera c ON a.codigocarrera=c.codigo";
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table style=" display: flex; align-items: center; justify-content: center; border-collapse:collapse;" border="2px solid black">
    <tr style="text-aling:center;">
        <th>ID</th>
        <th>Fotografia</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>CU</th>
        <th>Sexo</th>
        <th>Carrera</th>
    </tr>
    <?php
    while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr style="text-align:center;">
            <td><?php echo $row['id']; ?></td>
            <td><img src="img/<?php echo $row['fotografia']; ?>" width="150px" height="100px"></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['CU']; ?></td>
            <td><?php echo $row['sexo']=='F' ? 'Femenino' : 'Masculino'; ?></td>
            <td><?php echo $row['carrera']; ?></td>
        </tr>
        <?php
    }
    ?>
    </table>
</body>
</html>