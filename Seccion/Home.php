<?php

session_start();
$foto = $_SESSION["Foto"];
$ID = $_SESSION["ID_User"];
$nombre = $_SESSION["Nom"];
$ape = $_SESSION["Ape"];
$section = $_GET['Ruta'] ?? 'home'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

</head>

<body>
   <center> <h1>Bienvenido <?php echo "$nombre $ape "; ?></h1></center>

    <div class="row">
        <div class="col-md-6">
            <form name="calculator" class="formcalculadora">
                <p>Haz algun calculo para ver el resultado.</p>
                <input type="textfield" name="ans" value="">
                <br>
                <input type="button" class="btn btn-primary" value="1" onClick="document.calculator.ans.value+='1'">
                <input type="button" class="btn btn-primary" value="2" onClick="document.calculator.ans.value+='2'">
                <input type="button" class="btn btn-primary" value="3" onClick="document.calculator.ans.value+='3'">
                <input type="button" class="btn btn-primary" value="+" onClick="document.calculator.ans.value+='+'">
                <br>
                <input type="button" class="btn btn-primary" value="4" onClick="document.calculator.ans.value+='4'">
                <input type="button" class="btn btn-primary" value="5" onClick="document.calculator.ans.value+='5'">
                <input type="button" class="btn btn-primary" value="6" onClick="document.calculator.ans.value+='6'">
                <input type="button" class="btn btn-primary" value="-" onClick="document.calculator.ans.value+='-'">
                <br>
                <input type="button" class="btn btn-primary" value="7" onClick="document.calculator.ans.value+='7'">
                <input type="button" class="btn btn-primary" value="8" onClick="document.calculator.ans.value+='8'">
                <input type="button" class="btn btn-primary" value="9" onClick="document.calculator.ans.value+='9'">
                <input type="button" class="btn btn-primary" value="*" onClick="document.calculator.ans.value+='*'">
                <br>
                <input type="button" class="btn btn-primary" value="0" onClick="document.calculator.ans.value+='0'">
                <input type="reset"  class="btn btn-primary" value="c">
                <input type="button" class="btn btn-primary" value="/" onClick="document.calculator.ans.value+='/'">
                <input type="button" class="btn btn-primary" value="=" onClick="document.calculator.ans.value=eval(document.calculator.ans.value)">
            </form>
        </div>
    </div>
    

</body>

</html>