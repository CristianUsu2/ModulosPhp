<?php
    require_once("../controlador/controlador.php"); 
    $rol=$controlador->BuscarRol($_GET['idRol']);
    //var_dump($rol);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </head>
<body>
    <div class="container mt-4">
    <div class="card border-info">
            <div class="card-header bg-info">
            <span class="navbar-brand mb-0 h1"><h2>Editar rol</h2></span>
            <butoon><a href="../vista/menuindex.php" class="btn btn-listar">Inicio</a></button>
            <butoon><a href="../controlador/controlador.php?listarRol" class="btn btn-listar">Listar</a></button>
            </div>
        </div>
        <div class="card-body">

            <form name="frmRol" id="fmrRol" Method="POST" action="../controlador/controlador.php"> 
                <label>Codigo:</label>
                <input type="text" name="idrol" id="idrol" class="form-control" readonly
                value="<?php echo $rol->getIdRol()?>">
                <label>Nombre:</label>
                <input type="text" name="nombrerol" id="nombrerol" class="form-control" required
                value="<?php echo $rol->getNombrRol()?>">
                <br>
                <button type="submit" name="editarRol" class="btn btn-dark">Guardar </button>
            </form>
        </div>
    </div>
</body>
</html> 