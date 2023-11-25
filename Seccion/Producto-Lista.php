<?php

$ConsultaProducto = "SELECT * FROM `Producto` WHERE  Disponible= 1";

$ListaProducto = mysqli_query($con, $ConsultaProducto);
?>



<?php require_once 'Producto.php'; ?>
<div style="margin-top: 4%;">
    <div class="row">
        <div class="col-md-12">
            <h1 align="center">Lista de Productos</h1>

            <table width="90%" id="ListaProducto" class="table table-hover" align="center">
                <thead class="table-primary">

                    <tr align="center">
                        <td scope="col"></td>
                        <td scope="col">Nombre Producto</td>
                        <td scope="col">Precio</td>
                        <td scope="col">unidades</td>
                        <td scope="col"></td>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($datos = $ListaProducto->fetch_array()) {
                    ?>

                        <tr>

                            <td><img src="data:image/jpg;base64,<?php echo base64_encode($datos["FotoDelProducto"]) ?>" width="70px;" height="70px;"></td>
                            <td><?php echo $datos["NombreProducto"] ?></td>
                            <td><?php echo $datos["Precio"] ?></td>
                            <td><?php echo $datos["UnidadesDisponibles"] ?></td>

                            <td><a href="Seccion/Producto-Detalles.php?id=<?php echo $datos["ID_Producto"] ?>"><button class="btn btn-outline-warning">Detalles</button></a></td>
                        
                          
                        </tr>
                    <?php
                    }

                    ?>
                <tfoot class="table table-hover">
                    <tr>
                    <td scope="col"></td>
                        <td scope="col">Nombre Producto</td>
                        <td scope="col">Precio</td>
                        <td scope="col">Unidades</td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>

                    </tr>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>


   


<script type="text/javascript">
	$(document).ready(function() {
		$('#Lista-Producto').addClass('active');
	});
</script>