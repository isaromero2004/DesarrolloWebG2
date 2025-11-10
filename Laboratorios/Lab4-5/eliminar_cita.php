<?php
include("conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM citas";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}
$deleteSql = "DELETE FROM citas WHERE id = $id";
if (mysqli_query($con, $deleteSql)) {
    echo "Cita eliminada correctamente.";
} else {
    echo "Error al eliminar la cita: " . mysqli_error($con);
}