<?php

include 'mainconn.php';

$Mysql = new MysqlConn;

$CURP = $_POST['CURP'];
$Nombre = $_POST['Nombre'];
$Apellidos = $_POST['Apellidos'];
$Email = $_POST['Email'];
$Telefono = $_POST['Telefono'];
$Direccion = $_POST['Direccion'];
$Pass = $_POST['Pass'];

printf($Mysql->RegisterUser($CURP,$Nombre, $Apellidos, $Email,$Telefono,$Direccion,$Pass));

 ?>
