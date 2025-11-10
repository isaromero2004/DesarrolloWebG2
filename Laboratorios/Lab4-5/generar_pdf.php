<?php
require('fpdf186/fpdf.php');
include("conexion.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT c.id, p.nombre AS paciente, m.nombre AS medico, c.fecha_cita AS fecha, c.hora_cita AS hora
            FROM citas c
            JOIN pacientes p ON c.id_paciente = p.id
            JOIN medicos m ON c.id_medico = m.id
            WHERE c.id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->Cell(0, 10, 'Cita Medica', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'ID Cita: ' . $fila['id'], 0, 1);
        $pdf->Cell(0, 10, 'Paciente: ' . $fila['paciente'], 0, 1);
        $pdf->Cell(0, 10, 'Medico: ' . $fila['medico'], 0, 1);
        $pdf->Cell(0, 10, 'Fecha: ' . $fila['fecha'], 0, 1);
        $pdf->Cell(0, 10, 'Hora: ' . $fila['hora'], 0, 1);

        $pdf->Output('D', 'Cita_' . $fila['id'] . '.pdf'); // descarga directa
    } else {
        echo "No se encontró la cita.";
    }
} else {
    echo "ID no proporcionado.";
}
?>
