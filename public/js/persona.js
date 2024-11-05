$(document).ready(function() {
    // Función para cargar la tabla de personas
    function cargarTablaPersonas() {
        $.ajax({
            url: './funciones/invocarPersona.php',
            type: 'GET',
            success: function(data) {
                $('#tabla tbody').html(data); // Cargar el contenido en el tbody de la tabla
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#mensaje').html('<div class="alert alert-danger" role="alert">Error al cargar los datos: ' + textStatus + ' - ' + errorThrown + '</div>');
            }
        });
    }
    

    // Llamada inicial para cargar la tabla
    cargarTablaPersonas();

    // Puedes invocar cargarTablaPersonas() cada vez que sea necesario, por ejemplo, después de eliminar o editar una persona
});
