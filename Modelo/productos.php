<?php
include 'conexion.php';
class Productos
{
    private $idproducto;
    private $nombre;
    private $cantidad;
    private $precio;
    private $descripcion;
    private $stock;
    private $foto;
    private $id_categoria;

    public function __construct()
    {}

    public function setidproducto($idproducto)
    {
        $this->idproducto=$idproducto;
    }
    public function getidproducto()
    {
        return $this->idproducto;
    }

    public function setnombre($nombre)
    {
        $this->nombre=$nombre;
    }
    public function getnombre()
    {
        return $this->nombre;
    }

    public function setcantidad($cantidad)
    {
        $this->cantidad=$cantidad;
    }
    public function getcantidad()
    {
        return $this->cantidad;
    }

    public function setprecio($precio)
    {
        $this->precio=$precio;
    }
    public function getprecio()
    {
        return $this->precio;
    }

    public function setdescripcion($descripcion)
    {
        $this->descripcion=$descripcion;
    }
    public function getdescripcion()
    {
        return $this->descripcion;
    }

    public function setstock($stock)
    {
        $this->stock=$stock;
    }
    public function getstock()
    {
        return $this->stock;
    }
    public function setfoto($foto)
    {
        $this->foto=$foto;
    }
    public function getfoto()
    {
        return $this->foto;
    }

    public function setidcategoria($id_categoria)
    {
        $this->id_categoria=$id_categoria;
    }
    public function getidcategoria()
    {
        return $this->id_categoria;
    }
    public function ObtenerCategorias(){
        $resultado=[];
        $db=Db::Conectar();
        $consulta=$db->prepare("SELECT * FROM categorias");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        return $resultado;
        
      }

      public function ObtenerProducto($id){
          $respuesta=[];
          $db=Db::Conectar();
          $consulta=$db->prepare("SELECT * FROM productos WHERE id_producto=?");
          $consulta->bindvalue(1, $id);
          $consulta->execute();
          $resultado=$consulta->fetchAll();
          $respuesta=$resultado;
          return $respuesta;
      }
    public function ListarProducto()
    {
        $res=[];
       $db=Db::Conectar();
       $sql=$db->prepare("SELECT * FROM productos");
       $sql->execute(); 
       $res=$sql->fetchAll();
        return $res;
    }

    public function RegistrarProducto($nombre,$descripcion,$precio,$cantidad,$foto,$categoria,$estado)
    {
        $subioImg=null;
        $resultado=0;
        $carpeta="../imagenesUp/";
        $nombreFoto=$carpeta .basename ($foto["name"]) ;
        $tipoArchivo=strtolower( pathinfo($nombreFoto, PATHINFO_EXTENSION));
        $FotoT = getimagesize($foto["tmp_name"]);
        if($FotoT != false){
             $tamaFoto=$foto["size"];
             if($tipoArchivo=="jpg" || $tipoArchivo=="jpeg" || $tipoArchivo=="png"){
              if($tamaFoto<1000000  ){
                 if(move_uploaded_file($foto["tmp_name"], $nombreFoto)){
                    $subioImg=true;
                 }
              }
            }
        }
        $db=Db::Conectar();
         if($subioImg==true){
             try{
             $sql=$db->prepare("INSERT INTO productos VALUES(null,?,?,?,?,?,?,?)");
             $sql->bindvalue(1, $nombre);
             $sql->bindvalue(2, $descripcion);
             $sql->bindvalue(3, $precio);
             $sql->bindvalue(4, $cantidad);
             $sql->bindvalue(5, $nombreFoto);
             $sql->bindvalue(6, $categoria);
             $sql->bindvalue(7, $estado);
             $sql->execute();
             $resultado=1;
             }catch(Exception $e){
              $resultado=$e->getMessage();
             }
         }
        return $resultado;

    }

    public function BuscarProducto($idproducto)
    {
        $producto  =  new Productos();
        $crudProducto = new CrudProducto();
        return $crudProducto->BuscarProducto($idproducto);

    }

    public function ModificarProducto($nombre,$descripcion,$precio,$cantidad,$foto,$categoria,$id)
    {
        $subioImg=null;
        $resultado=0;
        $carpeta="../imagenesUp/";
        $nombreFoto=$carpeta .basename ($foto["name"]) ;
        $tipoArchivo=strtolower( pathinfo($nombreFoto, PATHINFO_EXTENSION));
        $FotoT = getimagesize($foto["tmp_name"]);
        if($FotoT != false){
             $tamaFoto=$foto["size"];
             if($tipoArchivo=="jpg" || $tipoArchivo=="jpeg" || $tipoArchivo=="png"){
              if($tamaFoto<1000000  ){
                 if(move_uploaded_file($foto["tmp_name"], $nombreFoto)){
                    $subioImg=true;
                 }
              }
            }
        }
        $db=Db::Conectar();
         if($subioImg==true){
             try{
             $sql=$db->prepare("UPDATE productos SET nombre=?,descripcion=?,precio=?,cantidad=?,foto=?,id_categoria=? where id_producto=?");
             $sql->bindvalue(1, $nombre);
             $sql->bindvalue(2, $descripcion);
             $sql->bindvalue(3, $precio);
             $sql->bindvalue(4, $cantidad);
             $sql->bindvalue(5, $nombreFoto);
             $sql->bindvalue(6, $categoria);
             $sql->bindvalue(7, $id);
             $sql->execute();
             $resultado=1;
             }catch(Exception $e){
              $resultado=$e->getMessage();
             }
         }
        return $resultado;
    }

    public function EstadoUsuario($id, $estado){
        $respuesta=0; 
        $db= Db::Conectar();
        $sql=$db->prepare("UPDATE productos SET estado=? WHERE id_producto=?");
        try{
          $sql->bindvalue(1, $estado);
          $sql->bindvalue(2, $id);
          $sql->execute();
          $respuesta=1;
        }catch(Exception $e){ 
         $respuesta=$e->getMessage();
        }
        return $respuesta; 
      }
}
?>