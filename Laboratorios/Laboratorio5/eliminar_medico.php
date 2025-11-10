<?php
include("conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM medicos";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}
$deleteSql = "DELETE FROM medicos WHERE id = $id";
if (mysqli_query($con, $deleteSql)) {
    echo "Medico eliminado correctamente.";
} else {
    echo "Error al eliminar el medico: " . mysqli_error($con);
}