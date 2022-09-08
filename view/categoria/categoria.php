<link rel="stylesheet" type="text/css" href="../css/view.css">


<style type="text/css">
    .btnvolver{
        background-color:#897BFF;
        float:right;
        margin-right: 50px;
        text-align: center;
        padding: 5 20px;
        border-radius: 0 0 5px 5px;
    }
    .btnvolver > a{
        text-decoration: none;
        color: white;
        font-size: 150%;

    }
    .btnvolver:hover{
        background-color: #6A59FE;
    }
</style>
<div class="btnvolver"><a href="javascript:history.back()"> Volver</a></div>
<h1 class="h1">Categoria</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Categoria&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Usuario"> </a> 
    <input class="buscar" type="text" placeholder="BuscarUsuario">
</div>
<br>
<table class="tabla">
    <thead>
        <tr class="tr">
            <th class="th_left">Id</th>
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
                <a onclick="javascript:return confirm('¿Seguro de eliminar esta categoria?');" href="?c=Categoria&a=Eliminar&IdCategoria=<?php echo $r->IdCategoria; ?>">                <img class="delete" src="img/delete.png">
</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
