<link rel="stylesheet" type="text/css" href="../css/view.css">

<h1 class="page-header">Categoria</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Categoria&a=Crud">
    <input class="NewUser" type="button" value="Nuevo Usuario"> </a> 
    <input class="buscar" type="text" placeholder="BuscarUsuario">
</div>
<br>
<table class="tabla">
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
    <?php endforeach; ?>
    </tbody>
</table> 
