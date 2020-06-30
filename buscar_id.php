<?php
include_once('db.php');

$db = new DB();

 
if (!empty($_POST['hotel'])) {
  $hotel = $_POST['hotel'];
  $año = 2019;
} else {
  include_once 'admin_hotel.php';
  $año = $_POST['year'];
  $hotel = $_SESSION['hotel'];
  //echo $hotel;
}


//asociar el hotel con la id para hacer consultas mas sencillas


$sentencia = $db->connect()->prepare("SELECT * from usuario where usuario =:usuario");
$sentencia->bindParam(':usuario', $hotel);
$sentencia->execute();
$row = $sentencia->fetch(PDO::FETCH_ASSOC);
$correo = $row['correo'] ?? 'Correo';



///////////////////////////////DATOS A BUSCAR EN SECCION INICIAL DEL AÑO //////////////////////////////////
$consulta = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS ingresos FROM registro WHERE  YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
// $consulta->bindParam(':usuario', $hotel);
$consulta->execute();
$row = $consulta->fetch(PDO::FETCH_ASSOC);
$ingresos = $row['ingresos'] ?? 'Ingresos';



$consulta2 = $db->connect()->prepare("SELECT SUM(personas_nacionales + personas_extranjeras)  AS turismo FROM registro WHERE  YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$consulta2->execute();
$row2 = $consulta2->fetch(PDO::FETCH_ASSOC);
$turismo = $row2['turismo'] ?? 'Turistas';

//consulta general
$stmt = $db->connect()->prepare("SELECT habitaciones_ocupadas,dias_vacaciones,num_habitaciones FROM registro where hotel ='$hotel'");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$porcentaje = round((($row['habitaciones_ocupadas'] / $row['dias_vacaciones'] / $row['num_habitaciones']) * 100), 3);


///////////////////////////////FOTO DE PERFIL DE CADA HOTEL //////////////////////////////////
$FOTO = $db->connect()->prepare("SELECT imagen_profile  AS foto FROM usuario WHERE  usuario ='$hotel'");
$FOTO->execute();
$row4 = $FOTO->fetch(PDO::FETCH_ASSOC);
$imgPerfil = $row4['foto'] ?? 'Foto';



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////GRAFICA DE DERRAMA////////////////////////////////////////////////// 
$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=1 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$enero = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=2 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$febrero = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=3 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$marzo = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=4 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$abril = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=5 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$mayo = $sentencia->fetch(PDO::FETCH_ASSOC);


$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=6 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$junio = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=7 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$julio = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=8 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$agosto = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=9 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$septiembre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=10 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$octubre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=11 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$noviembre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=12 AND YEAR(fecha_inicio)='$año'  AND hotel ='$hotel'");
$sentencia->execute();
$diciembre = $sentencia->fetch(PDO::FETCH_ASSOC);


$data = array(
  0 => round($enero['r'], 1),
  1 => round($febrero['r'], 1),
  2 => round($marzo['r'], 1),
  3 => round($abril['r'], 1),
  4 => round($mayo['r'], 1),
  5 => round($junio['r'], 1),
  6 => round($julio['r'], 1),
  7 => round($agosto['r'], 1),
  8 => round($septiembre['r'], 1),
  9 => round($octubre['r'], 1),
  10 => round($noviembre['r'], 1),
  11 => round($diciembre['r'], 1)
);
$e = $data[0];
$f = $data[1];
$m = $data[2];
$a = $data[3];
$ma = $data[4];
$j = $data[5];
$jl = $data[6];
$ag = $data[7];
$s = $data[8];
$o = $data[9];
$n = $data[10];
$d = $data[11];





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////GRAFICA DE VISITAS PARTE UNO////////////////////////////////////////////////// 
$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=1 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$enero = $sentencia->fetch(PDO::FETCH_ASSOC);


$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=2 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$febrero = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=3 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$marzo = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=4 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$abril = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=5 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$mayo = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=6 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$junio = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=7 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$julio = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=8 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$agosto = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=9 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$septiembre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=10 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$octubre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=11 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$noviembre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_nacionales)  AS r FROM registro WHERE MONTH(fecha_inicio)=12 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$diciembre = $sentencia->fetch(PDO::FETCH_ASSOC);


$data = array(
  0 => round($enero['r'], 1),
  1 => round($febrero['r'], 1),
  2 => round($marzo['r'], 1),
  3 => round($abril['r'], 1),
  4 => round($mayo['r'], 1),
  5 => round($junio['r'], 1),
  6 => round($julio['r'], 1),
  7 => round($agosto['r'], 1),
  8 => round($septiembre['r'], 1),
  9 => round($octubre['r'], 1),
  10 => round($noviembre['r'], 1),
  11 => round($diciembre['r'], 1)
);

