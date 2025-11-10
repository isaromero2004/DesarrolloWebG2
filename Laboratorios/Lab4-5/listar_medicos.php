<?php
include("conexion.php");
$sql = "SELECT * FROM medicos";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}
?>
<h1 class="bg-light text-dark m-0 p-3">Listado de Médicos</h1>
<div class="text-end px-3 mt-3">
    <button class="btn btn-success px-4" onclick="cargarContenido('form_insert_medico.html')">Insertar Médicos</button>
</div>
<div class="table-responsive px-3 mt-3">
    <table class="table table-bordered bg-white">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['especialidad']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            <button class="btn btn-primary btn-sm" onclick="editarMedico(<?php echo $row['id']; ?>)">Editar</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmarEliminacionMedico(<?php echo $row['id']; ?>)">Eliminar</button>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
