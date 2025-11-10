<?php
include("conexion.php");
$sql = "SELECT * FROM pacientes";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}
$sql2 = "SELECT * FROM medicos";
$result2 = mysqli_query($con, $sql2);
if (!$result2) {
    die("Error en la consulta: " . mysqli_error($con));
}
$sql3 = "SELECT * FROM citas";
$result3 = mysqli_query($con, $sql3);
if (!$result3) {
    die("Error en la consulta: " . mysqli_error($con));
}
?>
<h1 class="bg-light text-dark m-0 p-3">Registrar Cita Médica</h1>
<div class="bg-light rounded p-4 w-75 mx-auto my-4">
    <form action="javascript:confirmarInsertarCita('insertar_cita.php')" method="post">
        <div class="mb-3">
            <label for="paciente" class="form-label fw-bold">Paciente:</label>
            <select name="paciente" id="paciente" class="form-select" required>
                <option value="">Seleccione un paciente</option>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="medico" class="form-label fw-bold">Médico:</label>
            <select name="medico" id="medico" class="form-select" required>
                <option value="">Seleccione un médico</option>
                <?php while ($row2 = mysqli_fetch_assoc($result2)) : ?>
                    <option value="<?php echo $row2['id']; ?>"><?php echo $row2['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label fw-bold">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label fw-bold">Hora:</label>
            <input type="time" name="hora" id="hora" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="motivo" class="form-label fw-bold">Motivo de la Cita:</label>
            <input type="text" name="motivo" id="motivo" class="form-control" required>
        </div>

        <div class="text-center mt-4">
            <input type="submit" value="Registrar Cita" class="btn btn-primary" style="width: 150px;">
        </div>
    </form>
</div>
