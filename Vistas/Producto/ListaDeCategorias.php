<?php
session_start();
include '../../conexion.php';

$ConsultaCategoria = "SELECT Categoria,Nombres as Nombre, Apellidos AS Apellido FROM Categoria INNER JOIN Users ON Categoria.ID_Usuario=Users.ID_Usuario";
$MandarConsulta = mysqli_query($con, $ConsultaCategoria);
?>
<div style="margin-top: 4%;">
    <div class="row">
        <div class="col-md-12">
            <h1 align="center">Lista de Categorias</h1>

            <table width="90%" id="ListaEmpleados" class="table table-hover" align="center">
                <thead class="table-primary">

                    <tr align="center">
                        <td scope="col">Categoria</td>
                        <td scope="col">Responsable</td>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($datos = $MandarConsulta->fetch_array()) {
                    ?>

                        <center>
                            <tr>
                                <td><?php echo $datos["Categoria"] ?></td>
                                <td><?php echo $datos["Nombre"], ' ', $datos["Apellido"]  ?></td>
                            </tr>
                        </center>
                    <?php
                    }

                    ?>
                <tfoot class="table table-hover">
                    <tr>

                    </tr>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="MyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>