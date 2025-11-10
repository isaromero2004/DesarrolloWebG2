<?php
include("conexion.php");
$nombre=$_POST['nombre_m'];
$especialidad=$_POST['especialidad_m'];
$telefono=$_POST['telefono_m'];
$correo=$_POST['correo_m'];
$sql="INSERT INTO medicos (nombre,especialidad,telefono,correo) VALUES (?,?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssss",$nombre,$especialidad,$telefono,$correo);
if($stmt->execute())
{
    echo "Nuevo registro insertado con éxito";
}
?>