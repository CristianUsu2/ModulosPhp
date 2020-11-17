<?php
$correo=$_POST["correo"];
$clave= $_POST["clave"];
$respuesta1=[];
$respuesta2=[];
if(empty($correo)){
    $respuesta1['vacio']="campo requerido";
}else if(strlen($correo)<3){
  $respuesta1['minimo']="el corrreo debe contener mas de 3 caracteres";
}else if(strlen($correo)>60){
 $respuesta1['maximo']="el correo no puede contener un maximo de 59 caracteres";
}else{
$pos=strpos($correo,'@');
if(!$pos){
    $respuesta1['invalido']="el correo es invalido";
}
}
if(empty($clave)){
 $respuesta2['vacion']="el campo no debe ser vacio";
}else if(strlen($clave)<=3){
 $respuesta2['minimo']="la contraseña  debe tener mas de 4 caracteres";
}
echo json_encode([
'respuesta'=>count($respuesta1) == 0 && count($respuesta2)==0,
'erroresCorreo'=>$respuesta1,
'erroresClave'=>$respuesta2
]);
?>