<?php
include("conexion.php");
$sql = "SELECT * FROM medicos";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}
?>
<h1 style="  color: #2e4356; background-color: #f3f5f4; padding: 10px;">Listado de Médicos</h1>
<button class="insertarbtn" onclick="cargarContenido('form_insert_medico.html')">Insertar Médicos</button>
<table border="2" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Especialidad</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th style="width: 170px;">Operaciones</th>
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
                <td style="display: flex; justify-content: space-evenly; width: 170px; border: 1px solid #909090;">
                    <button class="editarbtn" onclick="editarMedico(<?php echo $row['id']; ?>)">Editar</button>
                    <button class="eliminarbtn" onclick="confirmarEliminacionMedico(<?php echo $row['id']; ?>)">Eliminar</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>

</table>
