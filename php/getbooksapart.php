<?php

include 'mainconn.php';

$usr = $_POST["user"];
$Mysql = new MysqlConn;

$Mysql->ExecuteQuery("SELECT * FROM borrowedbooks WHERE fkuser = '$usr'");


 ?>
