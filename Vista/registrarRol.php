<?php
    require_once("../Controlador/controlador.php"); 
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
<nav class="navbar navbar-light" >
            <form class="form-inline">
                <a href="../controlador/controlador.php?registrarRol" class="btn btn-nuevo">Nuevo</a>
                <a href="../controlador/controlador.php?listarRol" class="btn btn-listar">Listar</a>
                <a href="../controlador/destruirsesion.php" class="btn btn-secondary">Cerrar sesión</a>
            </form>
    </nav>
    <div class="container mt-4">
            <span class="text-center"><h2>Registrar rol</h2></span>

        <div class="card-body">

            <form name="frmRol" id="fmrRol" Method="POST" action="../Controlador/controlador.php"> 
                <label>Nombre:</label>
                <input type="text" name="nombrerol" id="nombrerol" class="form-control" required>
                <br>
                <button type="submit" name="registrarRol" class="btn btn-dark">Registrar </button>
            </form>
        </div>
    </div>
</body>
</html> 