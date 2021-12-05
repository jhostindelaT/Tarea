<?php


session_start();

require '../../conexion.php';
session_start();

if (empty($_REQUEST['Eliminar'])) {
    header("location: ../Empleado-Habilitar.php");
} else {

    $IDHabilitar = $_REQUEST['Eliminar'];
    $ConsultaHabilitar = "UPDATE Users SET Activo = 0  WHERE ID_Usuario = $IDHabilitar ";
    $enviar = mysqli_query($con, $ConsultaHabilitar);
    $habilitado = mysqli_fetch_array($enviar);

    if ($enviar) {
        header("location: ../../Programa.php?Ruta=Empleados-Lista");
    }
}
?>