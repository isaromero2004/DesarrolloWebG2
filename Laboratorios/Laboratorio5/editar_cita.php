<?php
include("conexion.php");
$id=$_POST['id'];
$fecha_cita=$_POST['fecha'];
$hora_cita=$_POST['hora'];
$paciente_id=$_POST['paciente'];
$medico_id=$_POST['medico'];
$estado_cita=$_POST['estado'];
$motivo_cita=$_POST['motivo'];
$sql="UPDATE citas SET fecha_cita='$fecha_cita', hora_cita='$hora_cita', id_paciente='$paciente_id', id_medico='$medico_id', estado='$estado_cita', motivo='$motivo_cita' WHERE id=$id";
if (mysqli_query($con, $sql)) {
    echo "Cita médica actualizada exitosamente.";
} else {
    echo "Error al actualizar la cita médica: " . mysqli_error($con);
}