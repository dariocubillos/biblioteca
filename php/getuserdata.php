<?php

include 'mainconn.php';

$Mysql = new MysqlConn;

$user = $_POST['user'];

$Mysql->ExecuteQuery("SELECT * FROM `users` WHERE ID ='$user'");

 ?>
