<?php

error_reporting(0);
?>


<?php

$link = new PDO('mysql:host=localhost;dbname=proyecto', 'root', ''); // el campo vaciío es para la password. 

?>

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
<style>
    .label{
    float: left; 
    margin-left: 10%;
    margin-bottom: -70px;
    font-family: Verdana;
}

.error{
    display:none;
	width: fit-content;
    margin-top:-20px;
	color: red;
	font-weight: bold;
    text-align: center;
    padding: 3px;

}
</style>
</head>
<body>


<link rel="stylesheet" type="text/css" href="css/finalizar.css">

<h1 class="Titulo">
    <?php echo $alm->IdPedido != null ? $alm->IdPedido : 'Finalizar Compra'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">

</ol>
<br>

<div class="lado">
 
<div class="de">
    <p>DETALLES DE PEDIDO</p>
</div>
<br>
<div class="nota">
    <p>Nota: Nuestros tiempos de entrega son de 5 a 8 dias hábiles</p>
</div>

<form  onsubmit="return validacion()" id="frm-pedido" action="?c=Pedido&a=Guardar" method="post" autocomplete="off"  enctype="multipart/form-data">
    <input type="hidden" name="IdPedido" value="<?php echo $alm->IdPedido; ?>" />

     <div class="nombre">
        <input  type="hidden" type="text" name="IdEmpleado" value="1" class="input" placeholder="Ingrese IdEmpleado"  />
    </div>   
    
    <?php 
        if(isset($_SESSION['nombredelusuario']))
            {
                $usuarioingresado = $_SESSION['nombredelusuario'];
            }
    ?>

    <?php foreach ($link->query("SELECT c.IdCliente from Cliente c inner join Usuario u on  c.IdUsuario = u.IdUsuario where u.NombreUsuario ='$usuarioingresado'; ") as $row){ ?> 
    <div class="nombre">
        <input type="hidden" type="text" name="IdCliente" value="<?php echo $row['IdCliente'] ?>" class="input" placeholder="Ingrese IdCliente"  />
    </div>

    <?php
	    }
    ?>
    
    <div class="nombre">
        <input type="hidden" type="text" name="IdCompaniaEnvio" value="4" class="input" placeholder="Ingrese Compañia Envio"  />
    </div>

	<div class="nombre">
    <input type="hidden" type="text"  name="FechaPedido" value="<?php echo date("Y-m-d");?>" class="input" placeholder="Ingrese "  />
    </div>
    
    <div class="nombre">
        <input type="hidden" type="date" name="FechaEnvio" value="<?php echo $alm->FechaEnvio; ?>" class="input" placeholder="Ingrese "  />
    </div>
<br>
    <div class="nombre">
        Direccion de Entrega*
        <br>
    <input id="direccion" type="text" name="DireccionEntrega" value="<?php echo $alm->DireccionEntrega; ?>" class="input" placeholder="Ingrese Direccion Entrega " />
        <br>
        <span class="error" id="errorDireccion"></span>
    </div>
<br>

<div class="nombre">
    Telefono de Contacto*
    <br>
        <input id="telefono" type="text" name="TelefonoContacto" value="" class="input" placeholder="Ingrese Telefono de Contacto " />
        <br>
        <span class="error" id="errorTelefono"></span>
    </div>
<br>

    <div class="nombre">
        Total*
        <br>
        <input type="text"  name="TotalPedido" value=" <?php echo number_format($totprecio); ?>"  class="input" readonly />
    </div>


<br>
    <div class="nombre">
        Metodo de Pago*
        <br>
        <input type="text" name="MetodoPago" value="Efectivo" class="input" placeholder="Ingrese Metodo Pago" required="required" readonly/>
    </div>

<br>

    <hr/>
    <br>
    </div>
<br>
    <div class="otro">
<br>
    <p>TU PEDIDO</p>

<br>
        <hr>    
        <p>Producto</p>

    <p class="nombreProducto"><?php echo $item["vai_nom"]; ?></p>

        <hr>
        
    <p>Cantidad</p>
       <p><?php echo $totcantidad; ?></p> 
            <hr>
    <p>Total</p>
        <p><?php echo "$ ".number_format($totprecio, 2); ?></p>
<hr>
<br>
        <center>
            <button id="button" onmouseover="validacion()" class="button">Realizar el Pedido</button>
        </center>
    </div>
    



    <div class="nombre" >
        <select  name="EstadoPedido" class="input"  style="visibility:hidden">
            <option <?php echo $alm->EstadoPedido == '' ? 'selected' : ''; ?> value="" class="input"></option>
			<option <?php echo $alm->EstadoPedido == 'Inactivo' ? 'selected' : ''; ?> value="Inactivo" class="input">Inactivo</option>
            <option <?php echo $alm->EstadoPedido == 'Activo' ? 'selected' : ''; ?> value="Activo" class="input">Activo</option>   
        </select>
    </div> 
</form>
</div>
<script>
 function validacion(){
          //Direccion
          valor = document.getElementById("direccion").value;
    if( valor == null || valor.length == 0 ) {
        document.getElementById("errorDireccion").innerHTML="Por Favor digite la dirección";
        document.getElementById("errorDireccion").style.display='block';
    return false;
    }
        document.getElementById("errorDireccion").innerHTML="";
        document.getElementById("errorDireccion").style.display='none';

     //Verificar si el campo password es menor a 5
     valor = document.getElementById("direccion").value;
    if( valor < 5 || valor.length < 5) {
        document.getElementById("errorDireccion").innerHTML="Minimo 5 caracteres, tienes " +valor.length;
        document.getElementById("errorDireccion").style.display='block';
    return false;
    }
        document.getElementById("errorDireccion").innerHTML="";
        document.getElementById("errorDireccion").style.display='none';  
  

        //Telefono
    valor = document.getElementById("telefono").value;
    if( valor == null || valor.length == 0 ) {
        document.getElementById("errorTelefono").innerHTML="Por Favor digite el telefono";
        document.getElementById("errorTelefono").style.display='block';
    return false;
    }
        document.getElementById("errorTelefono").innerHTML="";
        document.getElementById("errorTelefono").style.display='none';

     //Verificar si el campo password es menor a 5
     valor = document.getElementById("telefono").value;
    if( valor < 10 || valor.length < 10) {
        document.getElementById("errorTelefono").innerHTML="Debe tener 10 caracteres, tienes " +valor.length;
        document.getElementById("errorTelefono").style.display='block';
    return false;
    }
        document.getElementById("errorTelefono").innerHTML="";
        document.getElementById("errorTelefono").style.display='none';  

        return true;
   }     
</script>











</body>
</html>