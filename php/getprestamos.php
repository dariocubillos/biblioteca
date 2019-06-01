<?php
include 'mainconn.php';

$Mysql = new MysqlConn;
$Mysql->ExecuteQuery("SELECT date , datedelivery, estate,fkbook,fkuser, IDprestamo, (SELECT Name FROM users where users.ID = fkuser) as 'Nombre' , (SELECT LastName FROM users where users.ID = fkuser) as 'Apellidos'  FROM `borrowedbooks`");

 ?>
