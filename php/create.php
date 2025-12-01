<?php include("conexion.php");
// incluir archivos necesarios como proteger.php
// cuando el formulario envia por POST
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$sexo=$_POST['sexo'];
$correo=$_POST['correo'];
// para archivos:
if (isset($_FILES['fotografia']['name']))
{
$nombre_archivo=$_FILES['fotografia']['name'];
$nombre_temporal=$_FILES['fotografia']['tmp_name'];
$extension= explode(".", $nombre_archivo);
$nombre_nuevo=uniqid().".".end($extension);
copy($nombre_temporal, "images/".$nombre_nuevo);
}

$stmt=$con->prepare('INSERT INTO personas(nombres,apellidos,fecha_nacimiento,sexo,correo,fotografia) VALUES(?,?,?,?,?,?)');
$stmt->bind_param("ssssss",$nombres, $apellidos,$fecha_nacimiento,$sexo,$correo,$fotografia);
if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>