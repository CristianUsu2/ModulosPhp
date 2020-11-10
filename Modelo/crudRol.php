<?php
class CrudRol
{
    public function __construct()
    {}

    public function ListarRol()
    {
        $Db = Db::Conectar();
        $sql = $Db->query('SELECT * FROM roles');
        $sql->execute();
        return $sql->fetchAll();
        Db::CerrarConexion($Db);
    }

    public function RegistrarRol($rol)
    {
        $mensaje = "";
        $Db = Db::Conectar();
        $sql = $Db->prepare('INSERT INTO roles(nombrerol) VALUES (:nombrerol)');
        $sql->bindvalue('nombrerol',$rol->getNombrRol());


        try{
            $sql->execute();
            $mensaje = "Registro Exitoso";
            header ("Location:../Vista/index.php");
        }
        catch(Exception $e)
        {
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
        
    }

    public function BuscarRol($idrol)
    {
        $rol = new Rol();
        $Db = Db::Conectar();
        $sql = $Db->prepare('SELECT * FROM roles
        WHERE idrol=:idrol');
        $sql->bindvalue('idrol',$idrol);

        try{
            $sql->execute();
            $registro = $sql->fetch();
            $rol-> setIdRol($registro['idrol']);
            $rol->setNombrRol($registro['nombrerol']);
        }
        catch(Exception $e)
        {
            echo $e ->getMessage();
        }
        Db::CerrarConexion($Db);
        return $rol;
        
    }


    public function ModificarRol($rol)
    {
        $mensaje = "";
        $Db = Db::Conectar();
        $sql = $Db->prepare('UPDATE roles 
        SET nombrerol=:nombrerol WHERE idrol=:idrol');
        $sql->bindvalue('nombrerol',$rol->getNombrRol());
        $sql->bindvalue('idrol',$rol->getIdRol());


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

    public function EliminarRol($rol)
    {
        $mensaje = "";
        $Db = Db::Conectar();
        $sql = $Db->prepare('DELETE FROM roles 
        WHERE idrol=:idrol');
        $sql->bindvalue('idrol',$rol->getIdRol());


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