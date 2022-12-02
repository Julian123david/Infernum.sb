<?php 
session_start();
$link = new PDO('mysql:host=localhost;dbname=proyecto', 'root', ''); // el campo vaciío es para la password. 
?>

<?php

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 3){
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
    <link rel="stylesheet" href="../view/css/cliente2.css">
    <title>Home Usuario</title>
</head>
<header >
        <nav class="navegacion">
            <ul class="menu0">
                <li ><a onclick="openNav()"><img class="logoMenu" src="img/menu.png"></a></li>
                <li><a href=""><img class="logo" src="img/logo2.png"></a></li>
                
            </ul>
            <ul class="menu3">
                <li><a class="logout" href="loginout.php">Cerrar Sesion</a></li>
            <li><a href="IndexCarro.php"><img class="logo3" src="img/carrito2.png"></a></li>
            </ul>
            <ul class="menu1">
                <li><a href="cliente.php">Home</a></li>
                <li><a href="ProductosCategoria.php">Ropa</a>
                    <ul class="submenu">
                        <li><a href="productosCompra/camisetas.php">Camisetas</a></li>
                        <li><a href="productosCompra/camisas.php">Camisas</a></li>
                        <li><a href="productosCompra/jeans.php">Jeans</a></li>
                        <li><a href="productosCompra/gorros.php">Gorros</a></li>
                    </ul>
                </li>
            </ul>
    </header> 
<body>
    <script src="js/barras.js"></script>
<script type="text/javascript">

</script>

<div class="barra" id="mySidenav">
    <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
    <br>
<a ><img class="userimg" src="img/persona.png"></img></a>
<p>Bienvenido <?php if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
	echo  $usuarioingresado ;
}?></p>

<a href="" class="enable"></a>
<?php foreach ($link->query("SELECT c.IdCliente, c.NombreCliente, c.IdUsuario, c.ApellidoCliente, c.DireccionCliente, c.TelefonoCliente, c.NumDocCliente, c.CorreoCliente from cliente c inner join usuario u on c.IdUsuario = u.IdUsuario where u.NombreUsuario = '$usuarioingresado' ") as $row){ ?> 

<a href="http://localhost/Infernum.sb/view/IndexCliente.php?c=Cliente&a=CrudE&IdCliente=<?php echo $row['IdCliente']?>">Mi Usuario</a>
<?php
        }
    ?>
<a href="IndexCarro.php">Carrito de Compras</a>

<a href="ProductosCategoria.php">Caetegorias</a>

<a href="" class="enable"></a>
<a href="loginout.php">Cerrar Sesión</a>
</div>

<div id="main" class="resto_pag">
    
    <div class="AdminAccionDiv">

    <?php foreach ($link->query("SELECT count(*) IdPedido FROM Pedido p inner join Cliente c on p.IdCliente = c.IdCliente inner join Usuario u on  c.IdUsuario = u.IdUsuario where u.NombreUsuario ='$usuarioingresado'; ") as $row){ ?> 

     <div class="AdminAccion">
         <a href="http://localhost/Infernum.sb/view/indexPedido.php?c=Pedido&a=Crud5"><h4>Historial de Pedios</h4>
            <br><p>haz hecho <?php echo $row['IdPedido'] ?> Pedidos este mes</p>
         </a>
     </div>

     <?php
        }
    ?>
     


    </div>
</div>
</body>
</html>