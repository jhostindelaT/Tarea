<?php

$ConsultaEMpleado = "SELECT * FROM `Users` WHERE ID_TipoUser=2 and Activo=1;";

$ListaEmpleado = mysqli_query($con, $ConsultaEMpleado);
?>



<?php require_once 'Empleados.php'; ?>
<div style="margin-top: 4%;">
    <div class="row">
        <div class="col-md-12">
            <h1 align="center">Lista de empleados</h1>

            <table width="90%" id="ListaEmpleados" class="table table-hover" align="center">
                <thead class="table-primary">

                    <tr align="center">
                        <td scope="col">Usuario</td>
                        <td scope="col">Nombres</td>
                        <td scope="col">Apellidos</td>
                        <td scope="col">Edad</td>
                        <td scope="col">Activo</td>
                        <td scope="col">Linea</td>
                        <td scope="col">Cedula</td>
                        <td scope="col">NumeroDeTelefono</td>
                        <td scope="col">Eliminar</td>
                        <td scope="col">Actualizar</td>
                        <td scope="col">Detalles</td>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($datos = $ListaEmpleado->fetch_array()) {
                    ?>

                        <tr>
                            <td><?php echo $datos["Users"] ?></td>
                            <td><?php echo $datos["Nombres"] ?></td>
                            <td><?php echo $datos["Apellidos"] ?></td>
                            <td><?php echo $datos["Edad"] ?></td>
                            <td>Esta Activo</td>
                            <td><?php echo $datos["Linea"] ?></td>
                            <td><?php echo $datos["Cedula"] ?></td>
                            <td><?php echo $datos["NumeroDeTelefono"] ?></td>

                            <td><a href="Seccion/Empleados-Eliminar.php?id=<?php echo $datos["ID_Usuario"] ?>"><button onclick="Alerta();" class="btn btn-outline-danger">Eliminar</button></a></td>
                            <td><a href="Seccion/Empleado-Editar.php?id=<?php echo $datos["ID_Usuario"] ?>"><button class="btn btn-outline-warning">Actualizar</button></a></td>
                            <td><a href="Seccion/Empleado-Detalles.php?id=<?php echo $datos["ID_Usuario"] ?>""><button class=" btn btn-outline-primary">Detalles</button></a></td>
                          
                        </tr>
                    <?php
                    }

                    ?>
                <tfoot class="table table-hover">
                    <tr>
                        <td scope="col">Usuario</td>
                        <td scope="col">Nombres</td>
                        <td scope="col">Apellidos</td>
                        <td scope="col">Edad</td>
                        <td scope="col">Activo</td>
                        <td scope="col">Linea</td>
                        <td scope="col">Cedula</td>
                        <td scope="col">NumeroDeTelefono</td>
                        <td scope="col">Eliminar</td>
                        <td scope="col">Actualizar</td>
                        <td scope="col">Detalles</td>
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
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('#Lista-Empleado').addClass('active');
	});
</script>