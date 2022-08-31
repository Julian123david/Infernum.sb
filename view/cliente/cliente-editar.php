<link rel="stylesheet" type="text/css" href="css/formulario.css">


<h1 class="Titulo">
    <?php echo $alm->IdCliente != null ? $alm->NombreCliente : 'Nuevo Registro'; ?>
</h1>

<div  class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexCliente.php">Clientes Registrados</a></li>

</ol>

<form id="frm-cliente" action="?c=Cliente&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" />

     <div class="nombre">
        <input type="number" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" class="input" placeholder="Ingrese " required="IdUsuario" />
    </div>   
    
    <div class="nombre">
        <input type="text" name="NombreCliente" value="<?php echo $alm->NombreCliente; ?>" class="input" placeholder="Ingrese su nombre" required="required" minlength="10" maxlength="255" />
    </div>
    
    <div class="nombre">
        <input type="text" name="ApellidoCliente" value="<?php echo $alm->ApellidoCliente; ?>" class="input" placeholder="Ingrese Apellido" required="required" minlength="10" maxlength="255"  />
    </div>

    <div class="nombre">
        <input type="text" name="DireccionCliente" value="<?php echo $alm->DireccionCliente; ?>" class="input" placeholder="Ingrese Direccion" required="required" minlength="10" maxlength="255" />
    </div>
    
    <div class="nombre">
        <input type="number" name="TelefonoCliente" value="<?php echo $alm->TelefonoCliente; ?>" class="input" placeholder="Ingrese Telefono " required="required" />
    </div>

    <div class="nombre">
        <input type="number" name="NumDocCliente" value="<?php echo $alm->NumDocCliente; ?>" class="input" placeholder="Ingrese Numero de documento" required="required" readonly />
    </div>

    <div class="nombre">
        <input type="text" name="CorreoCliente" value="<?php echo $alm->CorreoCliente; ?>" class="input" placeholder="Ingrese Correo" required="required" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"/>
    </div>



    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button onclick="javascript:return  confirm('¿Seguro de editar este cliente?');" id="button">Guardar</button>
    </div>
    </center>
</form>
</div>
<script>
    $(document).ready(function(){
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    })
</script>