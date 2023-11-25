<?php

$consultaProducto = "SELECT *  from Tbl_Carrito inner join Tbl_Contenido_Carrito on Tbl_Carrito.ID_Carrito=Tbl_Contenido_Carrito.ID_Carrito INNER JOIN Producto on Tbl_Contenido_Carrito.ID_Producto=Producto.ID_Producto where Comprado=0";


$ResuladoProducto = mysqli_query($con, $consultaProducto);


$Totalquery ="SELECT SUM(Precio) AS Suma from Tbl_Carrito inner join Tbl_Contenido_Carrito on Tbl_Carrito.ID_Carrito=Tbl_Contenido_Carrito.ID_Carrito INNER JOIN Producto on Tbl_Contenido_Carrito.ID_Producto=Producto.ID_Producto where Comprado=0";

$result = mysqli_query($con, $Totalquery);
$row=mysqli_fetch_assoc($result);
$sum=$row['Suma'];



?>



    <?php require_once 'Producto.php'; ?>
    <div style="margin-top: 4%;">
        <div class="row">
            <div class="col-md-12">
                <h1 align="center">Carrito de compras</h1>
                <br>
                       <h3>El total por su compra es de:</h3> 
                       <br>
                       <h3><p class="text-decoration-underline"><?php echo $sum;?>C$</p></h3>

                       <a href="./Seccion/PDF.php"  target="_blank" rel="noopener"><button class="btn btn-outline-success">comprar</button></a>
                       <br>
                       <br>
                <table width="90%" id="Carrito" class="table table-hover" align="center">
                    <thead class="table-primary">

                        <tr align="center">
                            <td scope="col"></td>
                            <td scope="col">Producto</td>
                            <td scope="col"></td>
                            <td scope="col">Precio</td>
                            <td scope="col"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($datos = $ResuladoProducto->fetch_array()) {
                         
                            
                        ?>

                            <tr>
                              <h1><?php echo $var;?></h1>
                               <td><img src="data:image/jpg;base64,<?php echo base64_encode($datos["FotoDelProducto"]) ?>" width="70px;" height="70px;"></td>
                                <td><?php echo $datos["NombreProducto"] ?></td>
                                <td><?php echo $datos["Precio"] ?></td>
                                <td><a href="Seccion/Acciones/EliminarCarrito.php?IDE=<?php echo $datos["ID_Con_Carrito"] ?>"><button class="btn btn-outline-danger">Eliminar</button></a></td>



                            </tr>
                        <?php
                            
                        }

                        ?>
                    <tfoot class="table table-hover" >
                        <tr>
                        <td scope="col"></td>

                        <td scope="col">Producto</td>
                            <td scope="col"></td>
                            <td scope="col">Precio</td>
                            <td scope="col"></td>
                            <td scope="col"></td>

                           
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>



    </div>



<script type="text/javascript">
	$(document).ready(function() {
		$('#Carrito').addClass('active');
	});
</script>