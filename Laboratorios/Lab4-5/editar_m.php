<?php
include("conexion.php");
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$especialidad=$_POST['especialidad'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$sql="UPDATE medicos SET nombre=?, especialidad=?, telefono=?, correo=? WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssssi",$nombre,$especialidad,$telefono,$correo,$id);
if($stmt->execute()){
    echo "Registro actualizado correctamente";
}else{
    echo "Error al actualizar registro";
}
?>