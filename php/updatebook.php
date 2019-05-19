<?php

include 'mainconn.php';

$Mysql = new MysqlConn;

$Isbn = $_POST['Isbn'];
$Titulo = $_POST['Titulo'];
$Autor = $_POST['Autor'];
$Existencia = $_POST['Existencia'];
$Lugar = $_POST['Lugar'];
$Paginas = $_POST['Paginas'];
$Precio = $_POST['Precio'];
$Publicacion = $_POST['Publicacion'];

printf($Mysql->UpdateBook($Isbn,$Titulo,$Autor,$Existencia,$Lugar,$Paginas,$Precio,$Publicacion));


 ?>
