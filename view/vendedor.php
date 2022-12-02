<?php
session_start();
if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 2){
        header('location: login.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/nav/navGerente.css">
    <link rel="stylesheet" href="../view/css/home.css">
    <title>Vendedor</title>
</head>
<header style="flex: inline;">
        <nav class="navegacion">
            
            <ul class="menu0">
                <li><a href=""><img class="logo" src="img/logo2.png"></a></li>
                
            </ul>
            <ul class="menu3">
                <li><a class="logout" href="loginout.php">Cerrar Sesion</a></li>
            </ul>
            <ul class="menu1">
                <li><a href="gerente.php">Home</a></li>
                <li><a href="ProductosCategoria.php">Acciones</a>
                    <ul class="submenu">
                        <li><a href="indexPedido.php">Pedidos</a></li>
                        <li><a href="indexCategoria.php">Categorias</a></li>
                        <li><a href="indexProducto.php">Productos</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
<br><br>
<body>

    <h2>¿Que deseas hacer?</h2>
    <div class="container">
    <a class="link" href="indexPedido.php">Pedidos</a><br>
    <a class="link" href="indexCategoria.php">Categorias</a><br>
    <a class="link" href="indexProducto.php">Productos</a><br>
    <a class="link" href="">Mi usuario</a>
    </div><br>
    <div class="divImage">
    	<img src="img/vendedor.png">
    </div>
</body>
</html>