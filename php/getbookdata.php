<?php

include 'mainconn.php';
$Mysql = new MysqlConn;

$book = $_POST["book"];

 $Mysql->ExecuteQuery("SELECT * FROM books WHERE ISBN = $book");

 ?>
