<?php include 'Pizarra.php';
session_start(); 

$palabra = $_POST['palabra'];
$color = $_POST['color'];
$color_fondo = $_POST['color_fondo'];

$_SESSION['Pizarra'] = new Pizarra($palabra, $color, $color_fondo);

if(isset($_SESSION['Pizarra'])){
    $_SESSION['Pizarra']->Cuadrado();
}else{
    echo "No hay pizarra creada";
    echo "<meta http-equiv='refresh' content='2;url=menu.html'>";
}   
?>