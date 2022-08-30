<link rel="stylesheet" type="text/css" href="css/view.css">

<h1 class="Titulo">Clientes Registrados</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Cliente&a=Crud">
    <input class="NewUser" type="button" value="Nuevo Cliente"> </a> 
    <input class="buscar" type="text" placeholder="BuscarCliente">
</div>
<br>
<table class="tabla">
    <thead>
        <tr class="tr">
            <th>Id</th>            
            <th>IdUsuario</th>
            <th>NombreCliente</th>
            <th>ApellidoCliente/th>
            <th>DireccionCliente</th>
            <th>TelefonoCliente</th>
            <th>NumDocCliente</th>
            <th>CorreoCliente</th>

            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr class="tr2">
            <td><?php echo $r->IdCliente; ?></td>          
              <td><?php echo $r->IdUsuario; ?></td>
            <td><?php echo $r->NombreCliente; ?></td>
            <td><?php echo $r->ApellidoCliente; ?></td>
            <td><?php echo $r->DireccionCliente; ?></td>
            <td><?php echo $r->TelefonoCliente; ?></td>
            <td><?php echo $r->NumDocCliente; ?></td>
            <td><?php echo $r->CorreoCliente; ?></td>

            <td>
                <a href="?c=Cliente&a=Crud&IdCliente=<?php echo $r->IdCliente; ?>"><img class="edit" src="img/edit.png"></a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Cliente&a=Eliminar&IdCliente=<?php echo $r->IdCliente; ?>">                  <img class="delete" src="img/delete.png"></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
