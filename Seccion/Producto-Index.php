<?php

session_start();
include '../conexion.php';
header("location: Seccion/Producto.php ");

if (!empty($_POST['AgregarCategoria'])) {
	
}else {
	header("location: si.php");

}



$ConsultaCategoria = "SELECT  ID_Categria,Categoria,Nombres as Nombre, Apellidos AS Apellido FROM Categoria INNER JOIN Users ON Categoria.ID_Usuario=Users.ID_Usuario";
$MandarConsulta = mysqli_query($con, $ConsultaCategoria);


?>



<?php require_once 'Producto.php'; ?>

<div class="Contenedorindex" class="CuerpoIndexProducto" style="margin-top: 2%;">

	<div class="botones">
		<button type="button" id="Categoria" class="btn btn-primary">Agregar Categoria</button>
		<button type="button" id="AgregarProductoNuevo" class="btn btn-primary">Agregar Producto</button>
		<button type="button" id="ListaCategoria" class="btn btn-primary">MostarCategorias</button>


	</div>

	<form action="" method="post">
		<select name="" id="">
			<option value="si">si</option>
			<option value="si">no</option>

			<option value="si">Talves</option>

		</select>
	</form>




	<div class="modal fade " id="CategoriaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Categoria</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<form method="POST">

						<input type="text" name="AgregarCategoria" autocomplete="off" id="Usuario" class="form-control form-control-lg" placeholder="Categoria" />
						<label class="form-label" for="AgregarCategoria">Ingrese la nueva categoria</label>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Guardar Categoria</button>
					</form>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="MostrarCategorias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body MostrarTabla">

				</div>
				<div class="modal-footer">
					<a href="Seccion/Acciones/EditarCategoriasProducto.php"><button type="submit" class="btn btn-primary">EditarCategorias</button></a>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

				</div>
			</div>
		</div>
	</div>


	<div class="modal fade " id="AgregarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Categoria</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<form action="" method="post">

						<div class="row">

							<div class="col-md-6">

								<input type="text" name="NombreProducto" autocomplete="off" id="Producto" class="form-control form-control-lg" placeholder="Nombre Producto..." />
								<label class="form-label" for="NombreProducto">Ingrese el nombre del producto</label>

								<input type="text" name="CodigoDelProducto" autocomplete="off" id="CodigoP" class="form-control form-control-lg" placeholder="Codigo Del Producto..." />
								<label class="form-label" for="CodigoDelProducto">Ingrese el codigo del producto</label>

								<input type="text" name="CantidadDelProducto" autocomplete="off" id="Cantidad" class="form-control form-control-lg" placeholder="Cantidad Del Producto..." />
								<label class="form-label" for="CantidadDelProducto">Ingrese la cantidad del producto</label>

							</div>
							<div class="col-md-6">
								<input type="text" name="fecha" autocomplete="off" id="Usuario" class="form-control form-control-lg" placeholder="Categoria" />
								<label class="form-label" for="fecha">Ingrese la Fecha de expiracion</label>

								<input type="text" name="PCompra" autocomplete="off" id="Usuario" class="form-control form-control-lg" placeholder="Categoria" />
								<label class="form-label" for="PCompra">Ingrese el precio compra</label>

								<input type="text" name="PVenta" autocomplete="off" id="Usuario" class="form-control form-control-lg" placeholder="Categoria" />
								<label class="form-label" for="PVenta">Ingrese el precio venta </label>

							</div>
							<div class="row">
								<div class="col-md-12">
									<select class="form-control form-control-lg" name="CategoriaSelect">
										<?php
										while ($datos = $MandarConsulta->fetch_array()) {
										?>
											<option value="<?php echo $datos["ID_Categria"] ?>"><?php echo $datos["Categoria"] ?></option>

										<?php
										}

										?>
									</select>
								</div>
							</div>
						</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Guardar Categoria</button>
					</form>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

				</div>
			</div>
		</div>
	</div>
</div>
<button id="mostart" style="display: none;">click me</button>







<script type="text/javascript">
	//para las notificaciones




	$(document).ready(function() {
		$('#Lista').addClass('active');
	

	});



	$(document).on("click", "#Categoria", function(e) {

		$("#CategoriaModal").modal("show");

	});

	$(document).on("click", "#AgregarProductoNuevo", function(e) {

		$("#AgregarProducto").modal("show");

	});
	$(document).on("click", "#ListaCategoria", function(e) {

		$("#MostrarCategorias").modal("show");
		$('.MostrarTabla').load('Vistas/Producto/ListaDeCategorias.php');

	});
</script>