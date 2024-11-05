$(document).ready(function() {
    $('.evento-link').click(function(e) {
      e.preventDefault(); // Prevenir el comportamiento por defecto del enlace
  
      var idEvento = $(this).data('id');
  
      $.ajax({
        type: 'POST', // Método de la solicitud
        url: './sistema/funciones/informacionEventos.php', // URL del archivo PHP
        data: { id: idEvento }, // Datos a enviar (en este caso, el id del evento)
        dataType: 'json', // Tipo de datos que se espera recibir
        success: function(response) {
          // Mostrar los detalles del evento en el modal
          $('#detalle-evento').html('<h2>' + response.titulo + '</h2>' +
                                    '<p><strong>Descripción:</strong> ' + response.descripcion + '</p>' +
                                    '<p><strong>Fecha:</strong> ' + response.fecha + '</p>' +
                                    '<p><strong>Hora:</strong> ' + response.hora + '</p>' +
                                    '<p><strong>Duración:</strong> ' + response.duracion + '</p>' +
                                    '<p><strong>Idioma:</strong> ' + response.idioma + '</p>' +
                                    '<p><strong>ID del Disertante:</strong> ' + response.disertante_id + '</p>'+
                                    '<p><strong>nombre:</strong> ' + response.nombre + '</p>'+
                                    '<p><strong>apellidos:</strong> ' + response.apellidos + '</p>'+
                                    '<p><strong>Duración:</strong> ' + response.horarios + '</p>');
  
          // Usar la nueva API de Bootstrap 5 para mostrar el modal
          var myModal = new bootstrap.Modal(document.getElementById('evento-detalles'));
          myModal.show();
        },
        error: function() {
          alert('Error al cargar los detalles del evento.');
        }
      });
    });
  
    // Botón para cerrar el detalle del evento y mostrar las otras secciones
    $('#cerrar-detalle').click(function() {
      var myModal = bootstrap.Modal.getInstance(document.getElementById('evento-detalles'));
      myModal.hide();
    });
  });
  