<?php
require 'funciones.php';
if(isset($_SESSION['id'])){
    header('Location: home.php');
}

$registration = new Registro();

if (isset($_POST['submit'])){
    $resultadoRegistro = $registration->registrarse(
        $_POST['nombreUsuario'],
        $_POST['nombreCompleto'],
        $_POST['correoElectronico'],
        $_POST['Contrasena'],
        $_POST['confirmContrasena']
    );
    if($resultadoRegistro == 1){
        echo"<script>alert('Registro Exitoso')</scritp>";
    }elseif ($resultadoRegistro == 10){
        echo"<script>alert('El Registro ya Existe')</scritp>";
    }elseif ($resultadoRegistro == 100){
        echo"<script>alert('Revise en Busca de Error')</scritp>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="si.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <div class="caja_inicio_sesion">
    <div class="titulo">
        <h1>Register</h1>
    </div>
    <div class="caja_inicio_sesion--formulario">
        <form action="" method="$_POST">
            <div class="caja_formulario--fields">
                 <input type="text" name="nombreUsuario" placeholder="Nombre de Usuario">       
                 <input type="text" name="nombreCompleto" placeholder="Nombre Completo">       
                 <input type="text" name="correoElectronico" placeholder="Correo Electronico">       
                 <input type="password" name="Contrasena">
                 <input type="password" name="confirmContraseña">  
            </div>
            <div class="caja_formulario--botones">
                <a href="index.php">Regresar</a>
                <button type="submit" name="submit">Registrarse</button>
            </div>
        </form>
    </div>
    </div>
</body>

</html>
