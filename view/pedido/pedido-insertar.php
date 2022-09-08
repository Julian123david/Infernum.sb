<link rel="stylesheet" type="text/css" href="css/formulario.css">

<h1 class="Titulo">
    <?php echo $alm->IdPedido != null ? $alm->IdPedido : 'Nuevo Pedido'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexPedido.php">Pedidos Registrados</a></li>

</ol>


<form id="frm-pedido" action="?c=Pedido&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdPedido" value="<?php echo $alm->IdPedido; ?>" />

     <div class="nombre">
        <input type="text" name="IdEmpleado" value="<?php echo $alm->IdEmpleado; ?>" class="input" placeholder="Ingrese IdEmpleado" required="required" />
    </div>   
    
    <div class="nombre">
        <input type="text" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" class="input" placeholder="Ingrese IdCliente" required="required" />
    </div>
    
    <div class="nombre">
        <input type="text" name="IdCompaniaEnvio" value="<?php echo $alm->IdCompaniaEnvio; ?>" class="input" placeholder="Ingrese Compañia Envio" required="required" />
    </div>

    <div class="nombre">
        <input type="date" name="FechaPedido" value="<?php echo $alm->FechaPedido; ?>" class="input" placeholder="Ingrese " required="required"  max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 15 days"));?>" 
  min = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 7 days"));?>"/>
    </div>
    
    <div class="nombre">
        <input type="date" name="FechaEnvio" value="<?php echo $alm->FechaEnvio; ?>" class="input" placeholder="Ingrese " required="required" max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>" 
  min = "<?php echo date("Y-m-d");?>"/>
    </div>

    <div class="nombre">
        <input type="text" name="DireccionEntrega" value="<?php echo $alm->DireccionEntrega; ?>" class="input" placeholder="Ingrese DireccionEntrega " required="required" minlength="10" maxlength="255"/>
    </div>

    <div class="nombre">
        <input type="text" name="TotalPedido" value="<?php echo $alm->TotalPedido; ?>" class="input" placeholder="Ingrese Total " required="required" />
    </div>

    <div class="nombre">
        <label>Estado pedido:</label>
        <select name="EstadoPedido" class="input">
            <option <?php echo $alm->EstadoPedido == 'Activo' ? 'selected' : ''; ?> value="Activo" class="input">Activo</option>
            <option <?php echo $alm->EstadoPedido == 'Inactivo' ? 'selected' : ''; ?> value="Inactivo" class="input">Inactivo</option>
        </select>
    </div> 

    <div class="nombre">
        <input type="text" name="MetodoPago" value="<?php echo $alm->MetodoPago; ?>" class="input" placeholder="Ingrese Metodo Pago" required="required" minlength="10" maxlength="15"/>
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