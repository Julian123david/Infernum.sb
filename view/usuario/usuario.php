<link rel="stylesheet" type="text/css" href="../css/view.css">
<script src="js/alertas.js"></script>

</script>


<h1 class="Titulo">Usuarios Registrados</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Usuario&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Usuario"> </a> 
    <input class="buscar" type="text" placeholder="BuscarUsuario">
</div>

<br>
<table class="tabla">
    <thead>
        <tr class="tr">
            <th>Id</th>
            <th>Nombre</th>
            <th>ClaveUsuario</th>
            <th>EstadoUsuario</th>
            <th>Rol</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr class="tr2">
            <td><?php echo $r->IdUsuario; ?></td>
            <td><?php echo $r->NombreUsuario; ?></td>
            <td><?php echo $r->ClaveUsuario; ?></td>
            <td><?php echo $r->EstadoUsuario; ?></td>
            <td><?php echo $r->IdRol; ?></td>
            <td>
                <a href="?c=Usuario&a=Crud&IdUsuario=<?php echo $r->IdUsuario; ?>">
                <img class="edit" src="img/edit.png">
</a>
            </td>
            <td>
                
                <a onclick="javascript:return  confirm('¿Seguro de eliminar este registro?');" href="?c=Usuario&a=Eliminar&IdUsuario=<?php echo $r->IdUsuario; ?>">                    
                <img class="delete" src="img/delete.png">
    
</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 


