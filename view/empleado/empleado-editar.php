<link rel="stylesheet" type="text/css" href="css/formulario.css">

<h1 class="Titulo">
    <?php echo $alm->IdEmpleado != null ? $alm->NombreEmpleado : 'Nuevo Registro'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexEmpleado.php">Empleados Registrados</a></li>

</ol>

<form id="frm-empleado" action="?c=Empleado&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdEmpleado" value="<?php echo $alm->IdEmpleado; ?>" />

     <div class="nombre">
        <input type="number" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" class="input" placeholder="Ingrese IdUsuario " required="required" minlength="1" maxlength="10"/>
    </div>   
    
    <div class="nombre">
        <input type="text" name="NombreEmpleado" value="<?php echo $alm->NombreEmpleado; ?>" class="input" placeholder="Ingrese Nombre" required="required" minlength="10" maxlength="255"/>
    </div>
    
    <div class="nombre">
        <input type="text" name="ApellidoEmpleado" value="<?php echo $alm->ApellidoEmpleado; ?>" class="input" placeholder="Ingrese Apellido" required="required" minlength="10" maxlength="255"/>
    </div>

    <div class="nombre">
        <input type="text" name="DireccionEmpleado" value="<?php echo $alm->DireccionEmpleado; ?>" class="input" placeholder="Ingrese Direccion" required="required" minlength="10" maxlength="255"/>
    </div>
    
    <div class="nombre">
        <input type="number" name="TelefonoEmpleado" value="<?php echo $alm->TelefonoEmpleado; ?>" class="input" placeholder="Ingrese Telefono " required="required" />
    </div>

    <div class="nombre">
        <input type="number" name="NumDocEmpleado" value="<?php echo $alm->NumDocEmpleado; ?>" class="input" placeholder="Ingrese Numero Documento" required="required" />
    </div>

    <div class="nombre">
        <input type="email" name="CorreoEmpleado" value="<?php echo $alm->CorreoEmpleado; ?>" class="input" placeholder="Ingrese Correo" required="required" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" />
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
        $("#frm-empleado").submit(function(){
            return $(this).validate();
        });
    })
</script>