<?php
require 'Administrador/cabeza.php'; 
?>
<?php 
require 'Administrador/menu.php';
?>
<?php
require 'Modelo/conexion.php';
?>
<div class="col-lg-6" style="margin-left:300px;">
                                <div class="main-card mb-3 card mt-3 " style="width:900px; height:500px;">
                                    <div class="card-body" style="margin-rigth:200px;"><h5 class="card-title">Lista de usuarios</h5>
                                        <table class="mb-0 table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
</div>
<?php 
 require 'Administrador/pie.php';
?>