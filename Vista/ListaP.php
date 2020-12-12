<?php require '../Validaciones/seguridad.php';?>
<?php
require 'Administrador/cabeza.php'; 
?>
<?php 
require 'Administrador/menu.php';
?>


<?php 
 if(!empty($_GET["res"])){
     echo "<script>
            Swal.fire({
                icon:'success',
                title: 'Operacion Exitosa',
                text: 'se guardo la imagen'
            })
           </script>";
 }
?>
<?php 
 require '../Modelo/productos.php';
 $pro= new productos();
 $productos=$pro->ListarProducto();
?>

<div class="col-lg-6" style="margin-left:300px;">
                                <div class="main-card mb-3 card mt-3 " style="width:900px; height:500px;">
                                    <div class="card-body" style="margin-rigth:200px;"><h5 class="card-title">Lista de Productos</h5>
                                    <button class="btn btn-success mt-2 mb-2" data-toggle="modal" data-target="#agregarP">Agregar</button>
                                        <table class="mb-0 table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Id Producto</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Foto</th>
                                                <th>Categoria</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                          <?php foreach($productos as $prod){ ?>
                                            <tr>
                                            
                                                <td scope="row"><?php echo $prod["id_producto"]?></td>
                                                <td><?php echo $prod["nombre"];?></td>
                                                <td><?php echo $prod["descripcion"]; ?></td>
                                                <td><?php echo $prod["precio"]; ?></td>
                                                <td><?php echo $prod["cantidad"]; ?></td>
                                                <td><?php echo "<img src=".$prod['foto']." width='60' height='50' ";?></td>
                                                <td><?php 
                                                  switch($prod["id_categoria"]){
                                                      case 1:
                                                        echo "Zapatos";
                                                      break;
                                                      case 2:
                                                        echo "Camisas";
                                                      break;
                                                  }
                                                ?></td>
                                                <td>
                                                 <a href="EditarP.php?id=<?php echo $prod["id_producto"];?>" class="btn btn-primary" >Editar</a>
                                                  <?php if($prod["estado"]== 0 ){?>
                                                 <a href="../Controlador/controladorProducto.php?acc=1&&id=<?php echo $prod["id_producto"]; ?>&&estado=<?php echo $prod["estado"];?>" class="btn btn-success">Activar</a>
                                                  <?php }else{ ?>
                                                    <a href="../Controlador/controladorProducto.php?acc=1&&id=<?php echo $prod["id_producto"]; ?>&&estado=<?php echo $prod["estado"];?>" class="btn btn-danger">Desactivar</a>
                                                  <?php }?>
                                                </td>
                                                
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
</div>



<div class="modal fide" id="agregarP" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="guardarP" action="../Controlador/controladorProducto.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
               <div class="row">
                  <div class="col-6">
                   <label class="col-form-label">Nombre</label>
                   <input type="text" class="form-control" name="nombre" />
                  </div>
                  <div class="col-6">
                    <label class="col-form-label">Descripcion</label>
                    <input type="text" class="form-control"  name="descripcion" />
                  </div>
                  <div class="col-4">
                    <label class="col-form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" />
                  </div>
                  <div class="col-8">
                    <label class="col-form-label">Cantidad</label>
                    <input type="text" class="form-control" name="cantidad"  />
                  </div>
                  <div class="col-12">
                    <label class="col-form-label">Foto</label>
                    <input type="file" class="form-control" name="foto" />
                  </div>
                  <input type="hidden" name="estado" value="1"/>
                  <div class="col-6">
                  <?php 
                    $cate= new productos();
                   $objeCate=$cate->ObtenerCategorias();
                 ?>
                    <label class="col-form-label">Categorias</label>
                    
                     <select name="categoria" class="form-control">
                     <?php 
                      foreach($objeCate as $a)
                     {
                
                     echo '<option  value='.$a["id_categoria"].'>'.$a["nombre"].'</option>';
                     }
                     ?>
                    </select>
                  
                  </div>
                  
             </div>
             <input type="hidden" name="accion" value="2"/>
          </div>
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="guardarP" class="btn btn-primary" >Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php 
 require 'Administrador/pie.php';
?>