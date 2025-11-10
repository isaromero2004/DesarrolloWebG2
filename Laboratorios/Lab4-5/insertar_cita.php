<?php
include("conexion.php");
$fecha_cita=$_POST['fecha'];
$hora_cita=$_POST['hora'];
$paciente_id=$_POST['paciente'];
$medico_id=$_POST['medico'];
$estado_cita='Pendiente';
$motivo_cita=$_POST['motivo'];

    $sql="INSERT INTO citas (id_paciente, id_medico, fecha_cita, hora_cita, estado, motivo) VALUES ('$paciente_id', '$medico_id', '$fecha_cita', '$hora_cita', '$estado_cita', '$motivo_cita')";
    if (mysqli_query($con, $sql)) {
        echo "Cita médica registrada exitosamente.";
    } else {
        echo "Error al registrar la cita médica: " . mysqli_error($con);
    }

?>
