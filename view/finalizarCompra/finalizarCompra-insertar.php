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
<html>
<meta charset="UTF-8">
<head>
<title>Infernum.sb</title>
<link href="../../view/css/carros.css" rel="stylesheet" />
<link rel="stylesheet" href="../../view/nav/nav.css">
</head>
<body>


<link rel="stylesheet" type="text/css" href="css/formulario.css">

<h1 class="Titulo">
    <?php echo $alm->IdPedido != null ? $alm->IdPedido : 'Finalizar Compra'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="indexCarro.php">Volver</a></li>

</ol>


<form id="frm-pedido" action="?c=Finalizar&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdPedido" value="<?php echo $alm->IdPedido; ?>" />

     <div class="nombre">
        <input  type="hidden" type="text" name="IdEmpleado" value="1" class="input" placeholder="Ingrese IdEmpleado"  />
    </div>   
    
    <div class="nombre">
        <input  type="text" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" class="input" placeholder="Ingrese IdCliente"  />
    </div>
    
    <div class="nombre">
        <input type="hidden" type="text" name="IdCompaniaEnvio" value="4" class="input" placeholder="Ingrese Compañia Envio"  />
    </div>

	<div class="nombre">
	<input type="hidden" type="text" name="FechaPedido" value="<?php $fechaActual = date('Y-m-d'); echo $fechaActual; ?>" class="input"   readonly />
    </div>
    
    <div class="nombre">
        <input type="hidden" type="date" name="FechaEnvio" value="<?php echo $alm->FechaEnvio; ?>" class="input" placeholder="Ingrese "  />
    </div>

    <div class="nombre">
        <input type="text" name="DireccionEntrega" value="<?php echo $alm->DireccionEntrega; ?>" class="input" placeholder="Ingrese DireccionEntrega " required="required" minlength="10" maxlength="255"/>
    </div>

    <div class="nombre">
        <input type="text"  name="TotalPedido" value=" <?php echo number_format($totprecio); ?>"  class="input" placeholder="Ingrese Total " readonly />
    </div>

    <div class="nombre" >
        <label  >Estado pedido:</label>
        <select  name="EstadoPedido" class="input">
			<option <?php echo $alm->EstadoPedido == 'Inactivo' ? 'selected' : ''; ?> value="Inactivo" class="input">Inactivo</option>
            <option <?php echo $alm->EstadoPedido == 'Activo' ? 'selected' : ''; ?> value="Activo" class="input">Activo</option>   
        </select>
    </div> 

    <div class="nombre">
        <input type="text" name="MetodoPago" value="<?php echo $alm->MetodoPago; ?>" class="input" placeholder="Ingrese Metodo Pago" required="required" />
    </div>





    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button class="button">Guardar</button>
    </div>
    </center>
</form>
</div>
<script>
    $(document).ready(function(){
        $("#frm-producto").submit(function(){
            return $(this).validate();
        });
    })
</script>








<td><?php echo $totcantidad; ?></td>
<td><?php echo "$ ".number_format($totprecio, 2); ?></td>
<td><?php echo $item["vai_pre"]; ?></td>


</body>
</html>