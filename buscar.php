<?php
include_once 'db.php';
$db = new DB();

$salida = "";
$sentencia = $db->connect()->prepare("SELECT hotel, habitaciones_ocupadas,dias_vacaciones,num_habitaciones,costo_hotel,
personas_nacionales, personas_extranjeras, fecha_inicio,fecha_fin FROM registro");
$sentencia->execute();


if (!empty($_POST['consulta'])) {

    $q = $_POST['consulta'];

    $sentencia = $db->connect()->prepare("SELECT hotel, habitaciones_ocupadas,dias_vacaciones,num_habitaciones,costo_hotel,
personas_nacionales, personas_extranjeras, fecha_inicio,fecha_fin FROM registro WHERE Hotel LIKE '%" . $q . "%' OR habitaciones_ocupadas LIKE '%" . $q . "%'
OR dias_vacaciones LIKE '%" . $q . "%' OR num_habitaciones LIKE '%" . $q . "%' OR costo_hotel LIKE '%" . $q . "%' ");
    $sentencia->execute();
}


if ($sentencia->rowCount() > 0) {

    $salida .= "<table>
    
    <thead>
    <tr>
    <th>Hotel</th>
    <th>Habitaciones <br> Ocupadas</th>
    <th>Dias vacaciones</th>
    <th>Numero de <br> habitaciones</th>
    <th>Costo del hotel</th>
    <th>Personas <br>Nacionales</th>
    <th>Personas <br>Extranjeras</th>
    <th>Fecha de Inicio</th>
    <th>Fecha de Fin</th>
    <th>%</th>
    <th>Derrama economica</th>
</tr>
    </thead>
    <tbody>";

    while ($row = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        $salida .= "
        <tr>
        <td>" . $row['hotel'] . "</td>
        <td>" . $row['habitaciones_ocupadas'] . "</td>
        <td>" . $row['dias_vacaciones'] . "</td>
        <td>" . $row['num_habitaciones'] . "</td>
        <td>" . $row['costo_hotel'] . "</td>
        <td>" . $row['personas_nacionales'] . "</td>
        <td>" . $row['personas_extranjeras'] . "</td>
        <td>" . $row['fecha_inicio'] . "</td>
        <td>" . $row['fecha_fin'] . "</td>
        <td>" .  round((($row['habitaciones_ocupadas'] / $row['dias_vacaciones'] / $row['num_habitaciones']) * 100), 3) . "</td>
        <td>" . $row['habitaciones_ocupadas'] * $row['costo_hotel'] . "</td>
    </tr>
        ";
    }
    
    $salida .= "</tbody></table>";
} else {
    $salida .= "No existen coincidencias";
}


echo $salida;
