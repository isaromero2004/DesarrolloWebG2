<?php
include("conexion.php");
$sql = "SELECT * FROM citas";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}
$sql2 = "SELECT * FROM pacientes";
$result2 = mysqli_query($con, $sql2);
if (!$result2) {
    die("Error en la consulta: " . mysqli_error($con));
}
$sql3 = "SELECT * FROM medicos";
$result3 = mysqli_query($con, $sql3);
if (!$result3) {
    die("Error en la consulta: " . mysqli_error($con));
}
?>
<h1 class="bg-light text-dark m-0 p-3">Listar Citas Médicas</h1>
<div class="container-fluid px-3 py-2">
    <div class="row g-2 mb-3">
        <div class="col-md-3">
            <label for="filtroEstado" class="form-label fw-bold">Filtrar por Estado:</label>
            <select id="filtroEstado" class="form-select" onchange="javascript:filtrarCitasPorEstado()">
                <option value="todos">Todos</option>
                <option value="pendiente">Pendiente</option>
                <option value="confirmada">Confirmada</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="filtroMedico" class="form-label fw-bold">Filtrar por Médico:</label>
            <select id="filtroMedico" class="form-select" onchange="javascript:filtrarCitasPorMedico()">
                <option value="todos">Todos</option>
                <?php while ($row3 = mysqli_fetch_assoc($result3)) : ?>
                    <option value="<?php echo $row3['id']; ?>"><?php echo $row3['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="filtroPaciente" class="form-label fw-bold">Filtrar por Paciente:</label>
            <select id="filtroPaciente" class="form-select" onchange="javascript:filtrarCitasPorPaciente()">
                <option value="todos">Todos</option>
                <?php while ($row2 = mysqli_fetch_assoc($result2)) : ?>
                    <option value="<?php echo $row2['id']; ?>"><?php echo $row2['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-secondary w-100" onclick="cargarContenido('listar_citas.php')">Todas las Citas</button>
        </div>
    </div>
    <div class="text-end mb-3">

        <button class="btn btn-success px-4" onclick="cargarContenido('registrar_cita.php')">Registrar Cita</button>
    </div>
</div>

<div class="table-responsive px-3">
    <table class="table table-bordered bg-white">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Estado</th>
                <th>Motivo</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fecha_cita']; ?></td>
                    <td><?php echo $row['hora_cita']; ?></td>
                    <td>
                        <?php
                        // Obtener el nombre del paciente
                        $paciente_id = $row['id_paciente'];
                        $sql_paciente = "SELECT nombre FROM pacientes WHERE id = $paciente_id";
                        $result_paciente = mysqli_query($con, $sql_paciente);
                        $nombre_paciente = mysqli_fetch_assoc($result_paciente)['nombre'];
                        echo $nombre_paciente;
                        ?>
                    </td>
                    <td>
                        <?php
                        // Obtener el nombre del médico
                        $medico_id = $row['id_medico'];
                        $sql_medico = "SELECT nombre FROM medicos WHERE id = $medico_id";
                        $result_medico = mysqli_query($con, $sql_medico);
                        $nombre_medico = mysqli_fetch_assoc($result_medico)['nombre'];
                        echo $nombre_medico;
                        ?>
                    </td>
                    <td>
                        <?php
                        // Obtener el estado de la cita
                        $estado_cita = $row['estado'];
                        echo $estado_cita;
                        ?>
                    </td>
                    <td><?php echo $row['motivo']; ?></td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            <button class="btn btn-primary btn-sm" onclick="editarCita(<?php echo $row['id']; ?>)">Editar</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmarEliminacionCita(<?php echo $row['id']; ?>)">Eliminar</button>
                            <button class="btn btn-secondary btn-sm" onclick='descargarPDF(<?php echo $row['id']; ?>)'>Descargar PDF</button>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>