$e1 = $data[0];
$f1 = $data[1];
$m1 = $data[2];
$a1 = $data[3];
$ma1 = $data[4];
$j1 = $data[5];
$jl1 = $data[6];
$ag1 = $data[7];
$s1 = $data[8];
$o1 = $data[9];
$n1 = $data[10];
$d1 = $data[11];





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////GRAFICA DE VISITAS PARTE DOS////////////////////////////////////////////////// 
$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=1 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$enero = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=2 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$febrero = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=3 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$marzo = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=4 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$abril = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=5 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$mayo = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=6 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$junio = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=7 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$julio = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=8 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$agosto = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=9 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$septiembre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=10 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$octubre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=11 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$noviembre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(personas_extranjeras)  AS r FROM registro WHERE MONTH(fecha_inicio)=12 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$diciembre = $sentencia->fetch(PDO::FETCH_ASSOC);


$data = array(
  0 => round($enero['r'], 1),
  1 => round($febrero['r'], 1),
  2 => round($marzo['r'], 1),
  3 => round($abril['r'], 1),
  4 => round($mayo['r'], 1),
  5 => round($junio['r'], 1),
  6 => round($julio['r'], 1),
  7 => round($agosto['r'], 1),
  8 => round($septiembre['r'], 1),
  9 => round($octubre['r'], 1),
  10 => round($noviembre['r'], 1),
  11 => round($diciembre['r'], 1)
);

$e2 = $data[0];
$f2 = $data[1];
$m2 = $data[2];
$a2 = $data[3];
$ma2 = $data[4];
$j2 = $data[5];
$jl2 = $data[6];
$ag2 = $data[7];
$s2 = $data[8];
$o2 = $data[9];
$n2 = $data[10];
$d2 = $data[11];




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////GRAFICA DE PORCENTAJE////////////////////////////////////////////////// 

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro` WHERE MONTH(fecha_inicio)=1 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$enero = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=2 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$febrero = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=3 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$marzo = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=4 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$abril = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=5 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$mayo = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=6 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$junio = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=7 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$julio = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=8 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$agosto = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=9 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$septiembre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=10 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$octubre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=11 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$noviembre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT ROUND((habitaciones_ocupadas/dias_vacaciones/num_habitaciones)*100,2) AS r FROM `registro`WHERE MONTH(fecha_inicio)=12 AND YEAR(fecha_inicio)='$año' AND hotel ='$hotel'");
$sentencia->execute();
$diciembre = $sentencia->fetch(PDO::FETCH_ASSOC);


$data = array(
  0 => round($enero['r'], 1),
  1 => round($febrero['r'], 1),
  2 => round($marzo['r'], 1),
  3 => round($abril['r'], 1),
  4 => round($mayo['r'], 1),
  5 => round($junio['r'], 1),
  6 => round($julio['r'], 1),
  7 => round($agosto['r'], 1),
  8 => round($septiembre['r'], 1),
  9 => round($octubre['r'], 1),
  10 => round($noviembre['r'], 1),
  11 => round($diciembre['r'], 1)
);

$e3 = $data[0];
$f3 = $data[1];
$m3 = $data[2];
$a3 = $data[3];
$ma3 = $data[4];
$j3 = $data[5];
$jl3 = $data[6];
$ag3 = $data[7];
$s3 = $data[8];
$o3 = $data[9];
$n3 = $data[10];
$d3 = $data[11];




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////TABLA REGISTROS////////////////////////////////////////////////// 


$salida = "";



$sentencia = $db->connect()->prepare("SELECT hotel, habitaciones_ocupadas,dias_vacaciones,num_habitaciones,costo_hotel,
  personas_nacionales, personas_extranjeras, fecha_inicio,fecha_fin FROM registro WHERE YEAR(fecha_inicio)='$año'  AND hotel ='$hotel' ");

$sentencia->execute();



if ($sentencia->rowCount() > 0) {

  $salida .= "
      
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
          <td>" . round((($row['habitaciones_ocupadas'] / $row['dias_vacaciones'] / $row['num_habitaciones']) * 100), 3) . "</td>
          <td>" . $row['habitaciones_ocupadas'] * $row['costo_hotel'] . "</td>
      </tr>
          ";
  }
  $salida .= "</tbody> 
      <tfoot>
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
      </tfoot>
      <tbody>";
} else {
  $salida .= "No existen coincidencias";
}












require_once 'admin_hotel.php';
