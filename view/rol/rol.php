<link rel="stylesheet" type="text/css" href="../css/view.css">


<h1 class="Titulo">Rol</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Rol&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Rol"> </a> 
    <input class="buscar" type="text" placeholder="BuscarRol">
</div>
<br>
<table class="tabla">
    <thead>
        <tr class="tr">
            <th>Id</th>
            <th>Rol</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr class="tr2">
            <td><?php echo $r->IdRol; ?></td>
            <td><?php echo $r->rol; ?></td>
            <td>
                <a href="?c=Rol&a=Crud&IdRol=<?php echo $r->IdRol; ?>"><img class="edit" src="img/edit.png"></a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Rol&a=Eliminar&IdRol=<?php echo $r->IdRol; ?>"><img class="delete" src="img/delete.png"></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
