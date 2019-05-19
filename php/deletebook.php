<?php

include 'mainconn.php';

$Mysql = new MysqlConn;

$Isbn = $_POST['Isbn'];

printf($Mysql->DeleteBook($Isbn));


 ?>
