
<?php


require "conexion.php";

if (!empty($_POST)) {
    session_start();
    

$usuario = $_POST['Usuario'];
$clave = $_POST['Clave'];

$Existe = "SELECT COUNT(*) as buscar from Users where Users='$usuario' and pass='$clave' ";
$consulta = mysqli_query($con, $Existe);
$arrays = mysqli_fetch_array($consulta);


$DatosUsuarioRegistrado= "SELECT *  from Users where Users='$usuario' and pass='$clave'";
$ConsultaDeLosDatos=mysqli_query($con, $DatosUsuarioRegistrado);
$DatosObtenidos=mysqli_fetch_array($ConsultaDeLosDatos);


$_SESSION["Nom"]=$DatosObtenidos["Nombres"];
$_SESSION["Ape"]=$DatosObtenidos["Apellidos"];
$_SESSION["ID_User"]=$DatosObtenidos["ID_Usuario"];
$_SESSION["Foto"]=$DatosObtenidos["FotoPerfil"];

$IdTipo=$DatosObtenidos["ID_TipoUser"];
$idAtualizaraActivo=$_SESSION["ID_User"];
$Activo=$DatosObtenidos["Activo"];



if ($arrays['buscar'] > 0) {

    if ($Activo) {
        if ($IdTipo=1) {
            
            $Actualizar= "UPDATE Users SET Linea=1 WHERE Users.ID_Usuario=$idAtualizaraActivo";
            $MandarConsultaActualizar=mysqli_query($con, $Actualizar);
            header("location: Programa.php");
        }
        else{
            $Actualizar= "UPDATE Users SET Linea=1 WHERE Users.ID_Usuario=$idAtualizaraActivo";
            $MandarConsultaActualizar=mysqli_query($con, $Actualizar);
            header("location: ProgramaEmpleado.php");
        }
       
    }else{
        header("location: NoTeEncuentrasActivo.php");
    }
   
 


} else {

  
    header("location: index.php");
}
 

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logear</title>
</head>
<body>

   <form action="" method="POST">
    <input type="text" name="Usuario" placeholder="User...">
    <input type="text" name="Clave" placeholder="Clave...">
    <button type="submit">Entrar</button>


   </form>
    
</body>
</html>