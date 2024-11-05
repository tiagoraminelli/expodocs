// public/js/funciones.js

function editarPersona(id) {
    // Crear objeto con el ID de la persona a editar
    let persona = SeleccionarPersona(id);
    let url = "./html/persona.html";
    $.get(url,function(data){
          $("#listado").html(data);
          $('#inputId').val(persona.id);
          $('#inputNombre').val(persona.nombre);
          $('#inputApellidos').val(persona.apellidos);
          $('#inputTelefono').val(persona.telefono);
          $('#inputEmail').val(persona.email);
})
} 
