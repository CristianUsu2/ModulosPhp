<?php
    require_once("../Controlador/controlador.php");
    $listarRoles = json_decode($controlador->ListarRol());
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modulos</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>

    </head>
    <body>

    <div class="container mt-4">
        <div class="card border-info">
            <div class="card-header bg-info">
            <span class="navbar-brand mb-0 h1"><h2>Listar Roles</h2></span>
                <a href="../controlador/controlador.php?registrarRol" class="btn btn-success">Nuevo</a>
                <a href="../controlador/controlador.php?listarRol" class="btn btn-warning">Listar</a>

            </div>
        </div>
        <br>
        <table border="1" id="listarroles" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($listarRoles as $rol)
                {
                ?> 
                <tr>
                    <td><?php echo $rol->idrol?></td>
                    <td><?php echo $rol->nombrerol?></td>
                    <td>
                        <a href="../controlador/controlador.php?editarRol&idrol=<?php echo $rol->idrol?>">Editar</a>
                        <a href="../Controlador/controlador.php?eliminarRol&idrol=<?php echo $rol->idrol?>" class="btn btn-eliminar">Eliminar</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            <tbody>
        </table>
    </div>

        <script>
        $(document).ready(function() {
        $('#listarroles').DataTable();
        } );
        </script>
    </body>
    
    </html> 