<?php
require '../Modelo/usuario.php';
$persona= new usuario();
$accion= $_POST["accion"];
$respuesta=[];
if($accion=1){
 $correo=$_POST["correo"];
 $clave = $_POST["clave"];
 $persona->SetCorreo($correo);
 $persona->SetClave($clave);
 $r=$persona->IniciarSesion($correo, $clave);
}
echo json_encode([
    'respuestaLogin'=>$r
]);
?>