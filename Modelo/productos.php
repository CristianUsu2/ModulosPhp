<?php
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

    
}
?>