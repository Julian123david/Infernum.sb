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
<h1 class="Titulo">Detalles de Pedido Registrados</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Detalles&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Detalle"> </a> 
    <input class="buscar" type="text" placeholder="Buscar Detalle" id="searchTerm" onkeyup="doSearch()" >
</div>
<br>
<table class="tabla" id="datos">
    <thead>
        <tr class="tr">
            <th>Id Detalle</th>
            <th>Cantidad Producto</th>            
            <th>Precio Unitario</th>
            <th>Descuento Pedido</th>
            <th>IdPedido</th>
            <th>id</th>

            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr class="tr2">
        <td><?php echo $r->IdDetalle; ?></td>          
            <td><?php echo $r->CantidadProducto; ?></td>          
            <td><?php echo $r->PrecioUnitario; ?></td>
            <td><?php echo $r->DescuentoPedido; ?></td>
            <td><?php echo $r->IdPedido; ?></td>
            <td><?php echo $r->id; ?></td>
            <td>
                <a href="?c=Detalles&a=Crud&IdDetalle=<?php echo $r->IdDetalle; ?>"><img class="edit" src="img/edit.png"></a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Detalles&a=Eliminar&IdPedido=<?php echo $r->IdPedido; ?>"><img class="delete" src="img/delete.png"></a>
            </td>
        </tr>
        <tr class='noSearch hide'>

<td colspan="5"></td>

</tr>
    <?php endforeach; ?>
    </tbody>
</table> 
