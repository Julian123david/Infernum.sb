<link rel="stylesheet" type="text/css" href="css/formulario.css">


<h1 class="Titulo">
    <?php echo $alm->cod != null ? $alm->nom : 'Nuevo Registro'; ?>
</h1>

<div class="Contenedor">

<ol class="Usuario">
<li><a class="Volver" href="IndexProducto.php">Productos Registrados</a></li>
</ol>

<form id="frm-producto" action="?c=Producto&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod" value="<?php echo $alm->cod; ?>" />

    <div class="nombre">
        <input type="text" name="cod" value="<?php echo $alm->cod; ?>" class="input" placeholder="Ingrese IdProducto" required="required" />
    </div>

     <div class="nombre">
        <label>IdCategoria:</label>
        <select name="IdCategoria" class="input">
            <option <?php echo $alm->IdCategoria == 1 ? 'selected' : ''; ?> value="1">Camiseta</option>
            <option <?php echo $alm->IdCategoria == 2 ? 'selected' : ''; ?> value="2">Camisas</option>
            <option <?php echo $alm->IdCategoria == 3 ? 'selected' : ''; ?> value="3">Jeans</option>
            <option <?php echo $alm->IdCategoria == 4 ? 'selected' : ''; ?> value="4">Gorros</option>

        </select>
    </div>   
    
    <div class="nombre">
        <input type="text" name="img" value="<?php echo $alm->img; ?>" class="input" placeholder="Ingrese Imagen" required="required" />
    </div>

    <div class="nombre">
        <input type="text" name="cod" value="<?php echo $alm->cod; ?>" class="input" placeholder="Ingrese Codigo" required="required" />
    </div>
    
    <div class="nombre">
        <input type="text" name="nom" value="<?php echo $alm->nom; ?>" class="input" placeholder="Ingrese Nombre" required="required" />
    </div>

    <div class="nombre">
        <input type="text" name="pre" value="<?php echo $alm->pre; ?>" class="input" placeholder="Ingrese Precio" required="required" />
    </div>

    <div class="nombre" hidden>
    <label>EstadoProducto:</label>
        <select name="EstadoProducto" class="input">
            <option <?php echo $alm->EstadoProducto == '1' ? 'selected' : ''; ?> value="1">Disponible</option>
            <option <?php echo $alm->EstadoProducto == '0' ? 'selected' : ''; ?> value="0">Agotado</option>
        </select>
    </div>

<br>
    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button onclick="javascript:return confirm('¿Seguro de editar este producto?');" id="button">Guardar</button>
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