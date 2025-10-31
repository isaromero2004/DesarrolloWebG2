<?php
include('conexion.php');
$cantalumno=$_POST['cantalumno'];
$sql="SELECT codigo,carrera FROM carrera";
$res=$con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="javascript:insertar()" method="post" enctype="multipart/form-data" id="formulario">
    <table style="border-collapse:collapse; display:flex; align-items:center; justify-content:center;" border="2px solid black">
        <tr  style="background-color:blue; color:white; height:50px;">
            <th></th>
            <th>fotografia</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>CU</th>
            <th>Sexo</th>
            <th>Carrera</th>
        </tr>
        <?php
        for($i=1;$i<=$cantalumno;$i++){
            ?>
            <tr style="background-color:blue; color:white; height:50px;">
                <td><?php echo $i; ?></td>
                <td><input type="file" name="fotografia<?php echo $i; ?>"></td>
                <td><input type="text" name="nombre<?php echo $i; ?>"></td>
                <td><input type="text" name="apellido<?php echo $i; ?>"></td>
                <td><input type="text" name="cu<?php echo $i; ?>"></td>
                <td>
                    <input type="radio" name="sexo<?php echo $i; ?>" value="Masculino">M
                    <input type="radio" name="sexo<?php echo $i; ?>" value="Femenino">F
                </td>
                <td>
                    <select name="carrera<?php echo $i; ?>">
                        <?php
                        foreach($res as $row){
                            ?>
                            <option value="<?php echo $row['codigo']; ?>"><?php echo $row['carrera']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
                
            </tr>
            <?php
        }
        ?>
        <input type="hidden" name="cantalumno" value="<?php echo $cantalumno; ?>">
        <tr style="height:50px;">
            <td colspan="7">
                <input type="submit" value="Insertar">
                <input type="reset" value="Borrar">
            </td>
        </tr>
    </table>
    <br>
</form>
</body>
</html>