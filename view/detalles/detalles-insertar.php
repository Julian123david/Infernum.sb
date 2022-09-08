<link rel="stylesheet" type="text/css" href="css/formulario.css">

<h1 class="Titulo">
    <?php echo $alm->IdPedido != null ? $alm->IdPedido : 'Nuevo Registro'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexDetalles.php">Detalles Registrados</a></li>

</ol>

<form id="frm-detalles" action="?c=Detalles&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdPedido" value="<?php echo $alm->IdPedido; ?>" />

     <div class="nombre">
        <input type="number" name="CantidadProducto" value="" class="input" placeholder="Ingrese Cantidad de Producto" required="required" />
    </div>   
    
    <div class="nombre">
        <input type="text" name="PrecioUnitario" value="" class="input" placeholder="Ingrese Precio Unitario" required="required" />
    </div>
    
    <div class="nombre">
        <input type="text" name="DescuentoPedido" value="" class="input" placeholder=" Ingrese Descuento " required="required"/>
    </div>

    <div class="nombre">
        <input type="text" name="IdPedido" value="" class="input" placeholder="Ingrese IdPedido" required="required" />
    </div>
    
    <div class="nombre">
        <input type="number" name="id" value="" class="input" placeholder="Ingrese el IdProducto " required="required" />
    </div>


    <hr />
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
        $("#frm-detalles").submit(function(){
            return $(this).validate();
        });
    })
</script>