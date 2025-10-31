<?php
$con= new mysqli("localhost","root","","bd_alumnos");
if($con->connect_error){
  die("Connection failed: " . $con->connect_error);
}
?>