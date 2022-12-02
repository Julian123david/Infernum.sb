
<?php

error_reporting(0);
?>

<?php
session_start();
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
        if(isset($_SESSION['nombredelusuario']))
            {
                $usuarioingresado = $_SESSION['nombredelusuario'];
            }
    ?>


<?php

$link = new PDO('mysql:host=localhost;dbname=proyecto', 'root', ''); // el campo vaciío es para la password. 

?>

<link rel="stylesheet" type="text/css" href="css/final.css">


<h1 class="Titulo">
    <?php echo $alm->IdPedido != null ? $alm->IdPedido : 'Resumen de la Compra'; ?>
</h1>

<div class="contenedor">



<form id="frm-total" action="?c=Total&a=Guardar" autocomplete="off" method="post" enctype="multipart/form-data" name="Pru">
    <input type="hidden" name="IdPedido" value="<?php echo $alm->IdPedido; ?>" />
<br>

    <?php foreach ($link->query("SELECT c.NombreCliente from Cliente c inner join Usuario u on  c.IdUsuario = u.IdUsuario where u.NombreUsuario ='$usuarioingresado' ") as $row){ ?> 
        <div class="nombre">
        <label class="label">Nombre:</label>
            <input size="10" type="text"  value="<?php echo $row['NombreCliente'] ?>" class="input" readonly />
        </div>

    <?php
        }
    ?>
    <?php foreach ($link->query('SELECT DireccionEntrega from Pedido order by idPedido desc limit 1;') as $row){ ?> 
        <div class="nombre">
        <label class="label">Dirección Entrega:</label>
            <input size="15" type="text"  value="<?php echo $row['DireccionEntrega'] ?>" class="input" readonly />
        </div>

    <?php
        }
    ?>

    <?php foreach ($link->query('SELECT TelefonoContacto from Pedido order by idPedido desc limit 1;') as $row){ ?> 
        <div class="nombre">
        <label class="label">Telefono Contacto:</label>
            <input size="15" type="text"  value="<?php echo $row['TelefonoContacto'] ?>" class="input" readonly />
        </div>

    <?php
        }
    ?>    

    <div class="nombre">
        <label class="label">Cantidad Produto:</label>
        <input  size="5" type="text" name="CantidadProducto" value="<?php echo $totcantidad; ?>" class="input" required="required" readonly/>
        <br>
        <label id="Error3" class="error" style="color:red"></label>
    </div>
    <div class="nombre">
        <input type="hidden" type="number" name="PrecioUnitario" value="<?php echo $item["vai_pre"]; ?>" class="input" required="required"  readonly/>
    </div>

	<div class="nombre">
        <label class="label">Descuento Pedido:</label>
        <input size="5" type="text" name="DecuentoPedido" value="0" class="input"   readonly/>
    </div>


        <div class="nombre">
        <label class="label">Total Pedido:</label>
            <input size="15" type="text"  value="<?php echo number_format($totprecio); ?>" class="input" readonly />
        </div>

  

    <?php foreach ($link->query('SELECT IdPedido from Pedido WHERE IdPedido=(SELECT max(IdPedido) FROM Pedido); ') as $row){ ?> 

	    <div class="nombre">
            <input type="hidden" type="number" name="IdPedido" value="<?php echo $row['IdPedido'] ?>" class="input" placeholder="Ingrese IdPedido" required="required" readonly />
        </div>

    <?php
	    }
    ?>
	<div class="nombre">
     
        <input type="hidden" type="number" name="cod" value="<?php echo $item['vai_cod'] ?>" class="input" placeholder="Ingrese idProducto" required="required" />

    </div>

    <br>

        <center><p>Muchas Gracias Por Su Compra!!</p></center>
<br>

    <hr/>
    <br>
    <center>
    <div class="botondiv">
        <button class="button" id="button" onmouseover="validar()">Finalizar</button>
    </div>
    </center>

    <script type="text/javascript">
            function validar(){
                var CantidadProducto = document.Pru.CantidadProducto.value;
      

                if(CantidadProducto.length > 1 ){
                    let num = CantidadProducto.length;
                    document.getElementById("Error3").innerText=`Debido a que su pedido super la cantidad de 10 productos, unos de nuestros empleados se contactara con usted - Infernum.sb `;
                } else {
                    document.getElementById("Error3").innerText="";
                }

  
                
            }
            </script>
</form>
</div>
<script>
    $(document).ready(function(){
        $("#frm-total").submit(function(){
            return $(this).validate();
        });
    })
</script>

<?php 
session_destroy();
?>