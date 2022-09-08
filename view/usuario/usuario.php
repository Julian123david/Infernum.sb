<link rel="stylesheet" type="text/css" href="../css/view.css">
<<<<<<< HEAD
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
=======
<script src="js/alertas.js"></script>

>>>>>>> 4350297f9ea70579e6b0aea20c8e41acd5170996
</script>

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


<h1 class="Titulo">Usuarios Registrados</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Usuario&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Usuario"> </a> 
    <input class="buscar" type="text" placeholder="Buscar Usuario" id="searchTerm" onkeyup="doSearch()">
</div>

<br>
<table class="tabla" id="datos">
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
            <td><?php echo $r->rol; ?></td>
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
        <tr class='noSearch hide'>

<td colspan="5"></td>

</tr>
    <?php endforeach; ?>
    </tbody>
</table> 


<<<<<<< HEAD

=======
>>>>>>> 4350297f9ea70579e6b0aea20c8e41acd5170996
