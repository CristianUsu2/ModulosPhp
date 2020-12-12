<?php
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$correo=$_POST["correo"];
$telefono=$_POST["telefono"];
$direccion=$_POST["direccion"];
$contra=$_POST["contra1"];
$contra2=$_POST["contra2"];
$respuesta=[];
$rdireccion=[];
$rapellido=[];
$rcorreo=[];
$rtelefono=[];
$rdireccion=[];
$rcontra=[];
$rcontra2=[];

if(empty($nombre)){
  $respuesta['nombre']="El campo nombre es requerido";
}else if(strlen($nombre)<2){
  $respuesta['nombre']="El nombre debe tener mas de 2 caracteres";
}else if(strlen($nombre)>30){
 $respuesta['nombre']="El nombre no debe contener mas de 30 caracteres";
}
if(empty($apellido)){
 $rapellido['apellido']="El campo apellido es requerido";
}else if(strlen($apellido)<2){
  $rapellido['apellido']="El apellido debe tener mas de 2 caracteres";
}else if(strlen($apellido)>30){
 $rapellido['apellido']="El apellido no debe tener mas de 30 caracteres";
}
if(empty($correo)){
$rcorreo['correo']="El campo correo es requerido";
}else if(strlen($correo)>35){
$rcorreo['correo']="El correo no debe tener mas de 35 caracteres";
}else if(!empty($correo)){
 $busqueda=strpos($correo,'@');
 if($busqueda==false){
  $rcorreo['correo']="Correo invalido";
 }
}
if(empty($telefono)){
  $rtelefono['telefono']="El campo telefono es requerido";
}else if(strlen($telefono)<6){
 $rtelefono['telefono']="El telefono debe tener mas de 6 de caracteres";
}else if(strlen($telefono)>12){
 $rtelefono['telefono']="El telefono no debe tener mas de 11 caracteres";
}
 if(empty($direccion)){
  $rdireccion['direccion']="el campo direccion es requerido";
 }else if(strlen($direccion)>20){
 $rdireccion['direccion']="No debe tener mas de 20 caracteres";
  }else if(strlen($direccion)<3){
   $rdireccion['direccion']="La direccion debe tener mas de 3 caracteres";
  }
  if(!empty($direccion)){
  $b=strpos($direccion,'#');
   if($b==false){
   $rdireccion['direccion']="La direccion es invalida";
   }
  }
if(empty($contra)){
 $rcontra['contra']="Este campo es requerido";
}else if(strlen($contra)<3){
 $rcontra['contra']="La contraseña debe tener mas de 2 caracteres";
}else if(strlen($contra)>30){
 $rcontra['contra']="La contraseña no debe tener mas de 30 caracteres";
}
if(empty($contra2)){
 $rcontra2['contra2']="Este campo es requerido";
}else if(strlen($contra)<3){
 $rcontra2['contra2']="La contraseña debe tener mas de 2 caracteres";
}else if(strlen($contra2)>30){
  $rcontra2['contra2']="La contraseña no debe tener mas de 30 caracteres";
}else if( $contra != $contra2){
  $rcontra2['contra2']="Las contraseñas deben ser igual";
}

echo json_encode([
  'respuesta'=>count($respuesta)== 0 && count($rapellido)== 0 && count($rcorreo)== 0 && count($rtelefono)== 0 && count($rdireccion)== 0 && count($rcontra)==0 && count($rcontra2)==0,
  'erroresN'=>$respuesta,
  'erroresA'=>$rapellido,
  'erroresC'=>$rcorreo,
  'erroresT'=>$rtelefono,
  'erroresD'=>$rdireccion,
  'erroresCo'=>$rcontra,
  'erroresCo2'=>$rcontra2
]);

?>