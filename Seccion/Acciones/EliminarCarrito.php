<?php 
session_start();
require '../../conexion.php';


$ID_ProductoE=$_GET['IDE'];



$ConsultaELiminar="DELETE FROM `Tbl_Contenido_Carrito` WHERE `Tbl_Contenido_Carrito`.`ID_Con_Carrito` = $ID_ProductoE";
$EnviarConsulta=mysqli_query($con,$ConsultaELiminar);
header("location: ../../Programa.php?Ruta=Carrito");




?>