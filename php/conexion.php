<?php
$con=new mysqli("localhost","root","","nombre de la base de datos");
if ($con->connect_error)    
    { 
        die ("conexion fallada".$con->connect_error);
    }			
?>