<?php
    require_once("../Controlador/controlador.php");
    $listarRoles = json_decode($controlador->ListarRol());
    ?>        
<?php
        require 'Administrador/cabeza.php'; 
?>

    <?php
        require 'Administrador/menu.php';
?>

  <div class="container mt-4">
        <div class="card border-info">
            <div class="card-header bg-info">
            <span class="navbar-brand mb-0 h1"><h2>Listar Roles</h2></span>
                <a href="../controlador/controlador.php?registrarRol" class="btn btn-success">Nuevo</a>
                <a href="../controlador/controlador.php?listarRol" class="btn btn-warning">Listar</a>

            </div>
        </div>
        <br>
        <table border="1" id="listarroles" class="table table-bordered" style="width:100%">
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

    <?php
        require 'Administrador/pie.php';
?>
    
 