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
<style>
    .imagen{
	width: 100%;
	height:  auto ;
	margin: auto auto;
    border-radius: 1px;
}
</style>
<h1 class="Titulo">Producto</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Producto&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Producto"> </a> 
    <input class="buscar" type="text" placeholder="BuscarUsuario"  id="searchTerm" onkeyup="doSearch()">
</div>
<br>
<table class="tabla" id="datos">
    <thead>
        <tr class="tr">
            <th>Id</th>            
            <th>IdCategoria</th>
            <th>Imagen</th>
            <th>Codigo</th>
            <th>NombreProducto</th>
            <th>PrecioProducto</th>
            <th>EstadoProducto</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr class="tr2">
            <td><?php echo $r->id; ?></td>          
            <td><?php echo $r->NombreCategoria; ?></td>
            <td><img class="imagen" src="<?php echo $r->img; ?>"></img></td>
            <td><?php echo $r->cod; ?></td>
            <td><?php echo $r->nom; ?></td>
            <td><?php echo $r->pre; ?></td>
            <td><?php echo $r->EstadoProducto; ?></td>
            <td>
                <a href="?c=Producto&a=Crud&id=<?php echo $r->id; ?>"><img class="edit" src="img/edit.png"></a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Producto&a=Eliminar&id=<?php echo $r->id; ?>">                <img class="delete" src="img/delete.png">
</a>
            </td>
        </tr>
        <tr class='noSearch hide'>

<td colspan="5"></td>

</tr>
    <?php endforeach; ?>
    </tbody>
</table> 
