<?php
include("conexion.php");
$fecha_cita = $_POST['fecha'];
$hora_cita = $_POST['hora'];
$medico_id = $_POST['medico'];

$sql = "SELECT * FROM citas WHERE id_medico='$medico_id' AND fecha_cita='$fecha_cita' AND hora_cita='$hora_cita'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "conflict";
} else {
    echo "ok";
}