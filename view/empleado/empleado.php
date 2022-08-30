<link rel="stylesheet" type="text/css" href="../css/view.css">
<h1 class="Titulo">Empleados Registrados</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Empleado&a=Crud">
    <input class="NewUser" type="button" value="Nuevo Empleado"> </a> 
    <input class="buscar" type="text" placeholder="BuscarEmpleado">
</div>
<br>
<table class="tabla">
    <thead>
        <tr class="tr">
            <th>Id</th>            
            <th>IdUsuario</th>
            <th>NombreEmpleado</th>
            <th>ApellidoEmpleado</th>
            <th>DireccionEmpleado</th>
            <th>TelefonoEmpleado</th>
            <th>NumDocEmpleado</th>
            <th>CorreoEmpleado</th>

            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr class="tr2">
            <td><?php echo $r->IdEmpleado; ?></td>          
              <td><?php echo $r->IdUsuario; ?></td>
            <td><?php echo $r->NombreEmpleado; ?></td>
            <td><?php echo $r->ApellidoEmpleado; ?></td>
            <td><?php echo $r->DireccionEmpleado; ?></td>
            <td><?php echo $r->TelefonoEmpleado; ?></td>
            <td><?php echo $r->NumDocEmpleado; ?></td>
            <td><?php echo $r->CorreoEmpleado; ?></td>

            <td>
                <a href="?c=Empleado&a=Crud&IdEmpleado=<?php echo $r->IdEmpleado; ?>"><img class="edit" src="img/edit.png"></a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Empleado&a=Eliminar&IdEmpleado=<?php echo $r->IdEmpleado; ?>"><img class="delete" src="img/delete.png"></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
