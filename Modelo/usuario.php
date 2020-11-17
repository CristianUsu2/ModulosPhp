<?php 
require 'conexion.php';

class Usuario{
    private $id_usuario;
    private $id_rol;
    private $nombre;
    private $apellido;
    private $telefono;
    private $direccion;
    private $clave;
    private $correo;

    public function __constructor(){

    }

    public function GetIdUsuario(){
     return $this->id_usuario;   
    }
    
    public function GetIdRol(){
        return $this->id_rol;
    }

    public function GetNombre(){
        return $this->nombre;
    }
    public function SetNombre($nombre){
        $this->nombre=$nombre;
    }

    public function GetApellido(){
      return $this->apellido;
    }

    public function SetApellido($apellido){
        $this->apellido=$apellido;
    }

    public function GetTelefono(){
        return $this->telefono;
    }

    public function SetTelefono($telefono){
        $this->telefono=$telefono;
    }

    public function GetDireccion(){
        return $this->direccion;
    }

    public function SetDireccion($direccion){
        $this->direccion=$direccion;
    }

    public function GetClave(){
        return $this->clave;
    }
    
    public function SetClave($clave){
        $this->clave=$clave;
    }

    public function GetCorreo(){
        return $this->correo;
    }

    public function SetCorreo($correo){
        $this->correo=$correo;
    }

    private function BuscarUsuario($correo, $clave){
      $respuesta=[];
      $BD= Db::Conectar();
      $sql=$BD->prepare('SELECT nombre,id_rol,id_usuario FROM usuarios WHERE correo=? and clave=?');
      $sql->bindvalue(1, $correo);
      $sql->bindvalue(2,$clave);
      $sql->execute();
<<<<<<< HEAD
      $respuesta=$sql->fetch();
=======
      $respuesta=$sql->fetchAll();
>>>>>>> f4b6e9f1c5c4ce9e16f176645ecf67d2972a76e8
      return $respuesta;
    }

    public function IniciarSesion($correo, $clave){
      $validacion[]=$this->BuscarUsuario($correo, $clave);
      $respuesta=[];
      
      if(!empty($validacion)){
          foreach($validacion as $a){
         if($a[1] == 7){
            $_SESSION["nombre"]=$a[0];
            $_SESSION["idUsuario"]=$a[2];
            $respuesta['rol']='administrador';   
         }else{
            $_SESSION["nombre"]=$a[0];
            $_SESSION["idUsuario"]=$a[2];
            $respuesta['rol']='usuario';
         }
         }
         
      } 
     return $respuesta;
    }

    public function RegistrarUsuario($nombre,$apellido,$telefono,$direccion,$clave,$correo){
        $respuesta=0;
        $busqueda[]=$this->BuscarUsuario($correo,$clave);
        if(empty($busqueda)){
         $db= Db::Conectar();
         $sql=$db->prepare('INSERT INTO usuarios VALUES(null,8,?,?,?,?,?,?,1)');
         try{
         $sql->bindvalue(1, $nombre);
         $sql->bindvalue(2, $apellido);
         $sql->bindvalue(3, $telefono);
         $sql->bindvalue(4, $direccion);  
         $sql->bindvalue(5, $clave);
         $sql->bindvalue(6, $correo);  
         $sql->execute();
         $respuesta=1;
         }catch(Exception $e){
          return $e->getMessage();
         }
        }
        return $respuesta;
    }

    public function ModificarUsuario($id,$nombre, $apellido, $telefono, $email, $direccion){
    $respuesta=null;
     $db= Db::Conectar();
     $sql=$db->prepare('UPDATE usuarios SET nombre=?,apellido=?,telefono=?,direccion=?,correo=? WHERE id_usuario=?');
     try{
       $sql->bindvalue(1, $nombre);
       $sql->bindvalue(2, $apellido);
       $sql->bindvalue(3, $telefono);
       $sql->bindvalue(4, $email);       
       $sql->bindvalue(5, $direccion);
       $sql->bindvalue(6, $id);
       $sql->execute();
       $respuesta=true;
     }catch(Exception $e){
      
     }
     $respuesta;
    }

    public function EstadoUsuario($id, $estado){
      $respuesta=false; 
      $db= Db::Conectar();
      $sql=$db->prepare('UPDATE usuarios SET estado=? WHERE id_usuario=?');
      try{
        if($estado==1){
            $inactivo=0;
        $sql->bindvalue(1,$inactivo);
        }else{
        $activo=1;
        $sql->bindvalue(1,$activo);
        }
        $sql->bindvalue(2, $id);
        $sql->execute();
        $respuesta=true;
      }catch(Exception $e){ 
      
      }
      return $respuesta; 
    }

}
?>