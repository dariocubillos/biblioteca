<?php
session_start();

include 'php/mainconn.php';

$Mysql = new MysqlConn;

$username = $_GET['usr'];
$pass = $_GET['pass'];


if ($Mysql->FunctionName($username,$pass) == true) {
  // code...
if ($_GET['usr'] == "ADMIN") {
  // code...
  $_SESSION["usr"]=$_GET['usr'];
  $_SESSION["pass"]=$_GET['pass'];
  header("Location:admin.php");
}else {
  // code...
  $_SESSION["usr"]=$_GET['usr'];
  $_SESSION["pass"]=$_GET['pass'];
  header("Location:user.php");
}

}else {
  // code...
  header("Location:index.html");
}

 ?>
