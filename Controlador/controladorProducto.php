<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/productos.php");
require_once("../Modelo/crudProducto.php");

class ControladorProducto
{
    public function __construct()
    {}

    public function ListarProducto()
    {
        $producto  =  new Productos();
        $crudProducto = new CrudProducto();
        return json_encode($crudProducto->ListarProducto($producto));
    }

    public function RegistrarProducto($producto)
    {
        $producto  =  new Productos();
        $crudProducto = new CrudProducto();
        $producto->setnombre($producto);
        $producto->setdescripcion($producto);
        $producto->setprecio($producto);
        $producto->setcantidad($producto);
        $producto->setstock($producto);
        $producto->setfoto($producto);
        $producto->setidcategoria($producto);

        return $crudProducto->RegistrarProducto($producto);

    }

    public function BuscarProducto($idproducto)
    {
        $producto  =  new Productos();
        $crudProducto = new CrudProducto();
        return $crudProducto->BuscarProducto($idproducto);

    }

    public function ModificarProducto($nombre, $descripcion, $precio, $cantidad, $stock, $foto)
    {
        $producto  =  new Productos();
        $crudProducto = new CrudProducto();
        $producto->setnombre($nombre);   
        $producto->setdescripcion($descripcion);        
        $producto->setprecio($precio);        
        $producto->setcantidad($cantidad);        
        $producto->setstock($stock);        
        $producto->setfoto($foto);        

        return $crudProducto->ModificarProducto($producto);

    }

    public function EliminarProducto($idproducto)
    {
        $producto  =  new Productos();
        $crudProducto = new CrudProducto();
        $producto->setidproducto($idproducto);        
        return $crudProducto->EliminarProducto($producto);

    }

    public function desplegarLista($vista)
    {
        header("Location:".$vista);
    }
}
$controlador = new controladorProducto();
if(isset($_GET['registrarProducto'])){
    echo $controlador->desplegarLista('../Vista/registrarProducto.php');
}
elseif(isset($_POST['registrarProducto'])){
    echo $controlador->RegistrarProducto($_POST['nombrerol']);
}
elseif(isset($_GET['listarProducto']))
{
    $idproducto=$_GET['idproducto'];
    $controlador->desplegarLista("../Vista/index.php");
}
elseif(isset($_GET['editarProducto']))
{
    $idproducto=$_GET['idoproducto'];
     $controlador->desplegarLista("../Vista/editarProducto.php?idProducto=".$idproducto);
}
elseif(isset($_POST['editarProducto']))
{
    $controlador->ModificarProducto($_POST['idproducto'],$_POST['nombre'], $_POST['descripcion'],$_POST['precio'], $_POST['cantidad']
,$_POST['stock'], $_POST['foto']);
     $controlador->desplegarLista("../Vista/index.php".$idproducto);
}elseif(isset($_GET['eliminarProducto']))
{
    $idRol=$_GET['idproducto'];
    $controlador->EliminarProducto($_GET['idproducto']);
    $controlador->desplegarLista("../Vista/index.php");
}
?>