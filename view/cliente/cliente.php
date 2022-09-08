<link rel="stylesheet" type="text/css" href="css/view.css">
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
<h1 class="Titulo">Clientes Registrados</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Cliente&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Cliente"> </a> 
    <input class="buscar" type="text" placeholder="Buscar Cliente" id="searchTerm" onkeyup="doSearch()">
</div>
<br>
<table class="tabla"  id="datos">
    <thead>
        <tr class="tr">
            <th>Id</th>            
            <th>IdUsuario</th>
            <th>NombreCliente</th>
            <th>ApellidoCliente</th>
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
                <a onclick="javascript:return confirm('¿Seguro de eliminar este cliente?');" href="?c=Cliente&a=Eliminar&IdCliente=<?php echo $r->IdCliente; ?>">                  <img class="delete" src="img/delete.png"></a>
            </td>
        </tr>
        <tr class='noSearch hide'>

<td colspan="5"></td>

</tr>
    <?php endforeach; ?>
    </tbody>
</table> 
