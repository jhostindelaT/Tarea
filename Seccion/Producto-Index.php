<?php

session_start();
include '../conexion.php';
$agrego;

if (empty($_REQUEST)) {
	$mostrarmodal;
}
if (!empty($_POST['AgregarCategoria'])) {

	$Categoria = $_POST['AgregarCategoria'];
	$idUsuario = $_SESSION["ID_User"];

	$consultaInsert = "INSERT INTO Categoria( Categoria, ID_Usuario) VALUES ('$Categoria',$idUsuario)";
	$levarlaConsulra = mysqli_query($con, $consultaInsert);
	$Resultado = mysqli_fetch_array($levarlaConsulra);
}


?>



<?php require_once 'Producto.php'; ?>

<div class="Contenedorindex" class="CuerpoIndexProducto" style="margin-top: 2%;">


	<div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true" style="margin-bottom: 22px;">
		<div class="d-flex">
			<div class="toast-body">
				<p class="text">Recuerda que para agregar un producto antes tienes que agregar su categoria</p>
			</div>
			<button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>

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

					<form action="" method="post">

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

								<input type="text" name="AgregarCategoria" autocomplete="off" id="Usuario" class="form-control form-control-lg" placeholder="Categoria" />
								<label class="form-label" for="AgregarCategoria">Ingrese la nueva categoria</label>

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


<?php echo $Mensaje; ?>




<script type="text/javascript">
	//para las notificaciones




	$(document).ready(function() {
		$('#Lista').addClass('active');
		$('.toast').toast();
		$('#mostart').click();

	});

	$(document).on("click", "#mostart", function(e) {

		$('.toast').toast('show');
		$('.toast').toast({
			delay: 3000
		});

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