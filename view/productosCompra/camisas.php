<?php
session_start();

require_once("../../model/clase.php");

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
	echo "<script> alert('Gracias por su compra - VaidrollTeam');window.location= 'index.php' </script>";
		unset($_SESSION["items_carrito"]);
	
	break;	
}
}
?>
<html>
<meta charset="UTF-8">
<head>
<title>Infernum.sb</title>
<link href="../../view/css/productos.css" rel="stylesheet" />
<link rel="stylesheet" href="../../view/nav/navgerente.css">
</head>
<body>
    
<header >
        <nav class="navegacion">
            <ul class="menu0">
                <li><a href=""><img class="logo" src="../img/logo2.png"></a></li>
                
            </ul>
            <ul class="menu3">
            <li><a href="http://localhost/Infernum.sb/view/indexCarro.php"><img class="logo3" src="../img/carrito2.png"></a></li>
            </ul>
            <ul class="menu1">
                <li><a href="../cliente.php">Home</a></li>
                <li><a href="../ProductosCategoria.php">Ropa</a>
                    <ul class="submenu">
                        <li><a href="camisetas.php">Camisetas</a></li>
                        <li><a href="camisas.php">Camisas</a></li>
                        <li><a href="jeans.php">Jeans</a></li>
                        <li><a href="gorros.php">Gorros</a></li>
                    </ul>
                </li>
            </ul>
    </header>
<div>
<div><h2>Productos</h2></div>
<div class="contenedor_general">
	<?php
	/*VaidrollTeam*/
	$productos_array = $usar_db->vaiquery("SELECT  C.idCategoria, p.img, p.cod, p.nom, p.pre, p.EstadoProducto FROM Producto p  inner join Categoria c  on p.idCategoria = c.idCategoria WHERE EstadoProducto = '1' and c.IdCategoria= 2 ORDER BY cod ASC;
	");
	if (!empty($productos_array)) 
	{ 
		foreach($productos_array as $i=>$k)
		{
	?>
		<div class="contenedor_productos">
			<form method="POST" action="../indexCarro.php?accion=agregar&cod=
			<?php echo $productos_array[$i]["cod"]; ?>">
			<div><img src="<?php echo $productos_array[$i]["img"]; ?>"></div>
			<div>
			<div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["nom"]; ?></div>
			<div style="padding-top:10px;font-size:20px;"><?php echo "$".$productos_array[$i]["pre"]; ?></div>
            <div><input type="text" name="txtcantidad" value="1" size="2" maxlength="1" /><input type="submit" value="Agregar" />
			</div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</body>