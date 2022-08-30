<link rel="stylesheet" type="text/css" href="../css/view.css">

<h1 class="Titulo">Producto</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Producto&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Producto"> </a> 
    <input class="buscar" type="text" placeholder="BuscarUsuario">
</div>
<br>
<table class="tabla">
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
            <td><?php echo $r->IdCategoria; ?></td>
            <td><?php echo $r->img; ?></td>
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
    <?php endforeach; ?>
    </tbody>
</table> 
