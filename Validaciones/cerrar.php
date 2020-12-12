<?php
session_start();
$salir=$_GET["s"];
if($salir==1){
  session_destroy();
  header('Location:../index.php');
}
?>