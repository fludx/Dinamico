<?php
require 'funciones.php';
if(isset($_SESSION['id'])){
    header('Location: home.php');
}

$iniciosesion = new Inicio_sesion();

    if (isset($_POST['submit'])){
        $result = $iniciosesion->IncioSesion(
        $_POST['nombreUsuario_Correo'],
        $_POST['contrasena']
        );

        if ($result == 1){
            $_SESSION['iniciosesion'] = true;
            $_SESSION['id'] = $iniciosesion->IdUsuario();
            header('Location: home.php');
        }
        else if ($result == 10){
            echo"<script>Alert('Contraseña Incorrecta')</script>";
        }
        else if ($result == 100){
            echo"<script>Alert('Usuario no Registrado')</script>";
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
    <title>Login</title>
</head>
<body>
    <div class="caja_inicio_sesion">
    <div class="titulo">
        <h1>Login</h1>
    </div>
    <div class="caja_inicio_sesion--formulario">
        <form action="" method="$_POST">
            <div class="caja_formulario--fields">
                 <input type="text" name="nombreUsuario_Correo" placeholder="Nombre de Usuario">       
                 <input type="password" name="contrasena">  
            </div>
            <div class="caja_formulario--botones">
                <button type="submit" name="submit">Ingresar</button>
                <a href="registro.php">Registrarse</a>
            </div>
        </form>
    </div>
    </div>
</body>

</html>
