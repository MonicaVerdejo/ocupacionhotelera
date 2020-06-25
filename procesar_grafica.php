<?php
include_once('db.php');

$db = new DB();


if (isset($_POST['year'])) {
  $año = $_POST['year'];
} else {
  $año = 2018;
}



$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=1 AND YEAR(fecha_inicio)='$año'");
$sentencia->execute();
$enero = $sentencia->fetch(PDO::FETCH_ASSOC);


$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=2 AND YEAR(fecha_inicio)='$año'");
$sentencia->execute();
$febrero = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=3 AND YEAR(fecha_inicio)='$año'");
$sentencia->execute();
$marzo = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=4 AND YEAR(fecha_inicio)='$año'");
$sentencia->execute();
$abril = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=5 AND YEAR(fecha_inicio)='$año'");
$sentencia->execute();
$mayo = $sentencia->fetch(PDO::FETCH_ASSOC);



$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=6 AND YEAR(fecha_inicio)='$año'");
$sentencia->execute();
$junio = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=7 AND YEAR(fecha_inicio)='$año'");
$sentencia->execute();
$julio = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=8 AND YEAR(fecha_inicio)='$año'");
$sentencia->execute();
$agosto = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=9 AND YEAR(fecha_inicio)='$año'");
$sentencia->execute();
$septiembre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=10 AND YEAR(fecha_inicio)='$año'");
$sentencia->execute();
$octubre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=11 AND YEAR(fecha_inicio)='$año'");
$sentencia->execute();
$noviembre = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE MONTH(fecha_inicio)=12 AND YEAR(fecha_inicio)='$año'");
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


$consulta = $db->connect()->prepare("SELECT SUM(habitaciones_ocupadas * costo_hotel)  AS r FROM registro WHERE  YEAR(fecha_inicio)='$año'");
$consulta->execute();
$row = $consulta->fetch(PDO::FETCH_NUM);
$ingresos = $row[0];

$consulta2 = $db->connect()->prepare("SELECT SUM(personas_nacionales + personas_extranjeras)  AS r FROM registro WHERE  YEAR(fecha_inicio)='$año'");
$consulta2->execute();
$row2 = $consulta2->fetch(PDO::FETCH_NUM);
$turismo = $row2[0];


$consulta3 = $db->connect()->prepare("SELECT hotel, Max(personas_nacionales + personas_extranjeras) AS r FROM registro WHERE YEAR(fecha_inicio)='$año'");
$consulta3->execute();
$row3 = $consulta3->fetch(PDO::FETCH_NUM);
$hotel = $row3[0];
require_once 'admin_graficas.php';
