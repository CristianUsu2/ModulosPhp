<?php
class rol
{
    private $IdRol;
    private $NombreRol;

    public function __construct()
    {}

    public function setIdRol($IdRol)
    {
        $this->IdRol = $IdRol;
    }
    public function getIdRol()
    {
        return $this->IdRol; 
    }
    public function setNombrRol($NombreRol)
    {
        $this->NombreRol = $NombreRol;
    }
    public function getNombrRol()
    {
        return $this->NombreRol;
    }
}
?>