<?php include("conexion.php");
// incluir archivos necesarios como proteger.php

$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$sexo=$_POST['sexo'];
$correo=$_POST['correo'];
$id=$_POST['id'];
//para archivos: 
if (isset($_FILES['fotografia']['name']))
{
$nombre_archivo=$_FILES['fotografia']['name'];
$nombre_temporal=$_FILES['fotografia']['tmp_name'];
$extension= explode(".", $nombre_archivo);
$nombre_nuevo=uniqid().".".end($extension);
copy($nombre_temporal, "images/".$nombre_nuevo);
}
$stmt=$con->prepare('UPDATE personas SET nombres=?,apellidos=?,fecha_nacimiento=?,sexo=?,correo=?,fotografia=? WHERE id=?');
$stmt->bind_param("sssssis",$nombres, $apellidos,$fecha_nacimiento,$sexo,$correo,$fotografia, $id);
if ($stmt->execute()) {
    echo "Registro Actualizado";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>