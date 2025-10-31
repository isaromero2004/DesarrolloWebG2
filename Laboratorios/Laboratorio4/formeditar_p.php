<?php
include('conexion.php');
$id=$_POST['id'];
$sql="SELECT *FROM pacientes WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$result=$stmt->get_result();
$result=$result->fetch_assoc();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="javascript:editar('editar_p.php')" id="formularioEditar">
<label for="nombre" >Nombre:</label>
<input type="text" id="nombre" name="nombre" value="<?php echo $result['nombre'];?>">
<br><br>
<label for="documento">Documento:</label>
<input type="text" id="documento" name="documento" value="<?php echo $result['documento'];?>"><br><br>
<label for="telefono">Telefono:</label>
<input type="text" id="telefono" name="telefono" value="<?php echo $result['telefono'];?>"><br><br>
<label for="correo">Correo:</label>
<input type="text" id="correo" name="correo" value="<?php echo $result['correo'];?>"><br><br>   
<input type="hidden" id="id" name="id" value="<?php echo $result['id'];?>">
<input type="submit" value="Actualizar">
</form>
</body>
</html>