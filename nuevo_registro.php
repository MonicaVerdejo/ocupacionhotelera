<?php 
include_once 'db.php';


$db = new DB();
if (isset($_POST['hotel'])){
    $usuario=$_POST['hotel'];
    $inicioFecha=$_POST['inicioFecha'];
    $finFecha=$_POST['finFecha'];
    $habOcupadas=$_POST['habOcupadas'];
    $persExtranjeras=$_POST['persExtranjeras'];
    $persNacion=$_POST['persNacion'];
    $diasVacaciones=$_POST['diasVacaciones'];
    $numHabitaciones=$_POST['numHabitaciones'];
    $costoHotel=$_POST['costoHotel'];
   

    $sentencia = $db->connect()->prepare("INSERT INTO registro (hotel,fecha_inicio,fecha_fin,habitaciones_ocupadas,personas_extranjeras,
    personas_nacionales,dias_vacaciones,num_habitaciones,costo_hotel) VALUES('$usuario', '$inicioFecha', '$finFecha' ,'$habOcupadas',
    '$persExtranjeras','$persNacion', '$diasVacaciones', '$numHabitaciones', '$costoHotel')");

    if($sentencia->execute()){
        $registro = "correcto";
        echo json_encode(array("estado" => $registro));
    }
  
    header('Location: hotel_principal.php');
} else {
    echo 'no esta imprimiendo';
  
}
require_once('hotel_principal.php');
?>