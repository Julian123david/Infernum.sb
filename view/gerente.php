<?php 

$link = new PDO('mysql:host=localhost;dbname=proyecto', 'root', ''); // el campo vaciío es para la password. 

session_start();
if(isset($_SESSION['IdUsuario']))
{
	$usuarioingresados = $_SESSION['IdUsuario'];
	echo  $usuarioingresados;
}
?>

<?php

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: login.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Infernum.sb</title>
    <link rel="stylesheet" href="../view/nav/navGerente.css">
    <link rel="stylesheet" href="../view/css/gerente.css">


<header style="flex: inline;">
        <nav class="navegacion">
            
            <ul class="menu0">
                <li ><a onclick="openNav()"><img class="logoMenu" src="img/menu.png"></a></li>
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
</head>
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
}?> </p>

<a href="" class="enable"></a>

<a href="IndexUsuario.php">Gestionar Usuarios</a>

<a href="IndexCliente.php">Gestionar Clientes</a>

<a href="IndexEmpleado.php">Gestionar Empleados</a>

<a href="IndexRol.php">Gestionar Rol</a>

<a href="IndexProducto.php">Gestionar Producto</a>

<a href="IndexCategoria.php">Gestionar Categoria</a>


<a href="IndexPedido.php">Gestionar Pedido</a>
<a href="" class="enable"></a>
<a href="loginout.php">Cerrar Sesión</a>
</div>

<div id="main" class="resto_pag">
    
    <div class="AdminAccionDiv">

 <?php foreach ($link->query("SELECT count(IdPedido) IdPedido from Pedido; ") as $row){ ?> 
     <div class="AdminAccion">
         <a href="#"><h4>Ventas Generales</h4>
            <br><p>Se han hecho <?php echo $row['IdPedido'] ?> ventas</p>
         </a>
     </div>

     <?php
        }
    ?>


<?php foreach ($link->query("SELECT count(IdCliente) IdCliente from Cliente; ") as $row){ ?> 

     <div class="AdminAccion">
         <a href="IndexUsuario.php"><h4>Usuarios Registrados</h4>
            <br><p>Se han inscrito <?php echo $row['IdCliente'] ?> nuevos usuarios </p>
         </a>
     </div>


     <?php
        }
    ?>
    


     <div class="AdminAccion">
         <a href="http://localhost/Infernum.sb/view/IndexDetalles.php"><h4>Reportes</h4>
            <br><p>Puedes Generar Reportes aqui</p>
         </a>
     </div>

    </div>
</div>

</body>
</html>