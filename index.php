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
    <form id="formR" >
    <input type="hidden" name="accion" value="2">
    <div class="row">
      <div class="col-6">
      <div class="input-container">
        <input type="text" id="Nombre" required="required" name="nombre"/>
        <label for="Username">Nombre *</label>
        <div class="bar"></div>
      </div>
      </div>
     <div class="col-6">
      <div class="input-container">
        <input type="text" id="Apellido" required="required" name="apellido"/>
        <label for="Username">Apellido *</label>
        <div class="bar"></div>
      </div>
     </div>
     <div class="col-6">
      <div class="input-container">
        <input type="text" id="Correo" name="correo" required="required"/>
        <label for="Username">Correo Electronico *</label>
        <div class="bar"></div>
      </div>
     </div>
     <div class="col-6">
      <div class="input-container">
        <input type="text" id="Telefono" name="telefono" required="required"/>
        <label for="Username">Telefono *</label>
        <div class="bar"></div>
      </div>
     </div>
     <div class="col-12">
      <div class="input-container">
        <input type="text" id="Direccion" name="direccion" required="required" />
        <label for="Username">Direccion *</label>
        <div class="bar"></div>
      </div>
     </div>
     <div class="col-6">
      <div class="input-container">
        <input type="password" id="Contraseña" required="required" name="contra1"/>
        <label for="Password">Contraseña *</label>
        <div class="bar"></div>
      </div>
     </div>
     <div class="col-6">
      <div class="input-container">
        <input type="password" id="Contraseña2" required="required" name="contra2"/>
        <label for="Repeat Password">Confirmar Contraseña *</label>
        <div class="bar"></div>
      </div>
     </div>
      </div>
      <div class="button-container">
        <button type="button"  id="registro"><span>Registrar</span></button>
      </div>
   
    </form>
  </div>
</div>
	</div>
</div>
<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-auth.js"></script>

<!--TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyCHZcTDnb-csRv2GKs8PFJ7Ng-X2pr4wn4",
        authDomain: "proyectonet-fadd3.firebaseapp.com",
        databaseURL: "https://proyectonet-fadd3.firebaseio.com",
        projectId: "proyectonet-fadd3",
        storageBucket: "proyectonet-fadd3.appspot.com",
        messagingSenderId: "750431764480",
        appId: "1:750431764480:web:72908b33cdbeace18b58e5"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
</script>
<script>
let btn = document.getElementById("google");

btn.addEventListener('click', () => {
    console.log("gola google");
    var provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function (result) {
        localStorage.setItem("usuario", JSON.stringify(result));
        console.log(result);
        window.location="Vista/user.php";
    }).catch(function (error) {
        var errorMessage = error.message;  
    });
});
</script>
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
                           Swal.fire({
                             icon: 'success',
                             title: 'Inicio de sesion Correcto',
                             text: 'Bienvenido Usuario'

                           })
                           window.location="Vista/user.php";
                     }else if(response.respuestaLogin[i]== "administrador"){
                          Swal.fire({
                            icon: 'success',
                            title: 'Inicio de sesion correcto',
                            text: 'Bienvenido Administrador'
                          })
                          window.location="Vista/admin.php";
                     }else{
                       Swal.fire({
                         icon: 'error',
                         title: 'No se pudo iniciar sesion',
                         text: 'No se encontro ningun usuario retifique sus datos'
                       })
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
<script>
$("#registro").click(()=>{
   $.ajax({
     type: "POST",
     url: "Validaciones/validacionesregistro.php",
     data: $("#formR").serialize(),
     dataType: "JSON",
     success: function (response) {
       if(response.respuesta){
        $.ajax({
          type: "POST",
          url: "Controlador/ControladorUsuario.php",
          data: $("#formR").serialize(),
          dataType: "JSON",
          success: function (response) {
            if(response.respuestaRegistro==1){
              Swal.fire({
                icon: 'success',
                title: 'Se registro correctamente',
                text : 'operacion exitosa'
              })  
            }else{
              Swal.fire({
                icon: 'error',
                title: 'No se registro correctamente',
                text : 'operacion no exitosa'
              })  
            }
          }
        });
       }else{
         console.log(response.respuesta);
         for(let e in response.erroresN){
          $("#Nombre").val(response.erroresN[e]);
         }
         for(let i in response.erroresA){
           $("#Apellido").val(response.erroresA[i]);
         }
         for(let o in response.erroresC){
          $("#Correo").val(response.erroresC[o]);
         }
         for(let r in response.erroresT){
          $("#Telefono").val(response.erroresT[r]);
         }
         for(let p in response.erroresD){
          $("#Direccion").val(response.erroresD[p]);
         }
         for(let q in response.erroresCo){
           $("#Contraseña").get(0).type='text';
          $("#Contraseña").val(response.erroresCo[q]);
         }
         for(let u in response.erroresCo2){
          $("#Contraseña2").get(0).type='text';
          $("#Contraseña2").val(response.erroresCo2[u]);
         }
       }
     }
   });
       /*  $.ajax({
          type: "POST",
          url: "Controlador/ControladorUsuario.php",
          data: $("#formR").serialize(),
          dataType: "JSON",
          success: function (response) {
            if(response.respuestaRegistro== 1){
           Swal.fire([
             icon: 'success',
             title: 'Se registro exitosamente',
             text: 'Debes iniciar sesion'

           ])
           window.location="index.php"
          }
          }
        });*/

    
});
</script>
<script src="js/estilos.js"></script>