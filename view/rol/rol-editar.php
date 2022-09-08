<link rel="stylesheet" type="text/css" href="css/formulario.css">


<h1 class="Titulo">
    <?php echo $alm->IdRol!= null ? $alm->rol : 'Nuevo Registro'; ?>
</h1>

<div class="Contenedor">

<ol class="Usuario">
<li><a class="Volver" href="IndexRol.php">Roles Registrados</a></li>

</ol>

<form id="frm-rol" action="?c=Rol&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdRol" value="<?php echo $alm->IdRol; ?>" />
    
    <div class="nombre">
        <select name="rol" class="input">
            <option <?php echo $alm->rol == 'Gerente' ? 'selected' : ''; ?> value="Gerente">Gerente</option>
            <option <?php echo $alm->rol == 'Vendedor' ? 'selected' : ''; ?> value="Vendedor">Vendedor</option>
            <option <?php echo $alm->rol == 'cliente' ? 'selected' : ''; ?> value="Cliente">Cliente</option>
        </select>
    </div>  
    

    
    <hr />
    <br>
    <center>
    <div class="envio">
        <button onclick="javascript:return  confirm('¿Seguro de editar este ROL?');" class="envio">Guardar</button>
    </div>
    </center>
</form>
</div>
<script>
    $(document).ready(function(){
        $("#frm-rol").submit(function(){
            return $(this).validate();
        });
    })
</script>