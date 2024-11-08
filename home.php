<?php
require 'funciones.php'

$select = new select();
if (isset($_SESSION['id'])){
    $user = $select -> SelectuserByUser($_SESSION['id']);
}else{
    header('Location; index.php')
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="cerrar.php">Cerrar Sesion</a>
</body>
</html>