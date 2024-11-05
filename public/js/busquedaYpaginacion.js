$(document).ready(function() {
    // Cargar datos iniciales
    cargarDatos();

    // Búsqueda dinámica
    $('#searchInput').on('input', function() {
        const query = $(this).val();
        cargarDatos(1, { search: query });
    });

    // Función para cargar datos
    function cargarDatos(page = 1, filtros = {}) {
        $.ajax({
            url: './funciones/invocarPersona.php',
            method: 'GET',
            data: {
                page: page,
                ...filtros
            },
            success: function(response) {
                $('#listado tbody').html(response);
                actualizarControlesDePaginacion(page);
            }
        });
    }

    // Función para actualizar la paginación
    function actualizarControlesDePaginacion(page) {
        $('#previousPage').attr('onclick', `cambiarPagina(${page - 1})`);
        $('#nextPage').attr('onclick', `cambiarPagina(${page + 1})`);
    }

    // Función para cambiar de página
    window.cambiarPagina = function(page) {
        const query = $('#searchInput').val();
        cargarDatos(page, { search: query });
    }
});
