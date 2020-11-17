<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/estilos.css">
<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row">
		
<!-- Mixins-->
<!-- Pen Title-->

<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Inicio de sesion</h1>
    <form id="form">
      <input type="hidden" name="accion" value="1"/>
      <div class="input-container">
        <input type="text" id="correo" name="correo" required="required" value=""/>
        <label for="Username">Correo</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="contra" name="clave" required="required" value=""/>
        <label for="Password">Contraseña</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="button" id="enviar"><span>Enviar</span></button>
      </div>
      <div class="footer"><a href="#">Olvidaste tu contraseña?</a></div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Registro
      <div class="close"></div>
    </h1>
    <form>
      <div class="input-container">
        <input type="text" id="Username" required="required"/>
        <label for="Username">Nombre</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" required="required"/>
        <label for="Password">Contraseña</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Repeat Password" required="required"/>
        <label for="Repeat Password">Confirmar Contraseña</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>Registrar</span></button>
      </div>
    </form>
  </div>
</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script> 
$("#enviar").click(()=>{
   $.ajax({
     type: "POST",
     url: "Validaciones/validacioneslogin.php",
     data: $("#form").serialize(),
     dataType: "JSON",
     success: function (response) {
       if(response.respuesta){
             $.ajax({
               type: "POST",
               url: "Controlador/ControladorUsuario.php",
               data: $("#form").serialize(),
               dataType: "JSON",
               success: function (response) {
                 for(let i in response.respuestaLogin){
                     if(response.respuestaLogin[i]== "usuario"){
                            alert("hola usuario");
                     }else if(response.respuestaLogin[i]== "administrador"){
                          Swal.fire({
                            icon: 'success',
                            title: 'Inicio de sesion correcto',
                            text: 'Bienvenido Administrador'
                          })
                          window.location="Vista/admin.php";
                     }   
                 }
                }
             });
       }else {

         for(let e in response.erroresCorreo){
          $("#correo").val(response.erroresCorreo[e]);
         }
         for(let i in response.erroresClave){
           $("#contra").get(0).type='text';
           $("#contra").val(response.erroresClave[i]);
         }
        
       }
     }
   });
 });
</script>
<script src="js/estilos.js"></script>