<?php require '../Validaciones/seguridad.php';?>
<?php
require 'Administrador/cabeza.php'; 
?>
<?php 
require 'Administrador/menu.php';
?>
<?php 
$id=$_GET["id"];
 require '../Modelo/productos.php';
 $pro= new productos();
 $productos=$pro->ObtenerProducto($id);
 
?>
<div class="col-lg-6" style="margin-left:300px;">
                                <div class="main-card mb-3 card mt-3 " style="width:900px; height:500px;">
                                    <div class="card-body" style="margin-rigth:200px;"><h5 class="card-title">Editar Producto</h5>
 <?php foreach($productos as $g){?>
<form  action="../Controlador/controladorProducto.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<input type="hidden" name="accion" value="3">
  <div class="row">
    <div class="col-6 mt-2">
      <label>Nombre</label>
      <input type="text" class="form-control" name="nombre" value="<?php echo $g["nombre"];?>"/>
    </div>
    <div class="col-6 mt-2">
    <label>Descripcion</label>
      <input type="text" class="form-control"  name="descripcion" value="<?php echo $g["descripcion"];  ?>"/>
    </div>
    <div class="col-3 mt-2">
     <label>Precio</label>
      <input type="text" class="form-control" name="precio" value="<?php echo $g["precio"]; ?>"/>
    </div>
    <div class="col-3 mt-2">
    <label>Cantidad</label>
      <input type="text" class="form-control" name="cantidad" value="<?php echo $g["cantidad"]; ?>" />
    </div>
    <div class="col-6 mt-2">
      <label>Foto</label>
     <input type="file" class="form-control"  name="foto" />
    </div>
    <div class="col-12 mt-2">
    <?php 
         $cate= new productos();
         $objeCate=$cate->ObtenerCategorias();
                 ?>
                    <label class="col-form-label">Categorias</label>
                    
                     <select name="categoria" class="form-control" >
                     <?php 
                      foreach($objeCate as $a)
                     {
                
                     echo '<option  value='.$a["id_categoria"].'>'.$a["nombre"].'</option>';
                     }
                     ?>
                    </select>
    </div>
  </div>
 <?php }?>
  <div class="col-12 mt-4" style="margin-top:35px;">
<button type="submit" class="btn btn-primary">Editar</button>
  <a href="ListaP.php"  class="btn btn-warning">Cancelar</a>
  </div>
</div>
</form>

</div>
</div>
<?php 
 require 'Administrador/pie.php';
?>