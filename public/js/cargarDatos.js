function cargarDatos() {
    var id = $('#inputId').val();
    var nombre = $('#inputNombre').val();
    var apellidos = $('#inputApellidos').val();
    var telefono = $('#inputTelefono').val();
    var email = $('#inputEmail').val();

    var param = {
        "nombre": nombre,
        "apellidos": apellidos,
        "telefono": telefono,
        "email": email
    };

    if (id) {
        param["id"] = id;
    }

    var url = './funciones/actualizarPersona.php';

    $.post(url, param, function(response) {
        // Mostrar mensaje de éxito o error
        var mensajeDiv = $('#mensaje');
        if (response.success) {
            mensajeDiv.html('<div class="alert alert-success" role="alert">' + response.mensaje + '</div>');
            // Redirigir después de guardar
            window.location.href = '../../index.php';
        } else {
            mensajeDiv.html('<div class="alert alert-danger" role="alert">' + response.mensaje + '</div>');
        }

        // Limpiar el mensaje después de 5 segundos
        setTimeout(function() {
            mensajeDiv.html('');
        }, 5000);
    }, "json").fail(function() {
        // Manejo de error en la conexión
        $('#mensaje').html('<div class="alert alert-danger" role="alert">Error en la conexión al servidor</div>');
    });
}
