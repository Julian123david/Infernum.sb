<h1 class="page-header">
    <?php echo $alm->IdCompaniaEnvio!= null ? $alm->NombreCompamia : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Compania">Compania</a></li>
  <li class="active"><?php echo $alm->IdCompaniaEnvio != null ? $alm->NombreCompamia : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-compania" action="?c=Compania&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdCompaniaEnvio" value="<?php echo $alm->IdCompaniaEnvio; ?>" />
    
    <div class="form-group">
        <label>Nombre:</label>
        <input type="text" name="NombreCompamia" value="<?php echo $alm->NombreCompamia; ?>" class="form-control" placeholder="Ingrese su nombre" required="required" />
    </div>
   
    <div class="form-group">
        <label>Telefono:</label>
        <input type="text" name="TelefonoCompania" value="<?php echo $alm->TelefonoCompania; ?>" class="form-control" placeholder="Ingrese su nombre" required="required" />
    </div>

    
    <hr />
    <br>
    <center>
    <div class="envio">
        <button class="envio">Guardar</button>
    </div>
    </center>
</form>

<script>
    $(document).ready(function(){
        $("#frm-rol").submit(function(){
            return $(this).validate();
        });
    })
</script>