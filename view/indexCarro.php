
<?php
error_reporting(0);

session_start();

if(!isset($_SESSION['rol'])){
	header('location: loginCarro.php');
}else{
	if($_SESSION['rol'] != 3){
		header('location: loginCarro.php');
	}
}

?>
<?php

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
	
}

?>
<?php
require_once '../controller/finalizar.controller.php';

?>	




<html>
<meta charset="UTF-8">
<head>
<title>Infernum.sb</title>
<link href="../view/css/carros.css" rel="stylesheet" />
<link rel="stylesheet" href="nav/navgerente.css">

</head>
<body>
<header >
        <nav class="navegacion">
            <ul class="menu0">
                <li><a href=""><img class="logo" src="img/logo2.png"></a></li>
                
            </ul>
            <ul class="menu3">
            <li><a href="IndexCarro.php"><img class="logo3" src="img/carrito2.png"></a></li>
            </ul>
            <ul class="menu1">
                <li><a href="../prueba.php">Home</a></li>
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
<br>
<div align="center" ><h1>Infernum.sb - Carrito de compras</h1></div>
<br><br>
<div>
<div><h2>Lista de productos a comprar.</h2></div>
 <div class="linea">
<hr>
 </div>

 <div id="contendedor">

<?php
if(isset($_SESSION["items_carrito"]))
{
    $totcantidad = 0;
    $totprecio = 0;
?>	


<?php		
    foreach ($_SESSION["items_carrito"] as $item){
        $item_price = $item["txtcantidad"]*$item["vai_pre"];
		?>
					<div >
				<img src="<?php echo $item["vai_img"]; ?>" class="imagen" />
			</div>
			<br>
				<p class="nombreProducto"><?php echo $item["vai_nom"]; ?></p>
				<br><br>
				<p class="totalProducto"><?php echo "$ ". number_format($item_price,2); ?></p>
				<br><br>
				<div id="cantidad"> 
				<input  name="txtcantidad" type="text" id="cantidad" value="<?php echo $item["txtcantidad"]; ?>" style=" text-align: center;" value="1" size="2" readonly>
</div>
	<br><br><br>
	<td>
				<a href="indexCarro.php?accion=eliminar&eliminarcode=<?php echo $item["vai_cod"]?>"> <img class="delete" src="img/delete.png"></a>
	</td>			
				<br><br>
				<hr>
				<?php
				$totcantidad += $item["txtcantidad"];
				$totprecio += ($item["vai_pre"]*$item["txtcantidad"]);
		}
		?>
</div>		
<br><br>

<div id="lado">
	<div id="conte">
		
<p class="tituloTotal"> <strong> Total Carrito</strong></p><br>
<p>SubTotal: <?php  echo "$ ".number_format($totprecio); ?> </p><br>

<p>Cantidad Total: <?php echo $totcantidad; ?></p><br>

<p>Total: <?php  echo "$ ".number_format($totprecio); ?></p>
<br>
<hr><br>
<center>
<button><a href="http://localhost/Infernum.sb/view/indexFinalizar.php?c=Finalizar&a=Crud1">FINALIZAR COMPRA</a></button>
<br><br>
<button><a href="indexCarro.php?accion=vacio">Limpiar Carro</a></button>

</center>
</div>
</div>	
  <?php
} else {
?>
<br><br>
<div align="center"><h3>¡El carrito esta vacío!</h3></div>

<?php 
}
?>
</div>
<br><br>

</body>
</html>