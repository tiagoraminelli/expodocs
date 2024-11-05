function nuevaPersona() {
    // Limpiamos el contenedor de mensajes previos
    $('#mensaje').html('');

    // Ocultar el contenedor del listado
    $('#listado').hide();

    // Ocultar el btn del listado
    $('#eliminarMultiple').hide();

    // Ocultar el btn del listado
    $('#nuevoPersona').hide();

    // Cargamos el formulario vacío en el contenedor 'formulario'
    $('#formulario').load('./html/persona.html', function() {
        // Limpiamos los campos para asegurarnos de que no hay ID
        $('#inputId').val('');
        $('#inputNombre').val('');
        $('#inputApellidos').val('');
        $('#inputTelefono').val('');
        $('#inputEmail').val('');
    });
}
