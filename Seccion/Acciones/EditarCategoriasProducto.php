<?php
session_start();
include '../../conexion.php';

$ConsultaCategoria = "SELECT  ID_Categria,Categoria,Nombres as Nombre, Apellidos AS Apellido FROM Categoria INNER JOIN Users ON Categoria.ID_Usuario=Users.ID_Usuario";
$MandarConsulta = mysqli_query($con, $ConsultaCategoria);
$idUsuario = $_GET['id'];
if (empty($_GET['id'])) {
} else {


    $ConsultaDeSelect = "SELECT ID_Categria,Categoria,Nombres as Nombre, Apellidos AS Apellido FROM Categoria INNER JOIN Users ON Categoria.ID_Usuario=Users.ID_Usuario WHERE ID_Categria=$idUsuario";
    $MandarLaConsulta = mysqli_query($con, $ConsultaDeSelect);
    $hacerUnArray = mysqli_fetch_array($MandarLaConsulta);
    $CategoriaNombre = $hacerUnArray['Categoria'];

    $AbrirModal = ' $("#Tables").modal("show")';
}

if (!empty($_POST['EditarCategoria'])) {

    $NuevaCategoria = $_POST['EditarCategoria'];
    $ActualizarCategoria = "UPDATE Categoria SET  Categoria='$NuevaCategoria'  WHERE ID_Categria = $idUsuario ";
    $MadarActalizar = mysqli_query($con, $ActualizarCategoria);
    header("location: EditarCategoriasProducto.php");
}


$idUsuarioEliminar = $_GET['idEliminar'];
if (empty($_GET['idEliminar'])) {
} else {


    $CosultaSelecEliminar = "SELECT ID_Categria,Categoria,Nombres as Nombre, Apellidos AS Apellido FROM Categoria INNER JOIN Users ON Categoria.ID_Usuario=Users.ID_Usuario WHERE ID_Categria=$idUsuarioEliminar";
    $MansarConsultaEliminar = mysqli_query($con, $CosultaSelecEliminar);
    $hacerUnArrayDeEliminar = mysqli_fetch_array($MansarConsultaEliminar);
    $_SESSION['CategoriaEliminar'] = $idUsuarioEliminar;
    $CategoriaNombreEliminar = $hacerUnArrayDeEliminar['Categoria'];
    $Mensage = '<h4>¿Estas Seguro que quieres eliminar la categoria' . $CategoriaNombreEliminar . ' ?</h4>';
    $AbrirModal = ' $("#EliminarCategoria").modal("show")';
}

?>

<?php echo $hola; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="../../styloCalculadora.css">
    <link rel="stylesheet" href="../../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../../Datatable/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="../../stilosPrincipales.css" />
    <link rel="stylesheet" type="text/css" href="../../Datatable/datatables.css" />

    <script src="../../jqueri/jquery.js"></script>
    <script src="../../Datatable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../Datatable/rowReorder.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="../../Datatable/responsive.dataTables.min.css" />

</head>

<body>


    <div style="margin-top: 4%;" class="container">
    <a href="../../Programa.php?Ruta=Producto-Index"><button style="position: relative;" class="btn btn-info">Regresar</button></a>

        <div class="row">
            <div class="col-md-12">
                <h1 align="center" >Lista de Categorias</h1>

                <table width="90%" id="ListaProducto" class="table table-hover" align="center">
                    <thead class="table-primary">

                        <tr align="center">
                            <td scope="col">Categoria</td>
                            <td scope="col">Responsable</td>
                            <td scope="col">Editar</td>
                            <td scope="col">ELiminar</td>

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
                                    <td><a href="?id=<?php echo $datos["ID_Categria"] ?>"><button class="btn btn-outline-info">Editar</button></a></td>
                                    <td><a href="?idEliminar=<?php echo $datos["ID_Categria"] ?>"><button class="btn btn-outline-danger">Eliminar</button></a></td>

                                </tr>
                            </center>
                        <?php
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>


        <div class="modal fade" id="EliminarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo $Mensage; ?>
                    </div>
                    <div class="modal-footer">
                        <form action="EliminarCategoria.php" method="POST">

                            <button type="submit" class="btn btn-primary">Seguro</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="Tables" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body MostrarTabla">

                        <form action="" method="post">
                            <input type="text" name="EditarCategoria" autocomplete="off" id="Usuario" class="form-control form-control-lg" value=" <?php echo $CategoriaNombre; ?>" placeholder="Categoria" />
                            <label class="form-label" for="EditarCategoria">Editar Categoria</label>



                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">EditarCategorias</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#ListaProducto').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            });
        });

        $(document).ready(function() {

            <?php echo $AbrirModal; ?>
        });

        $(document).on("click", "#mostart", function(e) {
            $("#Tables").modal("show");


        });
    </script>




    <script src="../../Datatable/datatables.min.js"></script>
    <script src="../../Datatable/dataTables.rowReorder.min.js"></script>
    <script src="../../Datatable/dataTables.responsive.min.js"></script>
    <script src="../../bootstrap5/js/bootstrap.min.js"></script>

    <script src="../../Modal.js"></script>
</body>

</html>