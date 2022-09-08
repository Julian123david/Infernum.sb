<link rel="stylesheet" type="text/css" href="css/formulario.css">


<h1 class="Titulo">
    <?php echo $alm->IdPedido != null ? $alm->IdPedido : 'Nuevo Registro'; ?>
</h1>

<div class="Contenedor">

<ol class="Usuario">
<li><a class="Volver" href="IndexTotal.php">Detalles de Pedido Registrados</a></li>
</ol>

<form id="frm-detalle" action="?c=Total&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdPedido" value="<?php echo $alm->IdPedido; ?>" />

    <div class="nombre">
        <input type="text" name="CantidadProducto" value="<?php echo $alm->CantidadProducto; ?>" class="input" placeholder="Ingrese la Cantidad Producto" required="required" />
    </div>

     <div class="nombre">
        <input type="text" name="PrecioUnitario" value="<?php echo $alm->PrecioUnitario; ?>" class="input" placeholder="Ingrese Precio Unitario" required="required" />
    </div>   
    
    <div class="nombre">
        <input type="text" name="DescuentoPedido" value="<?php echo $alm->DescuentoPedido; ?>" class="input" placeholder="Ingrese Descuento" required="required" />
    </div>

    <div class="nombre">
        <input type="text" name="IdPedido" value="<?php echo $alm->IdPedido; ?>" class="input" placeholder="Ingrese IdPedido" required="required" />
    </div>
    
    <div class="nombre">
        <input type="text" name="id" value="<?php echo $alm->id; ?>" class="input" placeholder="Ingrese Id Producto" required="required" />
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
        $("#frm-detalle").submit(function(){
            return $(this).validate();
        });
    })
</script>