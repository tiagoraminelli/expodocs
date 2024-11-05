function SeleccionarPersona(id){
    let datosPersona;
    $.ajaxSetup({async:false});
    $.post('./funciones/obtenerPersona.php', {'inputIdPersona': id}, function(datosObtenidos){
        datosPersona = datosObtenidos['datos'];
    }, 'json');
    return datosPersona;

}