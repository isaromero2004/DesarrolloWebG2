<?php
include("conexion.php");
$cantalumno=$_POST['cantalumno'];
for($i=1;$i<=$cantalumno;$i++){
$nombre=$_POST['nombre'.$i];
$apellido=$_POST['apellido'.$i];
$cu=$_POST['cu'.$i];
if(isset($_FILES['fotografia'.$i]['name'])){
    $nombre_archivo=$_FILES['fotografia'.$i]['name'];
    $nombre_temporal=$_FILES['fotografia'.$i]['tmp_name'];
    $extencion=explode(".",$nombre_archivo);
    $nombre_nuevo=uniqid().".".end($extencion);
    copy($nombre_temporal,"img/".$nombre_nuevo);
}
$sexo=$_POST['sexo'.$i];
$codcarrera=$_POST['carrera'.$i];
$sql="INSERT INTO alumnos(fotografia,nombre,apellido,cu,sexo,codigocarrera) VALUES (?,?,?,?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssssss",$nombre_nuevo,$nombre,$apellido,$cu,$sexo,$codcarrera);
if($stmt->execute()){
    echo "registro exitoso";
}
}
?>