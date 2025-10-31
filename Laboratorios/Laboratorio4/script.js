function cargarContenido(abrir) {
  var contenedor;
  contenedor = document.getElementById("contenido");
  fetch(abrir)
    .then((response) => response.text())
    .then((data) => (contenedor.innerHTML = data));
}
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
function eliminarMedico(idMedico) {
    fetch("eliminar_medico.php?id=" + idMedico)
      .then((response) => response.text())
      .then((data) => {
        mostrarModalConfirmacion(data);
        cargarContenido("listar_medicos.php");
      });
      cerrarModal();
    
}
function editarMedico(idMedico) {
    fetch("editar_m.php?id=" + idMedico)
      .then((response) => response.text())
      .then((data) => {
        mostrarModalConfirmacion(data);
        cargarContenido("editar_m.php");
      });
      cerrarModal();
    
}
function confirmarEliminacionMedico(idMedico) {
    mostrarModal("¿Está seguro de eliminar este médico?");  
    document.getElementById("confirmarBtn").onclick = function() {
        eliminarMedico(idMedico);
        cerrarModal();
    }
}

function mostrarModal(mensaje) {
  document.getElementById("modalTexto").innerText = mensaje;
  document.getElementById("modalMensaje").style.display = "block";
}
function mostrarModalConfirmacion(mensaje) {
  document.getElementById("modalConfirmacion").innerText = mensaje;
  document.getElementById("modalMensajeConfirmacion").style.display = "block";
          setTimeout(()=>{
            cerrarModalConfirmacion();
        },1000)

}

function cerrarModal() {
    document.getElementById("modalMensaje").style.display = "none";
}

function cerrarModalConfirmacion() {
    document.getElementById("modalMensajeConfirmacion").style.display = "none";
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
function editar(url) {
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
}


window.onclick = function(event) {
    var modal = document.getElementById("modalMensaje");
    if (event.target == modal) {
        modal.style.display = "none";
    }
};



