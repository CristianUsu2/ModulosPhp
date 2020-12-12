<?php
require '../Modelo/usuario.php';
$persona= new usuario();
$accion= $_POST["accion"];
switch($accion){
 case 1:
       $correo=$_POST["correo"];
       $clave = $_POST["clave"];
       $persona->SetCorreo($correo);
       $persona->SetClave($clave);
       $r=$persona->IniciarSesion($correo, $clave);
       echo json_encode([
         'respuestaLogin'=>$r,
       ]);
 break;
 case 2:
       $nombre=$_POST["nombre"];
       $apellido=$_POST["apellido"];
       $correo=$_POST["correo"];
            $telefono=$_POST["telefono"];
       $direccion=$_POST["direccion"];
       $contra=$_POST["contra2"];
       $persona->SetNombre($nombre);
       $persona->SetApellido($apellido);
       $persona->SetCorreo($correo);
       $persona->SetTelefono($telefono);
       $persona->SetDireccion($direccion);
       $persona->SetClave($contra);
       $rRegistro=$persona->RegistrarUsuario($nombre,$apellido,$telefono,$direccion,$contra,$correo);
       echo json_encode([
        'respuestaRegistro'=>$rRegistro
       ]);
 break;
 case 3:
       $id=$_POST["id"];
       $resultado=$persona->MostrarUsuario($id);
       echo json_encode([
        'respuesta'=>$resultado
       ]);
 break;
 case 4:
       $id=$_POST["idu"];
       $nombre=$_POST["nombre"];
       $apellido=$_POST["apellido"];
       $correo=$_POST["correo"];
       $telefono=$_POST["telefono"];
       $direccion=$_POST["direccion"];
       $persona->SetNombre($nombre);
       $persona->SetApellido($apellido);
       $persona->SetCorreo($correo);
       $persona->SetTelefono($telefono);
       $persona->SetDireccion($direccion);
       $res=$persona->ModificarUsuario($id,$nombre,$apellido,$telefono,$correo, $direccion);
       echo json_encode([
              'respuestaE'=>$res
       ]);
 break;
 case 5:
       $id=$_POST["id"];
       $estado=$_POST["estado"];
       if($estado == 1){
          $estado=0;
       }else{
         $estado=1;
       }
       $persona->SetIdUsuario($id);
       $persona->SetEstado($estado);
       $res=$persona->EstadoUsuario($id,$estado);
       echo json_encode([
        'respuesta'=>$res
       ]);
 break;
}

?>