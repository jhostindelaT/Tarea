
<?php

    session_start();
    require "conexion.php";
    $ID=$_SESSION["ID_User"];

    $Actualizar= "UPDATE Users SET Linea=0 WHERE Users.ID_Usuario=$ID";
    $MandarConsultaActualizar=mysqli_query($con, $Actualizar);
    $_SESSION["Entro"]=null;
   
    header("location: ../index.php");
    exit();



?>
