<?php
require_once '../controller/finalizar.controller.php';
?>	
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

				<?php
				$totcantidad += $item["txtcantidad"];
				$totprecio += ($item["vai_pre"]*$item["txtcantidad"]);
		}
		?>

		
  <?php
} else {
?>

<?php 
}
?>

<?php

$link = new PDO('mysql:host=localhost;dbname=proyecto', 'root', ''); // el campo vaciío es para la password. 

?>

<link rel="stylesheet" type="text/css" href="css/formulario.css">


<h1 class="Titulo">
    <?php echo $alm->IdPedido != null ? $alm->IdPedido : 'Nuevo Registro'; ?>
</h1>

<div class="Contenedor">

<ol class="Usuario">
<li><a class="Volver" href="IndexTotal.php">Volver Atras</a></li>
</ol>

<form id="frm-total" action="?c=Total&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdPedido" value="<?php echo $alm->IdPedido; ?>" />

    <div class="nombre">
        <input type="text" name="CantidadProducto" value="<?php echo $totcantidad; ?>" class="input" placeholder="Ingrese Metodo Pagos" required="required" readonly/>
    </div>

    <div class="nombre">
        <input type="number" name="PrecioUnitario" value="<?php echo $item["vai_pre"]; ?>" class="input" placeholder="Ingrese precio Unitario" required="required"  readonly/>
    </div>

	<div class="nombre">
        <input type="number" name="DecuentoPedido" value="10" class="input" placeholder="Ingrese Descuento" required="required"  readonly/>
    </div>

    <?php foreach ($link->query('SELECT IdPedido from Pedido WHERE IdPedido=(SELECT max(IdPedido) FROM Pedido); ') as $row){ ?> 

	<div class="nombre">
        <input type="number" name="IdPedido" value="<?php echo $row['IdPedido'] ?>" class="input" placeholder="Ingrese IdPedido" required="required" readonly />
    </div>

    <?php
	}
?>
	<div class="nombre">
        <input type="number" name="id" value="" class="input" placeholder="Ingrese Id Producto" required="required"  />
    </div>




    <hr/>
    <br>
    <center>
    <div class="botondiv">
        <button id="button">Guardar</button>
    </div>
    </center>
</form>
</div>
<script>
    $(document).ready(function(){
        $("#frm-total").submit(function(){
            return $(this).validate();
        });
    })
</script>