<?php
session_start();

require '../../conexion.php';

if (empty($_REQUEST['Habilitar'])) {
    header("location: ../Empleado-Habilitar.php");
} else {

    $IDHabilitar = $_REQUEST['Habilitar'];
    $ConsultaHabilitar = "UPDATE Users SET Activo = 1  WHERE ID_Usuario = $IDHabilitar ";
    $enviar = mysqli_query($con, $ConsultaHabilitar);
    $habilitado = mysqli_fetch_array($enviar);

    if ($enviar) {
        header("location: ../../Programa.php?Ruta=Empleados-solicitud");
    }
}