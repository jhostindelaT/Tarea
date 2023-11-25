<?php
session_start();
require("../conexion.php");
require('../imprimirpdf/fpdf.php');

$ID = $_SESSION["ID_User"];


$ConsultarTabla = "SELECT *  from Tbl_Carrito inner join Tbl_Contenido_Carrito on Tbl_Carrito.ID_Carrito=Tbl_Contenido_Carrito.ID_Carrito INNER JOIN Producto on Tbl_Contenido_Carrito.ID_Producto=Producto.ID_Producto where Comprado=0 and ID_Usuario=$ID";
$Resultado = mysqli_query($con, $ConsultarTabla);


$Totalquery ="SELECT SUM(Precio) AS TOTAL from Tbl_Carrito inner join Tbl_Contenido_Carrito on Tbl_Carrito.ID_Carrito=Tbl_Contenido_Carrito.ID_Carrito INNER JOIN Producto on Tbl_Contenido_Carrito.ID_Producto=Producto.ID_Producto where Comprado=0";

$result = mysqli_query($con, $Totalquery);
$row=mysqli_fetch_assoc($result);
$sum=$row['TOTAL'];





$pdf  = new FPDF();  
$pdf ->AddPage();
$pdf ->SetFont('Arial',"",10);

$pdf->Cell(105,20,"Nombre",1,0,'C',0);
$pdf->Cell(20,20,"Precio",1,1,'C',0);


while ($datos = $Resultado->fetch_array()) {
    $pdf->Cell(105,20,$datos["NombreProducto"],1,0,'C',0);
    $pdf->Cell(20,20,$datos["Precio"],1,1,'C',0);
}

$pdf->Cell(105,20,"TOTAL",1,0,'C',0);
$pdf->Cell(20,20,$sum,1,1,'C',0);

$pdf ->Output();


?>