$(function () {


    $('#fecha_inicio').on('change', function () {
        var desde = $('#fecha_inicio').val();
        var hasta = $('#fecha_final').val();
        url='buscar_id.php';
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'html',
            data: 'desde=' + desde + '&hasta=' + hasta,
            success: function (datos) {
                $('#datos').html(datos);
            }
        });
        return false;
    });

    $('#fecha_final').on('change', function () {
        var desde = $('#fecha_inicio').val();
        var hasta = $('#fecha_final').val();
        url='buscar_id.php';
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'html',
            data: 'desde=' + desde + '&hasta=' + hasta,
            success: function (datos) {
                $('#datos').html(datos);
            }
        });
        return false;
    });



});



