<?php
include('conexion.php');
$id=$_POST['id'];
$sql="SELECT *FROM pacientes WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$result=$stmt->get_result();
$result=$result->fetch_assoc();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="bg-light rounded p-4 w-75 mx-auto my-4">
        <form action="javascript:editar('editar_p.php')" id="formularioEditar">
            <div class="mb-3">
                <label for="nombre" class="form-label fw-bold">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $result['nombre'];?>">
            </div>
            <div class="mb-3">
                <label for="documento" class="form-label fw-bold">Documento:</label>
                <input type="text" id="documento" name="documento" class="form-control" value="<?php echo $result['documento'];?>">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label fw-bold">Telefono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $result['telefono'];?>">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label fw-bold">Correo:</label>
                <input type="text" id="correo" name="correo" class="form-control" value="<?php echo $result['correo'];?>">
            </div>   
            <input type="hidden" id="id" name="id" value="<?php echo $result['id'];?>">
            <div class="text-center mt-4">
                <input type="submit" value="Actualizar" class="btn btn-primary" style="width: 150px;">
            </div>
        </form>
    </div>
</body>
</html>