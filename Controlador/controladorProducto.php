<?php
require '../Modelo/productos.php';
 $p = new productos();
 if($_POST["accion"]==2){
  $nombre=$_POST["nombre"];
  $descripcion=$_POST["descripcion"];
  $precio=$_POST["precio"];
  $cantidad=$_POST["cantidad"];
  $foto=$_FILES["foto"];
  $categoria=$_POST["categoria"];
  $estado=$_POST["estado"];
  $res=$p->RegistrarProducto($nombre,$descripcion,$precio,$cantidad,$foto,$categoria,$estado);
   if($res==1){
       header('Location:../Vista/ListaP.php?res=1');
      
   }
 }else if(!empty($_GET["acc"])){
   $accion=$_GET["acc"]; 
   $idP=$_GET["id"];
   if($accion==1){
    $estado=$_GET["estado"];
    if($estado == 1){
      $estado=0;
    }else{
        $estado=1;
    }
    $r=$p->EstadoUsuario($idP,$estado);
    if($r==1){
        header('Location:../Vista/ListaP.php?res=1');
       
    }
   }
 }
 if($_POST["accion"]== 3){
     $id=$_POST["id"];
  $nombre=$_POST["nombre"];
  $descripcion=$_POST["descripcion"];
  $precio=$_POST["precio"];
  $cantidad=$_POST["cantidad"];
  $foto=$_FILES["foto"];
  $categoria=$_POST["categoria"];
  $res=$p->ModificarProducto($nombre,$descripcion,$precio,$cantidad,$foto,$categoria,$id);
   if($res==1){
       header('Location:../Vista/ListaP.php?res=1');
      
   }
 }
?>