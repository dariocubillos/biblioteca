<?php

include 'mainconn.php';

$Mysql = new MysqlConn;

$username = $_POST['user'];
$book = $_POST['book'];

printf($Mysql->UpdatePass($username,$book));

 ?>
