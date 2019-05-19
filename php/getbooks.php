<?php
include 'mainconn.php';

$Mysql = new MysqlConn;
$Mysql->ExecuteQuery("SELECT * FROM books");

 ?>
