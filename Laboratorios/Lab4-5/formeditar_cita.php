<?php
include('conexion.php');
$id=$_POST['id'];
$sql="SELECT *FROM citas WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$result=$stmt->get_result();
$result=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="bg-light rounded p-4 w-75 mx-auto my-4">
        <form action="javascript:editar('editar_cita.php')" id="formularioEditar">
            <div class="mb-3">
                <label for="fecha" class="form-label fw-bold">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="form-control" value="<?php echo $result['fecha_cita'];?>">
            </div>
            <div class="mb-3">
                <label for="hora" class="form-label fw-bold">Hora:</label>
                <input type="time" id="hora" name="hora" class="form-control" value="<?php echo $result['hora_cita'];?>">
            </div>
            <div class="mb-3">
                <label for="medico" class="form-label fw-bold">Medico:</label>
                <input type="text" id="medico" name="medico" class="form-control" value="<?php echo $result['id_medico'];?>">
            </div>
            <div class="mb-3">
                <label for="paciente" class="form-label fw-bold">Paciente:</label>
                <input type="text" id="paciente" name="paciente" class="form-control" value="<?php echo $result['id_paciente'];?>">
            </div>
            <input type="hidden" id="id" name="id" value="<?php echo $result['id'];?>">
            <div class="mb-3">
                <label for="motivo" class="form-label fw-bold">Motivo:</label>
                <input type="text" id="motivo" name="motivo" class="form-control" value="<?php echo $result['motivo'];?>">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label fw-bold">Estado:</label>
                <select id="estado" name="estado" class="form-select">
                    <option value="<?php echo $result['estado']; ?>"><?php echo $result['estado']; ?></option>
                    <option value="pendiente" <?php if($result['estado'] == "pendiente") echo "selected"; ?>>Pendiente</option>
                    <option value="atendida" <?php if($result['estado'] == "atendida") echo "selected"; ?>>Atendida</option>
                    <option value="cancelada" <?php if($result['estado'] == "cancelada") echo "selected"; ?>>Cancelada</option>
                </select>
            </div>
            <div class="text-center mt-4">
                <input type="submit" value="Actualizar" class="btn btn-primary" style="width: 150px;">
            </div>
        </form>
    </div>
</body>
</html>