<?php
session_start();

require_once("../model/clase.php");

$usar_db = new DBControl();

if(!empty($_GET["accion"])) 
{
switch($_GET["accion"]) 
{
	case "agregar":
		if(!empty($_POST["txtcantidad"])) 
		{
			$codproducto = $usar_db->vaiQuery("SELECT * FROM Producto WHERE cod='" . $_GET["cod"] . "'");
			$items_array = array($codproducto[0]["cod"]=>array(
			'vai_nom'		=>$codproducto[0]["nom"], 
			'vai_cod'		=>$codproducto[0]["cod"], 
			'txtcantidad'	=>$_POST["txtcantidad"], 
			'vai_pre'		=>$codproducto[0]["pre"], 
			'vai_img'		=>$codproducto[0]["img"]
			));
			
			if(!empty($_SESSION["items_carrito"])) 
			{
				if(in_array($codproducto[0]["cod"],
				array_keys($_SESSION["items_carrito"]))) 
				{
					foreach($_SESSION["items_carrito"] as $i => $j) 
					{
							if($codproducto[0]["cod"] == $i) 
							{
								if(empty($_SESSION["items_carrito"][$i]["txtcantidad"])) 
								{
									$_SESSION["items_carrito"][$i]["txtcantidad"] = 0;
								}
								$_SESSION["items_carrito"][$i]["txtcantidad"] += $_POST["txtcantidad"];
							}
					}
				} else 
				{
					$_SESSION["items_carrito"] = array_merge($_SESSION["items_carrito"],$items_array);
				}
			} 
			else 
			{
				$_SESSION["items_carrito"] = $items_array;
			}
		}
	break;
	case "eliminar":
		if(!empty($_SESSION["items_carrito"])) 
		{
			foreach($_SESSION["items_carrito"] as $i => $j) 
			{
				if($_GET["eliminarcode"] == $i)
				{
					unset($_SESSION["items_carrito"][$i]);	
				}			
				if(empty($_SESSION["items_carrito"]))
				{
					unset($_SESSION["items_carrito"]);
				}
			}
		}
	break;
	case "vacio":
		unset($_SESSION["items_carrito"]);
	break;	
	case "pagar":
	echo "<script> alert('Gracias por su compra - Infernum.sb');window.location= 'indexCarro.php' </script>";
		unset($_SESSION["items_carrito"]);
	
	break;	
}
}
?>
<html>
<meta charset="UTF-8">
<head>
<title>Infernum.sb</title>
<link href="../view/css/carros.css" rel="stylesheet" />
<link rel="stylesheet" href="../view/nav/nav.css">
</head>
<body>
<header>
	<nav class="menu1">
		<ul class="ul">
			<li><a href=""><img class="logo" src="img/logo.png"></a></li>
			<li><a href="http://localhost/intento/prueba.php" ><p>HOME</p></a></li>
			<li><a href="http://localhost/intento/view/productos.php" ><p>ROPA</p></a></li>
			<li><a href="" ><p>NOSOTROS</p></a></li>
			<!--<li><a href=""><img class="logo2" src="img/buscar.png"></a></li>-->
		</ul>
		<ul class="der">
			<li><a href=""><img class="logo2" src="img/buscar.png"></a></li>
			<li><a href=""><img class="logo3" src="img/persona.png"></a></li>
			<li><a href=""><img class="logo3" src="img/carrito.png"></a></li>
		</ul>
	</nav>
</header>

<div align="center"><h1>Infernum.sb - Carrito de compras</h1></div>
<div>
<div><h2>Lista de productos a comprar.</h2></div>


<?php
if(isset($_SESSION["items_carrito"]))
{
    $totcantidad = 0;
    $totprecio = 0;
?>	

<table class="tabla">
<tr class="tr">
<th style="width:30%">Descripción</th>
<th style="width:10%">Código</th>
<th style="width:10%">Cantidad</th>
<th style="width:10%">Precio x unidad</th>
<th style="width:10%">Precio</th>
<th style="width:10%"><a href="indexCarro.php?accion=vacio">Limpiar</a></th>
</tr>	
<?php		
    foreach ($_SESSION["items_carrito"] as $item){
        $item_price = $item["txtcantidad"]*$item["vai_pre"];
		?>
				<tr class="tr2">
				<td><img src="<?php echo $item["vai_img"]; ?>" class="imagen_peque" /><?php echo $item["vai_nom"]; ?></td>
				<td><?php echo $item["vai_cod"]; ?></td>
				<td><?php echo $item["txtcantidad"]; ?></td>
				<td><?php echo "$ ".$item["vai_pre"]; ?></td>
				<td><?php echo "$ ". number_format($item_price,2); ?></td>
				<td><a href="indexCarro.php?accion=eliminar&eliminarcode=<?php echo $item["vai_cod"]; ?>"> <img class="delete" src="img/delete.png"></a></td>
				</tr>
				<?php
				$totcantidad += $item["txtcantidad"];
				$totprecio += ($item["vai_pre"]*$item["txtcantidad"]);
		}
		?>

<tr style="background-color:#f3f3f3">
<td colspan="2"><b>Total de productos:</b></td>
<td><b><?php echo $totcantidad; ?></b></td>
<td colspan="2"><strong><?php echo "$ ".number_format($totprecio, 2); ?></strong></td>
<td><a href="indexCarro.php?accion=pagar">Pagar</a></td>
</tr>

</table>		
  <?php
} else {
?>

<div align="center"><h3>¡El carrito esta vacío!</h3></div>

<?php 
}
?>
</div>
<br><br>
 <a href="productos.php"><input type="submit" value="Seguir comprando" /></a>

</body>
</html>