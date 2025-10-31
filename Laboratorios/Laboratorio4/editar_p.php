<?php
include("conexion.php");
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$documento=$_POST['documento'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$sql="UPDATE pacientes SET nombre=?, documento=?, telefono=?, correo=? WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssssi",$nombre,$documento,$telefono,$correo,$id);
if($stmt->execute()){
    echo "Registro actualizado correctamente";
}else{
    echo "Error al actualizar registro";
}
?>