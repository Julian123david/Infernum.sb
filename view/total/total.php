<link rel="stylesheet" type="text/css" href="../css/view.css">
<h1 class="page-header">Detalle</h1>

<br>
<div class="NewUserdiv">
  <a href="?c=Total&a=Crud1"> 
  <input class="NewUser" type="button" value="Nuevo Pedido"> </a> 
    <input class="buscar" type="text" placeholder="Buscar Detalle" id="searchTerm" onkeyup="doSearch()">
</div>
<br>
<table class="tabla " id="datos">
    <thead>
        <tr class="tr">
            <th>IdDetalle</th>
            <th>CantidadProducto</th>            
            <th>PrecioUnitario</th>
            <th>DescuentoPedido</th>
            <th>IdPedido</th>
            <th>IdProducto</th>

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
                <a href="?c=Total&a=Crud&IdPedido=<?php echo $r->IdPedido; ?>">Editar</a>
            </td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 