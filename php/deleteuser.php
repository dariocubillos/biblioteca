<?php

include 'mainconn.php';

$Mysql = new MysqlConn;

$Id = $_POST['user'];

printf($Mysql->DeleteUser($Id));


 ?>
