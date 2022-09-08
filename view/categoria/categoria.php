<link rel="stylesheet" type="text/css" href="../css/view.css">
<script type="text/javascript" src="js/buscador.js"></script>

 
<style>
 datos {border:1px solid #ccc;padding:10px;font-size:1em;}
 
datos tr:nth-child(even) {background:#ccc;}
 
datos td {padding:5px;}
 
datos tr.noSearch {background:White;font-size:0.8em;}
 
datos tr.noSearch td {padding-top:10px;text-align:right;}
 
.hide {display:none;}
 
.red {color:Red;}
 
body {font-family: Arial, Helvetica, sans-serif;}
 
body {font-family: Arial, Helvetica, sans-serif;}
 

</style>
<h1 class="page-header">Categoria</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Categoria&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Usuario"> </a> 
    <input class="buscar" type="text" placeholder="Buscar Categoria" id="searchTerm" onkeyup="doSearch()">
</div>
<br>
<table class="tabla" id="datos">
    <thead>
        <tr class="tr">
            <th>Id</th>
            <th>Descripcion</th>
            <th>Nombre</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr class="tr2">
            <td><?php echo $r->IdCategoria; ?></td>
            <td><?php echo $r->DescripcionCategoria; ?></td>
            <td><?php echo $r->NombreCategoria; ?></td>
            <td>
                <a href="?c=Categoria&a=Crud&IdCategoria=<?php echo $r->IdCategoria; ?>">                <img class="edit" src="img/edit.png">
</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Categoria&a=Eliminar&IdCategoria=<?php echo $r->IdCategoria; ?>">                <img class="delete" src="img/delete.png">
</a>
            </td>
        </tr>
        <tr class='noSearch hide'>

                <td colspan="5"></td>

            </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
