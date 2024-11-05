$(document).ready(function() {
    // Cuando se hace clic en el checkbox "inputIdAll"
    $('#inputIdAll').on('change', function() {
        // Verificar si el checkbox está marcado
        var isChecked = $(this).is(':checked');
        
        // Iterar sobre cada checkbox de la lista
        $('input[name="inputIdBox"]').each(function() {
            // Marcar o desmarcar todos los checkboxes según el estado del "inputIdAll"
            $(this).prop('checked', isChecked);
        });
    });
});
// Función para obtener los IDs de las personas seleccionadas
function obtenerIdsSeleccionados() {
    let idsSeleccionados = [];
    
    // Recorre todos los checkboxes que están marcados
    $('input[name="inputIdBox"]:checked').each(function() {
        // Obtiene el ID asociado al checkbox y lo agrega al array
        let id = $(this).closest('tr').find('td:nth-child(3)').text();
        idsSeleccionados.push(id);
    });

    return idsSeleccionados;
}

// Evento al hacer clic en el botón de "Eliminación Múltiple"
$('#eliminarMultiple').click(function() {
    let ids = obtenerIdsSeleccionados();

    if (ids.length > 0) {
        if (confirm('¿Estás seguro de eliminar las personas seleccionadas?')) {
            // Enviar los IDs seleccionados por AJAX para la eliminación
            $.ajax({
                url: './funciones/EliminarPersona.php', // El archivo PHP que manejará la eliminación
                type: 'POST',
                data: { ids: ids }, // Enviar los IDs como un array
                success: function(response) {
                    // Mostrar un mensaje de éxito o error
                    $('#mensaje').html('<div class="alert alert-success">Personas eliminadas exitosamente</div>');
                    // Hacer que el mensaje desaparezca después de 5 segundos
                    setTimeout(function() {
                    $('#mensaje').html(''); // Limpiar el mensaje
                    }, 5000);
                    cargarTablaPersonas(); // Recargar la tabla después de la eliminación
                },
                error: function() {
                    $('#mensaje').html('<div class="alert alert-danger">Error al eliminar personas</div>');
                }
            });
        }
    } else {
        alert('No has seleccionado ninguna persona.');
    }
});

