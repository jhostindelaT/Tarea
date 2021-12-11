<?php 
session_start();
require '../../conexion.php';

$ID= $_SESSION['CategoriaEliminar'];

$ConsultaELiminar="DELETE FROM Categoria WHERE ID_Categria=$ID";
$EnviarConsulta=mysqli_query($con,$ConsultaELiminar);
header("location: EditarCategoriasProducto.php");



?>