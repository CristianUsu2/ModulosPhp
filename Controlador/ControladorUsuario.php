<?php
require '../Modelo/usuario.php';
$persona= new usuario();
$login= $_POST["enviar"];
$respuesta=[];
if($login=1){
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