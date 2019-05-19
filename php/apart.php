<?php

include 'mainconn.php';

$Mysql = new MysqlConn;

$ISBN = $_POST['ISBN'];
$usr = $_POST['usr'];

printf($Mysql->ApartBook($ISBN,$usr));


 ?>
