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
<h1 class="Titulo">Pedido</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Pedido&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Pedido"> </a> 
    <input class="buscar" type="text" placeholder="Buscar Pedido" id="searchTerm" onkeyup="doSearch()">
</div>
<br>
<table class="tabla" id="datos">
    <thead>
        <tr class="tr">
            <th>Id</th>            
            <th>IdEmpleado</th>
            <th>IdCliente</th>
            <th>IdCompaniaEnvio</th>
            <th>FechaPedido</th>
            <th>FechaEnvio</th>
            <th>DireccionEntrega</th>
            <th>TotalPedido</th>
            <th>EstadoPedido</th>
            <th>MetodoPago</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr class="tr2">
            <td><?php echo $r->IdPedido; ?></td>          
              <td><?php echo $r->IdEmpleado; ?></td>
            <td><?php echo $r->IdCliente; ?></td>
            <td><?php echo $r->IdCompaniaEnvio; ?></td>
            <td><?php echo $r->FechaPedido; ?></td>
            <td><?php echo $r->FechaEnvio; ?></td>
            <td><?php echo $r->DireccionEntrega; ?></td>
            <td><?php echo $r->TotalPedido; ?></td>
            <td><?php echo $r->EstadoPedido; ?></td>
            <td><?php echo $r->MetodoPago; ?></td>


            <td>
                <a href="?c=Pedido&a=Crud&IdPedido=<?php echo $r->IdPedido; ?>"> <img class="edit" src="img/edit.png">
</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Pedido&a=Eliminar&IdPedido=<?php echo $r->IdPedido; ?>">                <img class="delete" src="img/delete.png">
</a>
            </td>
        </tr>
        <tr class='noSearch hide'>

<td colspan="5"></td>

</tr>
    <?php endforeach; ?>
    </tbody>
</table> 