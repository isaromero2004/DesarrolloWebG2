<?php
include("conexion.php");
$nombre=$_POST['nombre_p'];
$documento=$_POST['documento_p'];
$telefono=$_POST['telefono_p'];
$correo=$_POST['correo_p'];
$sql="INSERT INTO pacientes (nombre,documento,telefono,correo) VALUES (?,?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssss",$nombre,$documento,$telefono,$correo);
if($stmt->execute())
{
    echo "Nuevo registro insertado con éxito";
}
?>