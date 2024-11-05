// Función para cargar la tabla de personas
function cargarTablaPersonas() {
    $.ajax({
        url: './funciones/invocarPersona.php',
        type: 'GET',
        success: function(data) {
            $('#tabla tbody').html(data); // Cargar el contenido en el tbody de la tabla
        },
        error: function() {
            $('#mensaje').html('<div class="alert alert-danger" role="alert">Error al cargar los datos</div>');
        }
    });
}

// Función para eliminar una persona
function eliminarPersona(id) {
    // Crear objeto con el ID de la persona a eliminar
    let parametros = { "inputIdPersona": id };

    if (confirm("¿Estás seguro de eliminar esta persona?")) {
        $.post('./funciones/EliminarPersona.php', parametros, function(arregloResultado) {
            if (arregloResultado.success) {
                $('#mensaje').html('<div class="alert alert-success" role="alert">¡Persona eliminada exitosamente!</div>');

                // Hacer que el mensaje desaparezca después de 5 segundos
                setTimeout(function() {
                    $('#mensaje').html(''); // Limpiar el mensaje
                }, 5000);

                cargarTablaPersonas(); // Recargar la tabla de personas
            } else {
                $('#mensaje').html('<div class="alert alert-danger" role="alert">Error al eliminar persona</div>');

                // Hacer que el mensaje desaparezca después de 5 segundos
                setTimeout(function() {
                    $('#mensaje').html(''); // Limpiar el mensaje
                }, 5000);
            }
        }, "json").fail(function() {
            $('#mensaje').html('<div class="alert alert-danger" role="alert">Error en la conexión al servidor</div>');

            // Hacer que el mensaje desaparezca después de 5 segundos
            setTimeout(function() {
                $('#mensaje').html(''); // Limpiar el mensaje
            }, 5000);
        });
    } else {
        $('#mensaje').html('<div class="alert alert-warning" role="alert">Se ha cancelado la operación</div>');

        // Hacer que el mensaje desaparezca después de 5 segundos
        setTimeout(function() {
            $('#mensaje').html(''); // Limpiar el mensaje
        }, 5000);
    }
}

// Llamada inicial para cargar la tabla cuando se carga el documento
$(document).ready(function() {
    cargarTablaPersonas();
});
