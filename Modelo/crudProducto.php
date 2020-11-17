<?php
class CrudProducto
{
    public function __construct()
    {}

    public function ListarProducto()
    {
        $Db = Db::Conectar();
        $sql= $Db->query('SELECT * FROM productos');
        $sql->execute();
        return $sql->fetchAll();
        Db::CerrarConexion($Db);
    }

    public function RegistrarProducto($producto)
    {
        $mensaje = "";
        $Db = Db::Conectar(); 
        $sql = $Db->prepare('INSERT INTO productos(nombre,descripcion, precio, cantidad, stock,foto,id_categoria)
        VALUES (:nombre,:descripcion,:precio,:cantidad,:stock,:foto,:id_categoria)'); 
        $sql->bindvalue('nombre',$producto->setnombre());
        $sql->bindvalue('descripcion',$producto->setdescripcion());
        $sql->bindvalue('precio',$producto->setprecio());
        $sql->bindvalue('cantidad',$producto->setcantidad());
        $sql->bindvalue('stock',$producto->setstock());
        $sql->bindvalue('foto',$producto->setfoto());
        $sql->bindvalue('id_categoria',$producto->setidcategoria());

        try{
            $sql->execute();
            $mensaje = "Registro Exitoso";
            header ("Location:../Vista/listarProducto.php");
        }
        catch(Exception $e)
        {
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

    public function BuscarProducto($idproducto)
    {
        $producto = new Productos();
        $Db = Db::Conectar(); 
        $sql = $Db->prepare('SELECT * FROM productos
        WHERE idproducto=:idproducto');
        $sql->bindvalue('idproducto',$idproducto);

        try{
            $sql->execute();
            $registro = $sql->fetch();
            $producto-> setidproducto($registro['idproducto']);
            $producto->setnombre($registro['nombre']);
        }
        catch(Exception $e)
        {
            echo $e ->getMessage();
        }
        Db::CerrarConexion($Db);
        return $producto;
    }

    public function ModificarProducto($producto)
    {
        $mensaje = "";
        $Db = Db::Conectar();
        $sql = $Db->prepare('UPDATE productos 
        SET nombre=:nombre,descripcion=:descripcion,precio=:precio,cantidad=:cantidad,stock=:stock,foto=:foto WHERE idproducto=:idproducto'); 
        $sql->bindvalue('nombre',$producto->getnombre());
        $sql->bindvalue('descripcion',$producto->getdescripcion());
        $sql->bindvalue('precio',$producto->getprecio());
        $sql->bindvalue('cantidad',$producto->getcantidad());
        $sql->bindvalue('stock',$producto->getstock());
        $sql->bindvalue('foto',$producto->getfoto());

        try{
            $sql->execute();
            $mensaje = "Modificación Exitosa";
        }
        catch(Exception $e)
        {
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

    public function EliminarProducto($producto)
    {
        $mensaje = "";
        $Db = Db::Conectar();
        $sql = $Db->prepare('DELETE FROM producto 
        WHERE idproducto=:idproducto');
        $sql->bindvalue('idproducto',$producto->getidproducto());


        try{
            $sql->execute();
            $mensaje = "Eliminación Exitosa";
        }
        catch(Exception $e)
        {
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }
}
?>