<?php



require '../../conexion.php';
session_start();

$Usuario=$_SESSION["ID_User"];
$ID_Usuario=$Usuario["ID_Usuario"];


$ID_Producto=$_GET['Producto'];


$BuscarCarritoQuery= "SELECT COUNT(*) as buscar from Tbl_Carrito where Comprado = 0";
$Existe = mysqli_query($con, $BuscarCarritoQuery);
$arrays = mysqli_fetch_array($Existe);




if($arrays["buscar"] > 0){
    
    $selec="SELECT `ID_Carrito`as ID FROM `Tbl_Carrito` WHERE Comprado=0";
    $Result= mysqli_query($con,$selec);
    $ArrayID = mysqli_fetch_array($Result);
    $ID_Carrito=reset($ArrayID);
    $_SESSION["ID_Carrito"]=reset($ArrayID);

    echo "el id del carrito es-- ".$ID_Carrito . " --- ";

   $Insert= "INSERT INTO `Tbl_Contenido_Carrito` (`ID_Carrito`, `ID_Producto`) VALUES ( '$ID_Carrito', '$ID_Producto')";
    $MandarInsert=mysqli_query($con,$Insert);
    if($MandarInsert){
        header("location: ../../Programa.php?Ruta=Carrito");
    }
  



}
else
{
    $Query="INSERT INTO Tbl_Carrito(ID_Usuario,Comprado) VALUES ($ID_Usuario, 0)";
    $insert=mysqli_query($con,$Query);

    $selec="SELECT `ID_Carrito`as ID FROM `Tbl_Carrito` WHERE Comprado=0";
    $Result= mysqli_query($con,$selec);
    $ArrayID = mysqli_fetch_array($Result);
    $ID_Carrito=reset($ArrayID);
     $Insert= "INSERT INTO `Tbl_Contenido_Carrito` (`ID_Carrito`, `ID_Producto`) VALUES ( '$ID_Carrito', '$ID_Producto')";
    $MandarInsert=mysqli_query($con,$Insert);
}


echo $ID_Usuario . " Y " .  $ID_Producto;


/*
if (empty($_REQUEST['Producto'])) {
    //header("location: ../Empleado-Habilitar.php");
} else {

    
    if ($enviar) {
        header("location: ../../Programa.php?Ruta=Empleados-Lista");
    }
}
*/
?>