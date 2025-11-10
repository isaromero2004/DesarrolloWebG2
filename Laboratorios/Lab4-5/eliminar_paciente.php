<?php
include("conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM pacientes";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}
$deleteSql = "DELETE FROM pacientes WHERE id = $id";
if (mysqli_query($con, $deleteSql)) {
    echo "Paciente eliminado correctamente.";
} else {
    echo "Error al eliminar el paciente: " . mysqli_error($con);
}