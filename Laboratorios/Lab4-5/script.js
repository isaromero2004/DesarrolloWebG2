function cargarContenido(abrir) {
  var contenedor;
  contenedor = document.getElementById("contenido");
  fetch(abrir)
    .then((response) => response.text())
    .then((data) => (contenedor.innerHTML = data));
}
//Pacientes
function confirmarEliminacionPaciente(idPaciente) {
    mostrarModal("¿Está seguro de eliminar este paciente?");
    document.getElementById("confirmarBtn").onclick = function() {
        eliminarPaciente(idPaciente);
        cerrarModal();
    }
}
function eliminarPaciente(idPaciente) {

    fetch("eliminar_paciente.php?id=" + idPaciente)
      .then((response) => response.text())
      .then((data) => {
        mostrarModalConfirmacion(data);
        cargarContenido("listar_pacientes.php");
      });
    
}
function confirmarInsertarPaciente(url) {
    mostrarModal("¿Está seguro de insertar este paciente?");
    document.getElementById("confirmarBtn").onclick = function() {
        insertar_p(url);
        cerrarModal();
    }
}
function insertar_p(url) {
  const datos = new FormData(document.querySelector("form"));
  fetch(url, { method: "POST", body: datos })
    .then(response => response.text())
    .then(data => {
      mostrarModalConfirmacion(data);
      cargarContenido("listar_pacientes.php");
    });
}
//Medicos
function confirmarInsertarMedico(url) {
    mostrarModal("¿Está seguro de insertar este médico?");
    document.getElementById("confirmarBtn").onclick = function() {
        insertar_m(url);
        cerrarModal();
    }
}
function insertar_m(url) {
  const datos = new FormData(document.querySelector("form"));
  fetch(url, { method: "POST", body: datos })
    .then(response => response.text())
    .then(data => {
      mostrarModalConfirmacion(data);
      cargarContenido("listar_medicos.php");
    });
}
function confirmarEliminacionMedico(idMedico) {
    mostrarModal("¿Está seguro de eliminar este médico?");  
    document.getElementById("confirmarBtn").onclick = function() {
        eliminarMedico(idMedico);
        cerrarModal();
    }
}
function eliminarMedico(idMedico) {
    fetch("eliminar_medico.php?id=" + idMedico)
      .then((response) => response.text())
      .then((data) => {
        mostrarModalConfirmacion(data);
        cargarContenido("listar_medicos.php");
      });
      cerrarModal();
    
}
//Citas
function confirmarEliminacionCita(idCita) {
    mostrarModal("¿Está seguro de eliminar esta cita?");
    document.getElementById("confirmarBtn").onclick = function() {
        eliminarCita(idCita);
        cerrarModal();
    }
}
function eliminarCita(idCita) {
    fetch("eliminar_cita.php?id=" + idCita)
      .then((response) => response.text())
      .then((data) => {
        mostrarModalConfirmacion(data);
        cargarContenido("listar_citas.php");
      });
}

function confirmarInsertarCita(url) {
    mostrarModal("¿Está seguro de insertar esta cita?");
    document.getElementById("confirmarBtn").onclick = function() {
      //verificar si el medico ya tiene una cita a la misma hora
      fetch("verificar_cita.php", {
        method: "POST",
        body: new FormData(document.querySelector("form"))
      })
      .then(response => response.text())
      .then(data => {
        if (data === "conflict") {
          mostrarModalConfirmacion("El médico ya tiene una cita a la misma hora.");
          cargarContenido("registrar_cita.php");
          cerrarModal();
        } else {
          insertar_c(url);
          cerrarModal();
        }
      });
    }
}
function insertar_c(url) {
  const datos = new FormData(document.querySelector("form"));
  fetch(url, { method: "POST", body: datos })
    .then(response => response.text())
    .then(data => {
      mostrarModalConfirmacion(data);
      cargarContenido("listar_citas.php");
    });
}
function editarCita(id){
  const  datos=new FormData();
  datos.append('id', id);
  fetch("formeditar_cita.php", { method: "POST", body: datos })
    .then(response => response.text())
    .then(data => {
      document.getElementById("contenido").innerHTML = data;
    });
}
//Filtros:
function filtrarCitasPorEstado() {
  const estado = document.getElementById("filtroEstado").value;
  cargarContenido("listar_citas_pestado.php?estado=" + estado);
}

function filtrarCitasPorMedico() {
  const medico = document.getElementById("filtroMedico").value;
  cargarContenido("listar_citas_pmedico.php?medico=" + medico);
}

function filtrarCitasPorPaciente() {
  const paciente = document.getElementById("filtroPaciente").value;
  cargarContenido("listar_citas_ppaciente.php?paciente=" + paciente);
}

function mostrarModal(mensaje) {
  document.getElementById("modalTexto").innerText = mensaje;
  const modal = new bootstrap.Modal(document.getElementById("modalMensaje"));
  modal.show();
}
function mostrarModalConfirmacion(mensaje) {
  document.getElementById("modalConfirmacion").innerText = mensaje;
  const modal = new bootstrap.Modal(document.getElementById("modalMensajeConfirmacion"));
  modal.show();
  setTimeout(()=>{
    cerrarModalConfirmacion();
  }, 1000)
}

function cerrarModal() {
  const modalElement = document.getElementById("modalMensaje");
  const modal = bootstrap.Modal.getInstance(modalElement);
  if (modal) {
    modal.hide();
  }
}

function cerrarModalConfirmacion() {
  const modalElement = document.getElementById("modalMensajeConfirmacion");
  const modal = bootstrap.Modal.getInstance(modalElement);
  if (modal) {
    modal.hide();
  }
}

function editarMedico(id){
  const  datos=new FormData();
  datos.append('id', id);
fetch("formeditar_m.php",{method: "POST", body: datos})
.then(response => response.text())
.then(data => {
    document.getElementById("contenido").innerHTML = data;
});
}
function editarPaciente(id){
  const  datos=new FormData();
  datos.append('id', id);
fetch("formeditar_p.php",{method: "POST", body: datos})
.then(response => response.text())
.then(data => {
    document.getElementById("contenido").innerHTML = data;
});
}
/* function editar(url) {
  const datos = new FormData(document.getElementById("formularioEditar"));
  fetch(url, { method: "POST", body: datos })
    .then(response => response.text())
    .then(data => {
      mostrarModalConfirmacion(data);
      setTimeout(()=>{
            cargarContenido(
              url == "editar_m.php" ? "listar_medicos.php" : "listar_pacientes.php"
            );
        },1000);
    });
} */
function editar(url) {
  const datos = new FormData(document.getElementById("formularioEditar"));
  
  fetch(url, { method: "POST", body: datos })
    .then(response => response.text())
    .then(data => {
      mostrarModalConfirmacion(data);

      setTimeout(() => {
        let destino = ""; // variable para almacenar la página a cargar

        switch (url) {
          case "editar_m.php":
            destino = "listar_medicos.php";
            break;
          case "editar_p.php":
            destino = "listar_pacientes.php";
            break;
          default:
            destino = "listar_citas.php";
        }

        if (destino !== "") {
          cargarContenido(destino);
        }
      }, 1000);
    });
}

function descargarPDF(idCita) {
    window.location.href = "generar_pdf.php?id=" + idCita;
}




