function insertar(){
    var datos=new FormData(document.querySelector('#formulario'));
    fetch("insertar.php",{method: "POST", body: datos})
    .then(Response => Response.text())
    .then(data =>{
        document.querySelector('#resultado').innerHTML = data;
        setTimeout(()=>{
            cargarResultados();
        },2000)
    });
}
function enviarDatos(){
    var datos=new FormData(document.querySelector('#form_insertar'));
    fetch("Fdatos.php",{method: "POST",body:datos})
    .then(Response => Response.text())
    .then(data=>{
        document.querySelector('#resultado').innerHTML = data;
    });
}
function limpiar(){
    document.querySelector('#resultado').innerHTML = "";
}
function cargarResultados(){
    fetch("tabla.php")
    .then(Response => Response.text())
    .then(data =>{
        document.querySelector('#resultado').innerHTML = data;
    });
}
cargarResultados();