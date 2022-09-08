<link rel="stylesheet" type="text/css" href="css/formulario.css">


<h1 class="Titulo">
    <?php echo $alm->IdCategoria != null ? $alm->NombreCategoria : 'Nuevo Registro'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexCategoria.php">Categorias Registradas</a></li>
</ol>

<form id="frm-categoria" action="?c=Categoria&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdCategoria" value="<?php echo $alm->IdCategoria; ?>" />

     <div class="nombre">
        <input type="text" name="DescripcionCategoria" value="<?php echo $alm->DescripcionCategoria; ?>" class="input" placeholder="Ingrese Descripcion" required="required" minlength="10" maxlength="255" />
    </div>   
    
    <div class="nombre">
        <input type="text" name="NombreCategoria" value="<?php echo $alm->NombreCategoria; ?>" class="input" placeholder="Ingrese Nombre" required="required" minlength="10" maxlength="35" />
    </div>
    

    
    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button onclick="javascript:return confirm('¿Seguro de editar esta categoria?');" id="button" >Guardar    
</button>
    </div>
    </center>

    <td>
            </td>
</form>
</div>