$(document).ready(function() {
    $('#searchInput').on('keyup', function() {
        const searchTerm = $(this).val();

        $.ajax({
            url: './funciones/buscarPersona.php', // Ruta al archivo PHP que procesará la búsqueda
            method: 'GET',
            data: { q: searchTerm }, // Enviar el término de búsqueda
            dataType: 'json', // Asegúrate de esperar una respuesta JSON
            success: function(data) {
                const tbody = $('#tabla tbody'); // Cambiar al ID de tu tabla
                tbody.empty();
                console.log(data); // Agrega esto para verificar la respuesta

                if (data.length === 0) {
                    tbody.append('<tr><td colspan="7" class="text-center">No hay resultados.</td></tr>');
                } else {
                    let numeral = 1; // Contador para los números de fila
                    data.forEach(lista => {
                        tbody.append(`
                            <tr class="user-row">
                                <th scope="row"><input type="checkbox" name="inputIdBox" id="inputIdBox"></th>
                                <td>${numeral++}</td>
                                <td>${lista.id}</td>
                                <td>${lista.nombre} ${lista.apellidos}</td>
                                <td>${lista.telefono}</td>
                                <td>${lista.email}</td>
                                <td class="d-flex gap-2">
                                    <button onclick="eliminarPersona(${lista.id})" class="btn btn-danger btn-sm">Borrar</button>
                                    <button onclick="editarPersona(${lista.id})" class="btn btn-warning btn-sm">Editar</button>
                                    <button onclick="verPersona(${lista.id})" class="btn btn-info btn-sm">Ver</button>
                                </td>
                            </tr>
                        `);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                const tbody = $('#tabla tbody');
                tbody.empty();
                tbody.append('<tr><td colspan="7" class="text-center">Error al realizar la búsqueda.</td></tr>');
            }
        });
    });
});
