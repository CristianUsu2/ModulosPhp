<?php
session_start();
?>
<?php
require 'Administrador/cabeza.php'; 
?>
<?php 
require 'Administrador/menu.php';
?>
<?php 
 require '../Modelo/conexion.php';
 $db=Db::Conectar();
 $sql=$db->prepare("SELECT * FROM usuarios");
 $sql->execute();
 $resultados=$sql->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col-lg-6" style="margin-left:300px;">
                                <div class="main-card mb-3 card mt-3 " style="width:900px; height:500px;">
                                    <div class="card-body mb-4" style="margin-rigth:200px;"><h5 class="card-title">Lista de usuarios</h5>
                                     <button class="btn btn-success mt-2" data-toggle="modal" data-target="#agregarU">Agregar</button>   
                                    <table class="mb-0 table table-bordered mt-4">
                                            <thead>
                                            <tr>
                                                <th>Id Usuario</th>
                                                <th>Rol</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                              <?php  
                                              foreach($resultados as $r){
                                                  ?>
                                            <tr>
                                                <td><?php echo $r["id_usuario"];?></td>
                                                <td><?php echo $r["id_rol"]== 8 ? "Usuario": "Administrador"; ?></td>
                                                <td><?php echo $r["nombre"];?></td>
                                                <td><?php echo $r["apellido"];?></td>
                                                <td><?php echo $r["telefono"];?></td>
                                                <td><?php echo $r["correo"];?></td>  
                                                <td><?php echo $r["estado"]== 1 ? "<p class='text-success'>Activo</p>" : "<p class='text-danger'>Inactivo</p>";?></td>  
                                                <td>
                                                    <button class="btn btn-primary mb-2" id="editar" onclick="sad(<?php echo $r['id_usuario']; ?>)" data-toggle="modal" data-target="#editarU">Editar</button>
                                                    <?php  if($r["estado"] == 0) { ?>
                                                    <button class='btn btn-success' onclick="estado(<?php echo $r['id_usuario']; ?>,<?php echo $r['estado'] ;?>)" id='estado'>Activar</button>
                                                    <?php }else{?>
                                                    <button class='btn btn-danger' onclick="estado(<?php echo $r['id_usuario']; ?>,<?php echo $r['estado'] ;?>)" id='estado' >Desactivar</button>
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
<form id="mostrarU"></form>
<form id="estadoU"></form>
<div class="modal fide" id="agregarU" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="guardarF">
          <div class="form-group">
               <div class="row">
                  <div class="col-6">
                   <label class="col-form-label">Nombre</label>
                   <input type="text" class="form-control" name="nombre" />
                  </div>
                  <div class="col-6">
                    <label class="col-form-label">Apellido</label>
                    <input type="text" class="form-control"  name="apellido" />
                  </div>
                  <div class="col-4">
                    <label class="col-form-label">Telefono</label>
                    <input type="text" class="form-control" name="telefono" />
                  </div>
                  <div class="col-8">
                    <label class="col-form-label">Direccion</label>
                    <input type="text" class="form-control" name="direccion"  />
                  </div>
                  <div class="col-6">
                    <label class="col-form-label">Clave</label>
                    <input type="password" class="form-control" name="contra2" />
                  </div>
                  <div class="col-6">
                    <label class="col-form-label">Correo</label>
                    <input type="email" class="form-control"  name="correo" />
                  </div>
                  
             </div>
             <input type="hidden" name="accion" value="2"/>
          </div>
        </form>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
      </div>
     
    </div>
  </div>
</div>

<div class="modal fide" id="editarU" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editarF">
            <input type="hidden" name="accion" value="4"/>
            <input type="hidden" id="idu" name="idu" />
          <div class="form-group">
               <div class="row">
                  <div class="col-6">
                   <label class="col-form-label">Nombre</label>
                   <input type="text" id="nombreE" class="form-control" name="nombre" />
                  </div>
                  <div class="col-6">
                    <label class="col-form-label">Apellido</label>
                    <input type="text" id="apellidoE" class="form-control"  name="apellido" />
                  </div>
                  <div class="col-4">
                    <label class="col-form-label">Telefono</label>
                    <input type="text" id="telefonoE" class="form-control" name="telefono" />
                  </div>
                  <div class="col-8">
                    <label class="col-form-label">Direccion</label>
                    <input type="text" id="direccionE" class="form-control" name="direccion"  />
                  </div>
                  <div class="col-6">
                    <label class="col-form-label">Correo</label>
                    <input type="email" id="correoE"  class="form-control"  name="correo" />
                  </div>
                  
             </div>
       
          </div>
        </form>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardarE">Guardar</button>
      </div>
     
    </div>
  </div>
</div>

<?php 
 require 'Administrador/pie.php';
?>
<script>
    $("#guardar").click(()=>{
      $.ajax({
          type: "POST",
          url: "../Controlador/ControladorUsuario.php",
          data: $("#guardarF").serialize(),
          dataType: "JSON",
          success: function (response) {
              if(response.respuestaRegistro == 1 ){
                Swal.fire({
                    icon: 'success',
                    title: 'Se agrego exitosamente',
                    text: 'Se registro Exitosamente'
                })
               $(document).load();
              }else{
                Swal.fire({
                  icon: 'error',
                  title: 'No se pudo agregar',
                  text: 'Ocurrio un error no se pudo agregar'
                })
              }
          }
      });
      
    });
</script>
<script>
 let sad=(f)=>{
   valor=f;
   $("#mostrarU").html('<input type="hidden" name="accion" value="3" />'+ 
      '<input type="hidden" id="idUsu" name="id" value="" />');
     
   $("#idUsu").val(valor);
   $("#idu").val(valor);
   $.ajax({
     type: "POST",
     url: "../Controlador/ControladorUsuario.php",
     data: $("#mostrarU").serialize(),
     dataType: "JSON",
     success: function (response) {
       for(let e in response.respuesta){
           $("#nombreE").val(response.respuesta.nombre);
           $("#apellidoE").val(response.respuesta.apellido);
           $("#telefonoE").val(response.respuesta.telefono);
           $("#direccionE").val(response.respuesta.direccion);
           $("#correoE").val(response.respuesta.correo);
           
       }
     }
   });
 } 
</script>
<script>
 $("#guardarE").click(()=>{
   $.ajax({
     type: "POST",
     url: "../Controlador/ControladorUsuario.php",
     data: $("#editarF").serialize(),
     dataType: "JSON",
     success: function (response) {
       if(response.respuestaE){
         Swal.fire({
           icon: 'success',
           title: 'Se realizo la operacion exitosamente',
           text: 'se pudo modificar correctamenta'
         })
        
        location.reload();
       }else {
         Swal.fire({
           icon: 'error',
           title: 'No se pudo realizar la operacion',
           text: 'Revisa o ponte en contacto con el administrador algo fallo'
         })
         location.reload();
       }
     }
   });
 });
</script>
<script>
 let estado=(i,e)=>{
   $idU=i;
   $estadoU=e;
   console.log($estadoU);
   $("#estadoU").html('<input type="hidden" name="accion" value="5" />'+
    '<input type="hidden" id="idU" name="id" value="" />'+
    '<input type="hidden" id="estadU" name="estado" value="" />');
     $("#idU").val($idU);
     $("#estadU").val($estadoU);
    $.ajax({
      type: "POST",
      url: "../Controlador/ControladorUsuario.php",
      data: $("#estadoU").serialize(),
      dataType: "JSON",
      success: function (response) {
        if(response.respuesta){
              Swal.fire({
                icon:'success',
                title: 'Se realizo la operacion Exitosamente',
                text: 'Se efectuo la accion'
              })
           
        }else{
            Swal.fire({
             icon: 'error',
             title: 'No se pudo realizar la accion',
             text: 'tengo sueño'
            })   

        }
        location.reload();
      }
    });
 }
</script>
