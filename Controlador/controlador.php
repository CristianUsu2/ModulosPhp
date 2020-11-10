<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/rol.php");
require_once("../Modelo/crudRol.php");
class Controlador
{
    public function __construct()
    {}

    public function ListarRol()
    {
        $crudRol = new CrudRol();
        return json_encode($crudRol->ListarRol());
    }

    public function RegistrarRol($nombrerol)
    {
        $rol  =  new rol();
        $crudRol = new CrudRol();
        $rol->setNombrRol($nombrerol);
        return $crudRol->RegistrarRol($rol);

    }

    public function BuscarRol($idRol)
    {
        $rol  =  new rol();
        $crudRol = new CrudRol();
        return $crudRol->BuscarRol($idRol);

    }

    public function ModificarRol($IdRol,$NombreRol)
    {
        $rol  =  new rol();
        $crudRol = new CrudRol();
        $rol->setIdRol($IdRol);        
        $rol->setNombrRol($NombreRol);
        return $crudRol->ModificarRol($rol);

    }

    public function EliminarRol($IdRol)
    {
        $rol  =  new rol();
        $crudRol = new CrudRol();
        $rol->setIdRol($IdRol);        
        return $crudRol->EliminarRol($rol);

    }

    public function desplegarLista($vista)
    {
        header("Location:".$vista);
    }
}
$controlador = new Controlador();
if(isset($_GET['registrarRol'])){
    echo $controlador->desplegarLista('../Vista/registrarRol.php');
}
elseif(isset($_POST['registrarRol'])){
    echo $controlador->RegistrarRol($_POST['nombrerol']);
}
elseif(isset($_GET['listarRol']))
{
    $idRol=$_GET['idrol'];
    $controlador->desplegarLista("../Vista/index.php");
}
elseif(isset($_GET['editarRol']))
{
    $idRol=$_GET['idrol'];
     $controlador->desplegarLista("../Vista/editarrol.php?idRol=".$idRol);
}
elseif(isset($_POST['editarRol']))
{
    $controlador->ModificarRol($_POST['idrol'],$_POST['nombrerol']);
     $controlador->desplegarLista("../Vista/index.php".$idRol);
}elseif(isset($_GET['eliminarRol']))
{
    $idRol=$_GET['idrol'];
    $controlador->EliminarRol($_GET['idrol']);
    $controlador->desplegarLista("../Vista/index.php");
}
?>