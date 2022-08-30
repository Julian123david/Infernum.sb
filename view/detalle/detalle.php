<h1 class="page-header">Detalle</h1>

<br>
<div class="envio">
  <a class="envio" href="?c=Detalle&a=Crud">Detalle</a> 
</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
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
        <tr>
            <td><?php echo $r->CantidadProducto; ?></td>          
              <td><?php echo $r->PrecioUnitario; ?></td>
            <td><?php echo $r->DescuentoPedido; ?></td>
            <td><?php echo $r->IdPedido; ?></td>
            <td><?php echo $r->IdProducto; ?></td>

            <td>
                <a href="?c=Detalle&a=Crud&IdPedido=<?php echo $r->IdPedido; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Detalle&a=Eliminar&IdPedido=<?php echo $r->IdPedido; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
