$(buscarRegistroMensual());

function buscarRegistroMensual(consulta) {
    $.ajax({
        url: 'buscar_registro_mensual.php',
        type: 'POST',
        dataType: 'html',
        data: { consulta: consulta },
    })
        .done(function (respuesta) {
            $("#datos").html(respuesta);
        })
        .fail(function () {
            console.log("error");
        })
}

$(document).on('keyup', '#caja_busqueda', function(){
var valor = $(this).val();
if (valor != "") {
    buscarRegistroMensual(valor);
} else {
    buscarRegistroMensual();
}
});