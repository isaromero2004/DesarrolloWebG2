<?php
include('conexion.php');
$sql = "SELECT COUNT(*) FROM citas";
$result = mysqli_query($con, $sql);
$sql2 = "SELECT COUNT(*) FROM medicos";
$result2 = mysqli_query($con, $sql2);
$sql3 = "SELECT COUNT(*) FROM pacientes";
$result3 = mysqli_query($con, $sql3);
$citasCount = mysqli_fetch_array($result)[0];
$medicosCount = mysqli_fetch_array($result2)[0];
$pacientesCount = mysqli_fetch_array($result3)[0];
?>
<h1 class="bg-light text-dark m-0 p-3">Panel Administrativo</h1>
<div class="container-fluid p-3">
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card border shadow-sm">
                <div class="card-body text-center">
                    <h2 class="card-title h5">Total de Citas</h2>
                    <p class="card-text h3 fw-bold"><?php echo $citasCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border shadow-sm">
                <div class="card-body text-center">
                    <h2 class="card-title h5">Total de Médicos</h2>
                    <p class="card-text h3 fw-bold"><?php echo $medicosCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border shadow-sm">
                <div class="card-body text-center">
                    <h2 class="card-title h5">Total de Pacientes</h2>
                    <p class="card-text h3 fw-bold"><?php echo $pacientesCount; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
