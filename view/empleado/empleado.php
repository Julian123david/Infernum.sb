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
<h1 class="Titulo">Empleados Registrados</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Empleado&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Empleado"> </a> 
    <input class="buscar" type="text" placeholder="Buscar Empleado" id="searchTerm" onkeyup="doSearch()" >
</div>
<br>
<table class="tabla" id="datos">
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
                <a onclick="javascript:return confirm('¿Seguro de eliminar este empleado?');" href="?c=Empleado&a=Eliminar&IdEmpleado=<?php echo $r->IdEmpleado; ?>"><img class="delete" src="img/delete.png"></a>
            </td>
        </tr>
        <tr class='noSearch hide'>

<td colspan="5"></td>

</tr>
    <?php endforeach; ?>
    </tbody>
</table> 
